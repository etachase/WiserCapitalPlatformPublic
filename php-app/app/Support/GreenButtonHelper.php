<?php

namespace App\Support;

use App\Models\Site;
use App\Models\UtilityProvider;

class GreenButtonHelper 
{
    const FILE_GREEN_BUTTON = 'facility_information_file_green_button';
    
    protected $csvParser = '';
    protected $tariffModeler = '';
    
    /**
     * This function will return the green button data
     * 
     * @param int $id
     * @return array
     */    
    public function getGreenButtonData($id)
    {
        $site = Site::find($id);
        
        $green_button_file = $site->getMeta(self::FILE_GREEN_BUTTON);
        $utility_provider  = UtilityProvider::find($site->getMeta('utility_provider'));
        if (!$utility_provider || ($utility_provider && (!$utility_provider->is_green_button 
            || !$green_button_file || ($green_button_file && empty($green_button_file['filepath']))))) {
            return ['error' => true, 'data' => [], 'message' => trans('hf/greenbutton.error.file-not-found')];
        }
        $extension = explode('.', $green_button_file['filepath']);
        
        if ((!in_array(end($extension), ['xml', 'csv'])) || !$site) {
            return ['error' => true, 'data' => [], 'message' => trans('hf/greenbutton.error.cannot-model')];
        }
        
        $dont_know = Dropdown::UTILITY_DONT_KNOW;
        
        if (!$site->getMeta('utility_schedule') || 
            ($site->getMeta('utility_schedule') && 
                ($site->getMeta('utility_schedule') == $dont_know) 
                || (($site->getMeta('utility_schedule') != $dont_know)  
                && !($utilitySchedule = $this->getUtilitySchedule($site))))) {
            return [
                'error'    => true, 
                'data'     => [], 
                'message'  => trans('hf/greenbutton.error.cannot-model', 
                ['message' => trans('hf/greenbutton.messages.invalid-utility-schedule')])
            ];
        }
        
        $this->tariffModeler = new TariffModeler($utilitySchedule);
                
        // Get the actual presigned-url
        $presignedUrl = (new S3Helper())->getS3FileUrl($green_button_file['filepath']);
        
        (end($extension) == 'xml') ? $this->parseGreenButtonXML(simplexml_load_file($presignedUrl))
                                    : $this->parseGreenButtonCSV(fopen($presignedUrl, 'r'));
        (!$this->tariffModeler->getMonthlyChargeStatus() && !$this->tariffModeler->getError()) 
            ? $this->tariffModeler->addMonthlyCharges(true) : '';
        $this->tariffModeler->calculateAnnualBill();
        
        if (!$this->tariffModeler->getError() && ($this->tariffModeler->getTotalBillCost() == 0)) {
            $this->tariffModeler->setError();
            $this->tariffModeler->setMessage(trans('hf/greenbutton.error.cannot-model', ['message' => 
                            trans('hf/greenbutton.messages.no-cost-calculated')]));
        }
        return [
            'error'       => $this->tariffModeler->getError(), 
            'data'        => $this->tariffModeler->getHourlyBill(), 
            'monthlyBill' => $this->tariffModeler->getMonthlyBill(), 
            'message'     => $this->tariffModeler->getMessage() ? $this->tariffModeler->getMessage() 
                                : trans('hf/greenbutton.success-message'),
            'annualBill'  => $this->tariffModeler->getAnnualBill(),
            'otherAdditionalChargeOrDiscount' => 
                $this->tariffModeler->getUtilitySchedule()->getOtherAdditionalChargeOrDiscount($utilitySchedule),
        ];
    }
    
    /**
     * get utility schedule
     * 
     * @param object $site
     * @return array
     */
    public function getUtilitySchedule($site) 
    {
        $url = "http://api.openei.org/utility_rates?version=latest&"
                . "format=json&detail=full&api_key=" . env('NREL_KEY') . 
                '&getpage='. $site->getMeta('utility_schedule');
        $utilityResults = json_decode(file_get_contents($url), true);
        $schedule = array_shift($utilityResults['items']);
        return $schedule;
    }
    
    /**
     * Get utillity schedule of provided utility provider
     * 
     * @param string $utility_provider
     * @return array
     */
    public function getUtilityScheduleByUtilityProvider($utility_provider)
    {
        $url = "http://api.openei.org/utility_rates?version=latest&format=json&"
                . "detail=full&country=USA&api_key=" . env('NREL_KEY') . 
                '&sector=Commercial&ratesforutility='. urlencode($utility_provider);
        
        try {
            $content = file_get_contents($url);
            $data = json_decode($content, true);
        } catch (\Exception $ex) {
            $data = ['items' => []];
        }
        return ['error' => false, 'data' => $data];
    }
    
    /**
     * Parse csv file of green button data
     * 
     * @param resource $csv
     */
    public function parseGreenButtonCSV($csv) 
    { 
        $this->csvParser = new CSVParser($this->tariffModeler); 
        $this->csvParser->setCSV($csv);       
        $counter = 0;
        while($line = fgetcsv($this->csvParser->getCSV())) {
            
            if ($counter++ < 5) {
                continue;
            }
            $this->csvParser->setCSVLineCount(count($line));
            break;
        }
        
        $this->csvParser->parseCSV();
    }
    
    /**
     * parse xml file of green button data
     * 
     * @param object $xml
     */
    public function parseGreenButtonXML($xml) 
    {
        if (!$xml->entry) {
            $this->tariffModeler->setError();
            $this->tariffModeler->setMessage(trans('hf/greenbutton.error.cannot-model', 
                    ['message' => trans('hf/greenbutton.messages.xml-entry-required')]));
            return ;
        }
        foreach ($xml->entry as $val) {
            if (!$val->content) {
                $this->tariffModeler->setError();
                $this->tariffModeler->setMessage(trans('hf/greenbutton.error.cannot-model', ['message' => 
                                    trans('hf/greenbutton.messages.xml-content-required')]));
                break;
            } 
            foreach ($val as $content) {
                if (!$content->IntervalBlock) {
                    continue ;
                }
                $this->parseXmlInterval($content->IntervalBlock);
            }
        }
    }
    
    /**
     * Parse xml interval reading block
     * 
     * @param object $intervalBlock
     */
    public function parseXmlInterval($intervalBlock) 
    {
        foreach ($intervalBlock->IntervalReading as $intervalReading) {
            
            $v = \Validator::make((array) $intervalReading, [
                'timePeriod' => 'required',
                'value'      => 'required|numeric|min:1',
            ]);
            if ($v->fails() || !is_object($intervalReading->timePeriod)) {
                $this->tariffModeler->setError();
                $this->tariffModeler->setMessage(trans('hf/greenbutton.error.cannot-model', 
                    ['message' => trans('hf/greenbutton.messages.required-timeperiod-unit-consumed')]));
                break;
            }

            $start    = (string) $intervalReading->timePeriod->start;
            $duration = (string) $intervalReading->timePeriod->duration;
            
            //start date is used in missing time frame check below.
            $this->tariffModeler->setCurrentIntervalStartDate(date('Y-m-d H:i:s', $start));
            $this->tariffModeler->setCurrentIntervalEndDate(date('Y-m-d H:i:s', ($start + $duration)));
            $this->tariffModeler->setCurrentIntervalUnitConsumed((float) $intervalReading->value);
            
            if (!$this->tariffModeler->checkTimeDuration()) 
                break;
            
            $this->tariffModeler->checkInterval();
        }
    }
}
