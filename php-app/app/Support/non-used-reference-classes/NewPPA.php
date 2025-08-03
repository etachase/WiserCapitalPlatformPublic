<?php

/**
 * Final Application Models
 *
 * @package Default_Model
 * @subpackage Model
 * @author Chris Jensen <chris@mainelyoffroad.com>
 * @copyright Chris Jensen <chris@mainelyoffroad.com>
 * @license See Contract Materials
 */

/**
 *
 *
 * @package Default_Model
 * @subpackage Model
 * @author Chris Jensen <chris@mainelyoffroad.com>
 */
class Default_Model_Excel_NewPPA extends Default_Model_File
{
    protected $_site = null;
    protected $_meter = null;
    protected $_tariff = null;
    protected $_globals = null;
    protected $_proposal = null;
    protected $_proposal_model = null;
    protected $_cpw = null;
    protected $_result = null;
    protected $_costkwh = null;
    protected $_esc = null;
    protected $_wiser_fee = null;
    protected $_wiser_fee_min = null;
    protected $_wc_leave = null;
    protected $_calcs = null;
    protected $_excel = null;

    public function __construct(array $options) {
    	if(!array_key_exists('meter', $options) || !array_key_exists('tariff', $options)) {
    		throw new Exception("PPA requires a meter, and the calculated tariff information.");
    	}
        if(isset($options['proposal_detail'])) {
        	$this->_proposal = $options['proposal_detail'];
        }
        if(isset($options['proposal_model'])) {
            $this->_proposal_model = $options['proposal_model'];
        }
        if(isset($options['cpw'])) {
            $this->_cpw = $options['cpw'];
        }
        if(isset($options['result'])) {
            $this->_result = $options['result'];
        }
        if(isset($options['costkwh'])) {
            $this->_costkwh = $options['costkwh'];
        }
        if(isset($options['esc'])) {
            $this->_esc = $options['esc'];
        }
            if(!is_null($options['wiser_fee'])) {
            $this->_wiser_fee = $options['wiser_fee'];
        }
        if(!is_null($options['wiser_fee_min'])) {
            $this->_wiser_fee_min = $options['wiser_fee_min'];
        }
        if(!is_null($options['wc_leave'])) {
            $this->_wc_leave = $options['wc_leave'];
        }
        $this->_meter = $options['meter'];
        $this->_site = $this->_meter->getSite();
        $this->_tariff = $options['tariff'];
        $this->_globals = new Default_Model_SitesGlobal();
        parent::__construct();
        $this->getExcelModel();
    }

    public function getExcelModel() {
    	if(!$this->_excel) {
        	$this->findOneByFileName('NewPPA');
        	$this->_excel = parent::getExcelModel();
    	}
        return $this->populateExcel($this->_excel);
    }

    public function getCell($cell, $sheet, $sheet_index = null) {
        if(is_numeric($sheet_index)) {
            $old_index = $sheet->getActiveSheetIndex();
            $sheet->setActiveSheetIndex($sheet_index);
        } else if(!is_null($sheet_index)) {
            $old_index = $sheet->getActiveSheetIndex();
            $sheet->setActiveSheetIndexByName($sheet_index);
        }
        $ret = number_format($sheet->getActiveSheet()->getCell($cell)->getCalculatedValue(), 5, '.', '');
        if(!is_null($old_index)) {
            $sheet->setActiveSheetIndex($old_index);
        }
    	return $ret;
    }

    public function saveValues() {
        if(!$this->_excel) {
            throw new Exception("You must calculate values prior to trying to use saveValues");
        }
        $data = array();
        foreach($this->_excel->getSheetNames() as $name) {
            $this->_excel->setActiveSheetIndexByName($name);
            $data[$name] = $this->_excel->getActiveSheet()->toArray(null, true, false, true);
//             $objWriter = new PHPExcel_Writer_CSV($this->_excel);
//             $objWriter->setSheetIndex($this->_excel->getActiveSheetIndex());
//             $objWriter->save("/tmp/ppa-{$name}.csv");
        }
        return $data;
    }

    /**
     * Finds the least possible cost per kWh based on the inputs of the Excel sheet
     *
     * @param array|struct $args
     * @return PHPExcel
     */
    public function getCost($args) {
        if($this->hasGlobalOverride('ppa-costkwh') && !$args['recalc']) { return $args['excel']; }
        $log_msgs = array('getCost');
        if(strstr($args['drive_cell'], '!')==false || strstr($args['calc_cell'], '!')==false) {
            throw new Exception("Must use 'sheet!cell' format in getCost functions");
        }
        list($drivesheet, $drivecell) = explode('!', $args['drive_cell']);
        list($calcsheet, $calccell) = explode('!', $args['calc_cell']);
        $i = 0;
        $kwhcost = 0.000;
        $diff = 0.0001;
        $diffpermillicent = 0;
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $args['excel']->setActiveSheetIndexByName($drivesheet);
        $args['excel']->getActiveSheet()->setCellValue($drivecell, $diff);
        $calc1 = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $args['excel']->getActiveSheet()->setCellValue($drivecell, ($diff*2));
        $calc2 = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
        $diffpermillicent = $calc1-$calc2;
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $kwhcost = (floor(($calc1-$args['compare'])/$diffpermillicent))*$diff;
        $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
        while($i<10 && $calc_cell>$args['compare']) {
            $i++;
            $kwhcost = Default_Model_Utils::round_up($this->guessCost(0.0001, $kwhcost, $calc1, $calc_cell), 3);
            if($last_kwhcost && $last_kwhcost==$kwhcost) {
                echo "Same kwhcost as last iteration, that cannot be correct. Adding some cost, costdiff = {$costdiff}".PHP_EOL;
                $kwhcost+=0.001;
            }
            echo "kWh Cost: {$kwhcost}".PHP_EOL;
            $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
            PHPExcel_Calculation::getInstance()->clearCalculationCache();
            $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
            echo "calc cell: {$calc_cell}".PHP_EOL;
            $last_kwhcost = $kwhcost;
        }
        $args['excel']->getActiveSheet()->setCellValue($drivecell, Default_Model_Utils::round_up($kwhcost, 3));
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        return $args['excel'];


        array_push($log_msgs, "Set initial kwhcost: {$kwhcost}");
        $args['excel']->setActiveSheetIndexByName($drivesheet);
        $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
        $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $i = 0;
        $j = 1;
        while($calc_cell<=0 && ++$i<100) {
            $kwhcost+=0.01;
            $args['excel']->setActiveSheetIndexByName($drivesheet);
            $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
            $j++;
            array_push($log_msgs, "Set kwhcost try {$j}: {$kwhcost}");
            $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
            PHPExcel_Calculation::getInstance()->clearCalculationCache();
        }
        $i = 0;
        while($calc_cell>0 && ++$i<100) {
            $kwhcost-=0.0001;
            $args['excel']->setActiveSheetIndexByName($drivesheet);
            $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
            $j++;
            array_push($log_msgs, "Set kwhcost try {$j}: {$kwhcost}");
            $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
            PHPExcel_Calculation::getInstance()->clearCalculationCache();
        }
        $kwhcost+=0.0001;
        $args['excel']->setActiveSheetIndexByName($drivesheet);
        $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
        $j++;
        array_push($log_msgs, "Set kwhcost try {$j}: {$kwhcost}");
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        Zend_Registry::get('logger')->log($log_msgs, Zend_Log::DEBUG);
        return $args['excel'];
    }

    public function getCostCPW($args) {
        $kwhcost = 7;
        if(strstr($args['drive_cell'], '!')==false || strstr($args['calc_cell'], '!')==false) {
            throw new Exception("Must use 'sheet!cell' format in getCost functions");
        }
        list($drivesheet, $drivecell) = explode('!', $args['drive_cell']);
        list($calcsheet, $calccell) = explode('!', $args['calc_cell']);

        $args['excel']->setActiveSheetIndexByName($drivesheet);
        $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
        $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $i = 0;
        while($calc_cell<=0 && ++$i<100 && $kwhcost>=1.75) {
            $kwhcost-=0.25;
            $args['excel']->setActiveSheetIndexByName($drivesheet);
            $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
            $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
            PHPExcel_Calculation::getInstance()->clearCalculationCache();
        }
        $i = 0;
        while($calc_cell>0 && ++$i<100 && $kwhcost<=7) {
            $kwhcost+=0.10;
            $args['excel']->setActiveSheetIndexByName($drivesheet);
            $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
            $calc_cell = $args['excel']->getActiveSheet()->getCell($calccell)->getCalculatedValue();
            PHPExcel_Calculation::getInstance()->clearCalculationCache();
        }
        $kwhcost-=0.10;
        $args['excel']->setActiveSheetIndexByName($drivesheet);
        $args['excel']->getActiveSheet()->setCellValue($drivecell, $kwhcost);
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        return $args['excel'];
    }

    /*
     * =B9-(C9/((C9-C10)/(B9-B10)))
    * B9=10
    * B10=drive_cell
    * C9=calc1
    * C10=calc2
    * */
    public function guessCost($start, $end, $start_calc, $end_calc) {
        return $start-($start_calc/(($start_calc-$end_calc)/($start-$end)));
    }

    public function roundDown($num, $digits=2) {
        $mult = pow(10, $digits);
        return (floor($num*$mult))/$mult;
    }

    public function getCalcCell($balyr) {
        if(!is_numeric($balyr)) {
            $balyr = $this->getValue('ppa-def-bal-yr');
        }
        if($balyr>25) {
            $balyr -= 26;
            return "A".chr(ord('A')+$balyr);
        } else {
            return chr(ord('A')+$balyr);
        }
    }

    public function findkWhCost($excel = null) {
    	if(!$excel) {
    		$excel = $this->getExcelModel();
    	}
    	$cellref = $this->getCalcCell();
    	if(isset($this->_proposal['result'])) {
    	    $result = $this->_proposal['result'];
    	} else {
    	    $result = $this->_result;
    	}
    	$dorecalc = (
    	        (isset($result['Inputs & Calcs']['B20']) && $this->getCell('B20', $excel, 'Inputs & Calcs')!=$result['Inputs & Calcs']['B20']) ||
    	        (isset($result['Inputs & Calcs']['B25']) && $this->getCell('B25', $excel, 'Inputs & Calcs')!=$result['Inputs & Calcs']['B25']) ||
    	        (isset($result['Inputs & Calcs']['B18']) && $this->getCell('B18', $excel, 'Inputs & Calcs')!=$result['Inputs & Calcs']['B18'])
        );
    	if(
    	    (isset($result['Inputs & Calcs']['B19']) && $this->getCell('B19', $excel, 'Inputs & Calcs')!=$result['Inputs & Calcs']['B19']) &&
    	    (isset($result['Inputs & Calcs']['B18']) && $this->getCell('B18', $excel, 'Inputs & Calcs')!=$result['Inputs & Calcs']['B18'])
        ){
    	    $dorecalc = false;
	    }
    	$excel = $this->getCost(array('recalc' => $dorecalc, 'excel' => $excel, 'drive_cell' => 'Cashflow!F1', 'calc_cell' => 'Cashflow!B30', 'compare' => 0));
    	$excel->setActiveSheetIndex(0);
        return $excel;
    }

    public function findCPW($excel = null) {
        if(!$excel) {
            $excel = $this->getExcelModel();
        }
        $cellref = $this->getCalcCell();
        if(isset($this->_proposal['result'])) {
            $result = $this->_proposal['result'];
        } else {
            $result = $this->_result;
        }
        return $this->getCostCPW(array('excel' => $excel, 'drive_cell' => 'Cashflow!H2', 'calc_cell' => 'Cashflow!B30', 'compare' => 0));
    }

    public function findBuyItSooner($excel = null) {
        throw new Exception("cannot use findBuyItSooner()");
    	if(!$excel) {
    		$excel = $this->getExcelModel();
    	}
    	$cellref = $this->getCalcCell($excel->getActiveSheet()->getCell('D45')->getCalculatedValue());
    	if(isset($this->_proposal['result'])) {
    	    $result = $this->_proposal['result'];
    	} else {
    	    $result = $this->_result;
    	}
    	$dorecalc = (
    	        (isset($result['B57']) && $this->getCell('B57', $excel, 1)!=$result['B57'])
    	);
        return $this->getCost(array('recalc' => $dorecalc, 'excel' => $excel, 'drive_cell' => 'D47', 'calc_cell' => $cellref.'71', 'compare' => $excel->getActiveSheet()->getCell('D44')->getCalculatedValue()));
    }

    public function populateExcel($excel) {
        $globals = array(
            'Cashflow' => array(
                'F1' => 'ppa-costkwh',
                'F3' => 'ppa-wc-leave-new',
                'H1' => 'ppa-loan-lev',
                'H3' => 'ppa-te-cap',
                'M2' => 'tei-ret',
                'M3' => 'tei-buyout',
//                 'M1' => 'Deal Structure: 1. Sale Leaseback 2. Partnership Flip',
            ),
            'Inputs & Calcs' => array(
                    'B6' => 'tei-num-yr',
                    'B9' => 'ppa-tedr',
                    'B11' => 'ppa-def-bal-yr',
                    'B12' => 'ppa-loan-int',
                    'B16' => 'ppa-irr',
                    'B18' => 'ppa-def-bal-yr',
                    'B20' => 'ppa-cashupfront',
                    'B23' => 'ppa-esccapyr',
                    'B26' => 'ppa-devfee',
                    'B27' => 'ppa-mindevfee',
                    'B41' => 'ppa-hawaiinonres',
                    'B42' => 'ppa-hawaiitci',
                    'B43' => 'ppa-ommin',
                    'B44' => 'ppa-omkwdc',
                    'B45' => 'ppa-omesc',
                    'B46' => 'llc_fee',
                    'B49' => 'sales_fee',
                    'B50' => 'te_fee',
                    'B51' => 'const_fin',
                    'B52' => 'ppa-loan-debt-rat',
                    'B59' => 'ppa-itc',
                    'B60' => 'ppa-db',
                    'B61' => 'ppa-bdw',
                    'B62' => 'ppa-fedtax',
                    'B64' => 'ppa-disbuy',
                    'B68' => 'ppa-degrad',
                    'B69' => 'derate',
                    'B74' => 'ppa-macrs-1',
                    'B75' => 'ppa-macrs-2',
                    'B76' => 'ppa-macrs-3',
                    'B77' => 'ppa-macrs-4',
                    'B78' => 'ppa-macrs-5',
                    'B79' => 'ppa-macrs-6',
                    'B14' => 'wiser-eq-term',
                    'B15' => 'wiser-irr',
                    'B17' => 'sponsor-eq-term',
//                     'B22' => 'esc cap $ (unused now)',
                    'B37' => 'pbi-amo',
                    'B38' => 'pbi-amo-yr',
                    'B47' => 'insur-cpw',
                    'B48' => 'site-lease-rate',
                    'B54' => 'prod-assum',
                    'B56' => 'reserve-cash',
                    'B57' => 'reserve-req',
                    'B58' => 'reserve-dead',
                    'B65' => 'lease-price',
                    'B80' => 'tax-buyout-opt',
                    'B81' => 'hi-payback',
            ),
//             'HFCashflow' => array(),
//             'IRR' => array('C3' => 'Residual Deposit'),
        );

        foreach($globals as $sheet => $cells) {
            $excel->setActiveSheetIndexByName($sheet);
            foreach($cells as $cell => $global) {
                $excel->getActiveSheet()->setCellValue($cell, $this->getValue($global));
            }
        }

        /**
         * Fill in PPA model
         */
        $excel->setActiveSheetIndexByName('Inputs & Calcs');
        $bal_year = $this->getValue('ppa-def-bal-yr');

        if($this->_meter->getSite()->getSales()) {
            $excel->getActiveSheet()->setCellValue('B49', is_numeric($this->_meter->getSite()->getSales()->getExtra("sales"))?$this->_meter->getSite()->getSales()->getExtra("sales"):0);
        }
        if($this->hasGlobalOverride('ppa-esccapyr')) {
            $excel->getActiveSheet()->setCellValue('B23', $this->getValue('ppa-esccapyr'));
        } else {
            $excel->getActiveSheet()->setCellValue('B23', $this->getValue('ppa-def-bal-yr'));
        }
        $this->_calcs = $this->_meter->getBasicCalc($this->_meter->getSize());
        if($this->_tariff && $this->_tariff['dc']) {
            $this->_calcs['dc'] = $this->_tariff['dc'];
        }
        $excel->getActiveSheet()->setCellValue('B70', $this->_calcs['annualinsolation']);
        if($this->_meter->getSite()->isCommercial()) {
            $excel->getActiveSheet()->setCellValue('B30', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N19']);
            $excel->getActiveSheet()->setCellValue('B28', ($this->_tariff['totals'][$this->_tariff['current_ut']]['N24']>$this->_tariff['totals'][$this->_tariff['current_ut']]['N25']?$this->_tariff['totals'][$this->_tariff['current_ut']]['N24']:$this->_tariff['totals'][$this->_tariff['current_ut']]['N25']));
            $excel->getActiveSheet()->setCellValue('B31', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N9']);
        } else {
            $excel->getActiveSheet()->setCellValue('B30', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N10']);
            $excel->getActiveSheet()->setCellValue('B28', ($this->_tariff['totals'][$this->_tariff['current_ut']]['N14']>$this->_tariff['totals'][$this->_tariff['current_ut']]['N15']?$this->_tariff['totals'][$this->_tariff['current_ut']]['N14']:$this->_tariff['totals'][$this->_tariff['current_ut']]['N15']));
            $excel->getActiveSheet()->setCellValue('B31', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N9']);
        }
        $excel->getActiveSheet()->setCellValue('B29', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N7']);
        //                     'B66' => 'HF Cashflow Start Year',
        if($this->_proposal) {
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_def_bal_yr'])) {
                $excel->getActiveSheet()->setCellValue('B18', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_def_bal_yr']);
                $bal_year = $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_def_bal_yr'];
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_cashupfront'])) {
                $excel->getActiveSheet()->setCellValue('B20', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_cashupfront']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_esccapyr'])) {
                $excel->getActiveSheet()->setCellValue('B23', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_esccapyr']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_devfee'])) {
                $excel->getActiveSheet()->setCellValue('B26', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_devfee']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['llc_fee'])) {
                $excel->getActiveSheet()->setCellValue('B46', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['llc_fee']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['const_fin'])) {
                $excel->getActiveSheet()->setCellValue('B51', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['const_fin']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['sales_fee'])) {
                $excel->getActiveSheet()->setCellValue('B49', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['sales_fee']);
            }
            $excel->getActiveSheet()->setCellValue('B62', Default_Model_Utils::normalize_percent($this->_proposal['Financing']['fed_tax']));
            $excel->getActiveSheet()->setCellValue('B63', Default_Model_Utils::normalize_percent($this->_proposal['Financing']['sta_tax']));
            $excel->getActiveSheet()->setCellValue('B68', Default_Model_Utils::normalize_percent($this->_proposal['Sysspec']['mid-'.$this->_meter->getSiteMeterId()]['global_degrad']));
            $excel->getActiveSheet()->setCellValue('B45', Default_Model_Utils::normalize_percent($this->_proposal['Financing']['om_esc']));
            $excel->getActiveSheet()->setCellValue('B24', $this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['total_dc']);
            $excel->getActiveSheet()->setCellValue('B69', Default_Model_Utils::normalize_percent($this->_proposal['Sysspec']['mid-'.$this->_meter->getSiteMeterId()]['global_derate']));
            $inv = $this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['invert_type_0'];
            if(substr($inv, 0, 2)=='g_') {
                $asset = Default_Model_GlobalAssets::findOne(substr($inv, 2));
            } else {
                $asset = Default_Model_Assets::findOne($inv);
            }
            $asset_detail = $asset->getDetail();
            if($asset_detail['micro']) {
                $excel->getActiveSheet()->setCellValue('B72', $this->getValue('inv-enh'));
            }
            $excel->getActiveSheet()->setCellValue('B73', (Default_Model_GlobalInputs::getGlobal('tilt-'.$this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['tilt']))?Default_Model_GlobalInputs::getGlobal('tilt-'.$this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['tilt']):0);
        } else {
            $meters = Default_Model_SitesMeter::findBy(array('site_id' => $this->_site->getSiteId()));

            $complete_count = 0;
            foreach($meters as $meter) {
                foreach(Default_Model_MeterResult::findBy(array('sites_meter_id' => $meter->getSiteMeterId())) as $result) {
                    if($result->getResultType()==Default_Model_MeterResult::RESULTPPA) {
                        $complete_count++;
                    }
                }
            }

            if($complete_count>1) {
                $excel->getActiveSheet()->setCellValue('B27', ($this->getValue('ppa-mindevfee')==Default_Model_GlobalInputs::getGlobal('ppa-mindevfee'))?$this->getValue('ppa-mindevfee')/$complete_count:$this->getValue('ppa-mindevfee'));
                $excel->getActiveSheet()->setCellValue('B43', ($this->getValue('ppa-ommin')==Default_Model_GlobalInputs::getGlobal('ppa-ommin'))?$this->getValue('ppa-ommin')/$complete_count:$this->getValue('ppa-ommin'));
            }
            if(isset($this->_wiser_fee)) {
                $excel->getActiveSheet()->setCellValue('B26', $this->_wiser_fee);
            }
            if(isset($this->_wiser_fee_min)) {
                $excel->getActiveSheet()->setCellValue('B27', $this->_wiser_fee_min);
            }
            if(is_numeric($this->_cpw)) {
                $cpw = $this->_cpw;
            } else {
                $global = new Default_Model_GlobalInputs();
                $cpw = $global->getRetailCost($this->_calcs['dc'], $this->_site);
            }
            $excel->getActiveSheet()->setCellValue('B63', Default_Model_Utils::normalize_percent($this->_meter->getStateTax()));
            $excel->getActiveSheet()->setCellValue('B24', $this->_calcs['dc']);
            $excel->getActiveSheet()->setCellValue('B69', Default_Model_Utils::array_avg(array($this->getValue('derate'), $this->getValue('derate', 'high'))));
            }
            if(!$this->_site->isHF()) {
                $map = $this->_site->getSitesMap()->getDetail();
                $inv = $map['si']['si-'.$this->_site->getSiProfileId()]['inv'];
                if(substr($inv, 0, 2)=='g_') {
                    $asset = Default_Model_GlobalAssets::findOne(substr($inv, 2));
                } else {
                    $asset = Default_Model_Assets::findOne($inv);
                }
                $asset_detail = $asset->getDetail();
                if($asset_detail['micro']) {
                    $excel->getActiveSheet()->setCellValue('B72', $this->getValue('inv-enh'));
                }
                $excel->getActiveSheet()->setCellValue('B73', (Default_Model_GlobalInputs::getGlobal('tilt-'.$map['si']['si-'.$this->_site->getSiProfileId()]['tilt']))?Default_Model_GlobalInputs::getGlobal('tilt-'.$map['si']['si-'.$this->_site->getSiProfileId()]['tilt']):0);
            }

        $excel->getActiveSheet()->setCellValue('B36', ($this->getValue('ppa-one-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())))?$this->getValue('ppa-one-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())):0);

        $sa = $this->_site->getDetail('adv');
        $excel->getActiveSheet()->setCellValue('B34', ($this->getValue('ppa-prod-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())))?$this->getValue('ppa-prod-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())):0);
        $excel->getActiveSheet()->setCellValue('B35', ($this->getValue('ppa-year-'.strtolower($this->_site->getSiteState())))?$this->getValue('ppa-year-'.strtolower($this->_site->getSiteState())):0);
        $excel->getActiveSheet()->setCellValue('B71', is_numeric($sa['shade'])?Default_Model_Utils::normalize_percent($sa['shade']):0);
        if(strtolower($this->_site->getUtility())=="hawaii") {
            $excel->getActiveSheet()->setCellValue('B39', "Yes");
            if($this->getValue('ppa-hawaiitei')==1) {
                $excel->getActiveSheet()->setCellValue('B40', "Yes");
            }
        }

        $excel->setActiveSheetIndexByName('Cashflow');
        if(isset($this->_wc_leave)) {
            $excel->getActiveSheet()->setCellValue('F3', $this->_wc_leave);
        }
        /* These are linked to Cashflow!M1 which is the "Deal Structure: 1. Sale Leaseback 2. Partnership Flip"
         * In the XLSX model if M1 is 1 (which is currently always the case) these get set to 0 in the model
         * We're simply setting these values to 0 for now
         * */
        if(1==2) {
            $excel->getActiveSheet()->setCellValue('M2', Default_Model_Utils::normalize_percent($this->getValue('tei-ret')));
            $excel->getActiveSheet()->setCellValue('M3', Default_Model_Utils::normalize_percent($this->getValue('tei-buyout')));
        } else {
            $excel->getActiveSheet()->setCellValue('M2', 0);
            $excel->getActiveSheet()->setCellValue('M3', 0);
        }
        $excel->getActiveSheet()->setCellValue('F2', Default_Model_Utils::normalize_percent($this->getValue('ppa-ownitesc')));
        if($this->_proposal) {
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_ownitesc'])) {
                $excel->getActiveSheet()->setCellValue('F2', Default_Model_Utils::normalize_percent($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_ownitesc']));
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_costkwh'])) {
                $excel->getActiveSheet()->setCellValue('F1', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_costkwh']);
            }
            $excel->getActiveSheet()->setCellValue('H2', $this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['installed_cpw']);
        } else {
            if(isset($this->_costkwh)) {
                $excel->getActiveSheet()->setCellValue('F1', $this->_costkwh);
            }
            if(isset($this->_esc)) {
                $excel->getActiveSheet()->setCellValue('F2', $this->_esc);
            }
            $excel->getActiveSheet()->setCellValue('H2', $cpw);
        }

        $excel->setActiveSheetIndex(0);
        return $excel;
    }

    public function hasGlobalOverride($name = 'ppa-ownitamt') {
        return $this->_globals->hasGlobalOverride($name, $this->_site, $this->_meter);
    }

    public function getValue($name, $highlow = null) {
        $val = $this->_globals->getValue($name, $this->_site, $this->_meter, $highlow);
        return ($val===false)?0:$val;
    }
}
