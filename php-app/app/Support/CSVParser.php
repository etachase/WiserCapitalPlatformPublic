<?php

namespace App\Support;

use DateTime;

class CSVParser 
{
    const USAGE = 'usage';
    const STARTDATE      = 'start_date';
    const ENDDATE        = 'end_date';
    
    protected $csv = '';
    protected $tariffModeler = '';
    protected $csvLineCount  = 0;
    
    public function __construct($tariffModeler) 
    {
        $this->tariffModeler = $tariffModeler;
    }
    
    /**
     * Set the number of lines in csv file
     * 
     * @param int $count
     */
    public function setCSVLineCount($count)
    {
        $this->csvLineCount = $count;
    }
    
    public function getCSVLineCount()
    {
        return $this->csvLineCount;
    }
    
    /**
     * Set csv file
     * 
     * @param resource $csv
     */
    public function setCSV($csv)
    {
        $this->csv = $csv;
    }
    
    public function getCSV()
    {
        return $this->csv;
    }
    
    /**
     * get date from string in date format
     * returns blank date in case of invalid date
     * 
     * @param string $data
     * @param string $date_type
     * @return datetime
     */
    public function getDate($data, $date_type) 
    {
        $dates = explode('to', $data);
        
        if (count($dates) != 2) {
            return '';
        }
        
        if ($date_type == self::STARTDATE) {
            $date = substr($dates[0], 0, 19);
            return (DateTime::createFromFormat('Y-m-d H:i:s', $date) !== FALSE) 
                        ? date('Y-m-d H:i:s', strtotime($date)) : '';
        } 
        $date = substr($dates[1], 1, 20);
        return (DateTime::createFromFormat('Y-m-d H:i:s', $date) !== FALSE)
                    ? date('Y-m-d H:i:s', strtotime($date)) : '';
    }
    
    /**
     * parse the csv line which contains the start date and end date in single column
     * 
     * @param array $result
     */
    public function parseCombinedDateCSV($result)
    {
        if (empty($result[1]) || (!empty($result[1]) && !is_numeric($result[1]))) {
            return;
        }
        
        $this->tariffModeler->setCurrentIntervalStartDate($this->getDate($result[0], self::STARTDATE));
        $this->tariffModeler->setCurrentIntervalEndDate($this->getDate($result[0], self::ENDDATE));
        $this->tariffModeler->setCurrentIntervalUnitConsumed($result[1]);
        
        if (!$this->tariffModeler->checkTimeDuration()) {
            return;
        }

        $this->tariffModeler->checkInterval();
    }
    
    /**
     * Parser for 2 column csv file
     */
    public function parseTwoColumnCSV()
    {
        while($result = fgetcsv($this->getCSV())) {
            
            //The Greenbutton CSV has various points for validation which are checked below.
            if (!empty($result[1]) && !is_numeric($result[1])) {
                continue;
            }
            $this->parseCombinedDateCSV($result);
            if ($this->tariffModeler->getError()) {
                break;
            }
        }
    }
    
    /**
     * Parser for the usage in thrid column of csv
     */
    public function parseThridColumnUsageCSV()
    {
        while($result = fgetcsv($this->getCSV())) {
            
            if (empty($result[2]) || (!empty($result[2]) && !is_numeric($result[2]))) {
                continue;
            }
            
            $this->tariffModeler->setCurrentIntervalStartDate(date('Y-m-d H:i:s', strtotime($result[0])));
            $this->tariffModeler->setCurrentIntervalEndDate(date('Y-m-d H:i:s', strtotime($result[1])));
            $this->tariffModeler->setCurrentIntervalUnitConsumed($result[2]);

            if (!$this->tariffModeler->checkTimeDuration()) {
                break;
            }
            
            $this->tariffModeler->checkInterval();
        }
    }
    
    /**
     * Parser for three column csv
     */
    public function parseThreeColumnCSV()
    {
        while($result = fgetcsv($this->getCSV())) {
            if (!empty($result[2]) && (strtolower(substr($result[2], 0, 5)) == self::USAGE)) {
                $this->parseThridColumnUsageCSV();
                break;
            }
            
            $this->parseCombinedDateCSV($result);
            if ($this->tariffModeler->getError()) {
                break;
            }
        }
    }
    
    /**
     * Parser for eight column csv
     */
    public function parseEightColumnCSV()
    {
        while($result = fgetcsv($this->getCSV())) {
            
            //The Greenbutton CSV has various points for validation which are checked below.
            if ((empty($result[4]) || (!empty($result[4]) && !is_numeric($result[4])))) {
                continue;
            }
            
            $this->tariffModeler->setCurrentIntervalStartDate($result[1]. ' ' . $result[2] . ':00');
            $this->tariffModeler->setCurrentIntervalEndDate($result[1]. ' ' . $result[3] . ':00');
            $this->tariffModeler->setCurrentIntervalUnitConsumed($result[4]);

            if (!$this->tariffModeler->checkTimeDuration()) {
                break;
            }

            $this->tariffModeler->checkInterval();
        }
    }
    
    /**
     * Parse csv file of green button data
     */
    public function parseCSV() 
    { 
        switch ($this->getCSVLineCount()) {
            case 2 :
                $this->parseTwoColumnCSV();
                break;
            case 3 :
                $this->parseThreeColumnCSV();
                break;
            case 8 :
                $this->parseEightColumnCSV();
                break;
            default : 
                $this->tariffModeler->setError();
                $this->tariffModeler->setMessage(trans('hf/greenbutton.error.cannot-model', 
                    ['message' => trans('hf/greenbutton.messages.no-formatting-found')]));
        }
        return $this->tariffModeler;
    }
}
