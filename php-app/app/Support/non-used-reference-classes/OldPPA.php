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
class Default_Model_Excel_OldPPA extends Default_Model_File
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
        $this->_meter = $options['meter'];
        $this->_site = $this->_meter->getSite();
        $this->_tariff = $options['tariff'];
        $this->_globals = new Default_Model_SitesGlobal();
        parent::__construct();
        $this->getExcelModel();
    }

    public function getExcelModel() {
    	if(!$this->_excel) {
        	$this->findOneByFileName('PPA');
        	$this->_excel = parent::getExcelModel();
    	}
        return $this->populateExcel($this->_excel);
    }

    public function saveValues() {
        if(!$this->_excel) {
            throw new Exception("You must calculate values prior to trying to use saveValues");
        }
        $data = array();
        foreach($this->_excel->getSheetNames() as $name) {
            $this->_excel->setActiveSheetIndexByName($name);
            $data[$name] = $this->_excel->getActiveSheet()->toArray(null, true, false, true);
        }
        return $data;
    }

    public function getCell($cell, $sheet, $sheet_index = null) {
        if(!is_null($sheet_index)) {
            $old_index = $sheet->getActiveSheetIndex();
            $sheet->setActiveSheetIndex($sheet_index);
        }
        $ret = number_format($sheet->getActiveSheet()->getCell($cell)->getCalculatedValue(), 5, '.', '');
        if(!is_null($old_index)) {
            $sheet->setActiveSheetIndex($old_index);
        }
    	return $ret;
    }

    /**
     * Finds the least possible cost per kWh based on the inputs of the Excel sheet
     *
     * @param array|struct $args
     * @return PHPExcel
     */
    public function getCost($args) {
        if($this->hasGlobalOverride('ppa-costkwh') && !$args['recalc']) { return $args['excel']; }
        $i = 0;
        $kwhcost = 0.000;
        $diff = 0.0001;
        $diffpermillicent = 0;
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $args['excel']->setActiveSheetIndex(1);
        $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], $diff);
        $args['excel']->setActiveSheetIndex(0);
        $calc1 = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
        $calc = $calc1;
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $args['excel']->setActiveSheetIndex(1);
        $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], ($diff*2));
        $args['excel']->setActiveSheetIndex(0);
        $calc2 = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
        $diffpermillicent = $calc1-$calc2;
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $kwhcost = (floor(($calc1-$args['compare'])/$diffpermillicent))*$diff;

        $args['excel']->setActiveSheetIndex(1);
        $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], $kwhcost);
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $args['excel']->setActiveSheetIndex(0);
        $calc_cell = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
        while($i<10 && $calc_cell>$args['compare']) {
            $i++;
            $kwhcost = Default_Model_Utils::round_up($this->guessCost(0.0001, $kwhcost, $calc1, $calc_cell), 3);
            if($last_kwhcost && $last_kwhcost==$kwhcost) {
                //echo "Same kwhcost as last iteration, that cannot be correct. Adding some cost, costdiff = {$costdiff}".PHP_EOL;
                $kwhcost+=0.001;
            }
            //echo "kWh Cost: {$kwhcost}".PHP_EOL;
            $args['excel']->setActiveSheetIndex(1);
            $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], $kwhcost);
            PHPExcel_Calculation::getInstance()->clearCalculationCache();
            $args['excel']->setActiveSheetIndex(0);
            $calc_cell = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
            //echo "calc cell: {$calc_cell}".PHP_EOL;
            $last_kwhcost = $kwhcost;
        }

        $args['excel']->setActiveSheetIndex(1);
        $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], Default_Model_Utils::round_up($kwhcost, 3));
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        return $args['excel'];
    }

    public function getCostCPW($args) {
        $i = 0;
        $kwhcost = 0.000;
        $diff = 10;
        $args['excel']->setActiveSheetIndex(1);
        $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], $diff);
        $args['excel']->setActiveSheetIndex(0);
        $calc1 = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $args['excel']->setActiveSheetIndex(1);
        $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], ($diff-1));
        $args['excel']->setActiveSheetIndex(0);
        $calc2 = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        $kwhcost = $this->roundDown($this->guessCost(10, 9, $calc1, $calc2));
        $args['excel']->setActiveSheetIndex(1);
        $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], $kwhcost);
        $args['excel']->setActiveSheetIndex(0);
        $calc_cell = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
        PHPExcel_Calculation::getInstance()->clearCalculationCache();
        while($calc_cell>0 && $i<10) {
            $i++;
            $kwhcost = $this->roundDown($this->guessCost(10, $kwhcost, $calc1, $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue()));
            $args['excel']->setActiveSheetIndex(1);
            $args['excel']->getActiveSheet()->setCellValue($args['drive_cell'], $kwhcost);
            PHPExcel_Calculation::getInstance()->clearCalculationCache();
            $args['excel']->setActiveSheetIndex(0);
            $calc_cell = $args['excel']->getActiveSheet()->getCell($args['calc_cell'])->getCalculatedValue();
        }
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
    	        (isset($result['B57']) && $this->getCell('B57', $excel, 1)!=$result['B57']) ||
    	        (isset($result['B26']) && $this->getCell('B26', $excel, 1)!=$result['B26']) ||
    	        (isset($result['B55']) && $this->getCell('B55', $excel, 1)!=$result['B55'])
        );
    	if(
    	    (isset($result['B56']) && $this->getCell('B56', $excel, 1)!=$result['B56']) &&
    	    (isset($result['B55']) && $this->getCell('B55', $excel, 1)!=$result['B55'])
        ){
    	    $dorecalc = false;
	    }
    	$excel = $this->getCost(array('recalc' => $dorecalc, 'excel' => $excel, 'drive_cell' => 'B56', 'calc_cell' => $cellref.'21', 'compare' => 0));
    	$excel->setActiveSheetIndex(0);
    	if($excel->getActiveSheet()->getCell('B17')->getCalculatedValue()<$this->getValue('ppa-min-cash-avail')) {
    	    $B56 = $this->getCell('B56', $excel, 1);
    	    $calc = $excel->getActiveSheet()->getCell('B17')->getCalculatedValue();
    	    $i=0;
    	    while($i++<200 && $calc<$this->getValue('ppa-min-cash-avail')) {
    	        $excel->setActiveSheetIndex(1);
    	        $excel->getActiveSheet()->setCellValue('B56', $B56+=0.001);
    	        PHPExcel_Calculation::getInstance()->clearCalculationCache();
    	        $excel->setActiveSheetIndex(0);
    	        $calc = $excel->getActiveSheet()->getCell('B17')->getCalculatedValue();
    	    }
    	    $excel->setActiveSheetIndex(1);
    	}
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
        return $this->getCostCPW(array('excel' => $excel, 'drive_cell' => 'B26', 'calc_cell' => $cellref.'21', 'compare' => 0));
    }

    public function findBuyItSooner($excel = null) {
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
            'B5' => 'ppa-te-cap',
            'B64' => 'ppa-wc-leave',
            'B6' => 'ppa-itc',
            'B7' => 'ppa-tedr',
//             'B38' => 'ppa-tedr',
            'B8' => 'ppa-irr',
            'B9' => 'ppa-db',
            'B10' => 'ppa-bdw',
            'B11' => 'ppa-fedtax',
            'B31' => 'ppa-devfee',
            'B30' => 'ppa-mindevfee',
            'B13' => 'const_fin',
            'B18' => 'sales_fee',
            'B24' => 'te_fee',
            'B27' => 'llc_fee',
            /*
            B12 - Utility Incentive - Production Based
            */
            'B15' => 'ppa-omkwdc',
            'B16' => 'ppa-degrad',
            'B17' => 'ppa-omesc',
            'B40' => 'ppa-disbuy',
            'B33' => 'derate',
            /*
            B17 - State Incentive Years
            B18 - Utility Incentive - One Time
            */
            'B21' => 'ppa-ommin',
            'B45' => 'ppa-macrs-1',
            'B46' => 'ppa-macrs-2',
            'B47' => 'ppa-macrs-3',
            'B48' => 'ppa-macrs-4',
            'B49' => 'ppa-macrs-5',
            'B50' => 'ppa-macrs-6',
            'B55' => 'ppa-def-bal-yr',
            'B57' => 'ppa-cashupfront',
            'B56' => 'ppa-costkwh',
            'B51' => 'ppa-loan-lev',
            'B52' => 'ppa-loan-int',
            'B42' => 'tei-num-yr',
            'B29' => 'ppa-hawaiitci',
            'B28' => 'ppa-hawaiinonres',
            'B63' => 'ppa-loan-debt-rat',
        );

        /**
         * Fill in PPA model
         */
        $excel->setActiveSheetIndex(1);
        $bal_year = $this->getValue('ppa-def-bal-yr');
        foreach($globals as $cell => $global) {
            $excel->getActiveSheet()->setCellValue($cell, $this->getValue($global));
        }
        if($this->_meter->getSite()->getSales()) {
            $excel->getActiveSheet()->setCellValue('B18', is_numeric($this->_meter->getSite()->getSales()->getExtra("sales"))?$this->_meter->getSite()->getSales()->getExtra("sales"):0);
        }
        if($this->hasGlobalOverride('ppa-esccapyr')) {
            $excel->getActiveSheet()->setCellValue('B60', $this->getValue('ppa-esccapyr'));
        } else {
            $excel->getActiveSheet()->setCellValue('B60', $this->getValue('ppa-def-bal-yr'));
        }
        $this->_calcs = $this->_meter->getBasicCalc($this->_meter->getSize());
        if($this->_tariff && $this->_tariff['dc']) {
            $this->_calcs['dc'] = $this->_tariff['dc'];
        }
        $excel->getActiveSheet()->setCellValue('B43', Default_Model_Utils::normalize_percent($this->getValue('tei-ret')));
        $excel->getActiveSheet()->setCellValue('B44', Default_Model_Utils::normalize_percent($this->getValue('tei-buyout')));
        $excel->getActiveSheet()->setCellValue('B34', $this->_calcs['annualinsolation']);
        $excel->getActiveSheet()->setCellValue('B39', $this->getValue('ppa-tax-table-'.$this->getValue('ppa-tedr')*100));
        $excel->getActiveSheet()->setCellValue('B41', $this->getValue('ppa-tax-table-'.$this->getValue('ppa-disbuy')*100));
        if($this->_meter->getSite()->isCommercial()) {
            $excel->getActiveSheet()->setCellValue('B61', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N19']);
            $excel->getActiveSheet()->setCellValue('B53', ($this->_tariff['totals'][$this->_tariff['current_ut']]['N24']>$this->_tariff['totals'][$this->_tariff['current_ut']]['N25']?$this->_tariff['totals'][$this->_tariff['current_ut']]['N24']:$this->_tariff['totals'][$this->_tariff['current_ut']]['N25']));
            $excel->getActiveSheet()->setCellValue('B62', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N9']);
        } else {
            $excel->getActiveSheet()->setCellValue('B61', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N10']);
            $excel->getActiveSheet()->setCellValue('B53', ($this->_tariff['totals'][$this->_tariff['current_ut']]['N14']>$this->_tariff['totals'][$this->_tariff['current_ut']]['N15']?$this->_tariff['totals'][$this->_tariff['current_ut']]['N14']:$this->_tariff['totals'][$this->_tariff['current_ut']]['N15']));
            $excel->getActiveSheet()->setCellValue('B62', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N9']);
        }
        $excel->getActiveSheet()->setCellValue('B54', $this->_tariff['totals'][$this->_tariff['lowest_ut']]['N7']);
        $excel->getActiveSheet()->setCellValue('B58', Default_Model_Utils::normalize_percent($this->getValue('ppa-ownitesc')));
//         $excel->getActiveSheet()->setCellValue('B59', (intval($this->getValue('ppa-esccap'))>0)?$this->getValue('ppa-esccap'):0);

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
                $excel->getActiveSheet()->setCellValue('B36', $this->getValue('inv-enh'));
            }
            $excel->getActiveSheet()->setCellValue('B37', (Default_Model_GlobalInputs::getGlobal('tilt-'.$map['si']['si-'.$this->_site->getSiProfileId()]['tilt']))?Default_Model_GlobalInputs::getGlobal('tilt-'.$map['si']['si-'.$this->_site->getSiProfileId()]['tilt']):0);
            $excel->getActiveSheet()->setCellValue('B35', is_numeric($map['si']['si-'.$this->_site->getSiProfileId()]['shade'])?Default_Model_Utils::normalize_percent(Default_Model_GlobalInputs::getGlobal('shade-'.intval($map['si']['si-'.$this->_site->getSiProfileId()]['shade']))):0);
        }

        if($this->_proposal) {
//             if(count($this->_proposal['Sysspec'])>1) {
//                 $excel->getActiveSheet()->setCellValue('B21', $this->getValue('ppa-ommin')/count($this->_proposal['Sysspec']));
//                 $excel->getActiveSheet()->setCellValue('B30', $this->getValue('ppa-mindevfee')/count($this->_proposal['Sysspec']));
//             }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_def_bal_yr'])) {
                $excel->getActiveSheet()->setCellValue('B55', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_def_bal_yr']);
                $bal_year = $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_def_bal_yr'];
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_ownitesc'])) {
                $excel->getActiveSheet()->setCellValue('B58', Default_Model_Utils::normalize_percent($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_ownitesc']));
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_cashupfront'])) {
                $excel->getActiveSheet()->setCellValue('B57', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_cashupfront']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_esccapyr'])) {
                $excel->getActiveSheet()->setCellValue('B60', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_esccapyr']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_costkwh'])) {
                $excel->getActiveSheet()->setCellValue('B56', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_costkwh']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_devfee'])) {
                $excel->getActiveSheet()->setCellValue('B31', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['ppa_devfee']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['llc_fee'])) {
                $excel->getActiveSheet()->setCellValue('B27', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['llc_fee']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['const_fin'])) {
                $excel->getActiveSheet()->setCellValue('B13', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['const_fin']);
            }
            if(isset($this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['sales_fee'])) {
                $excel->getActiveSheet()->setCellValue('B18', $this->_proposal['Refinement']['mid-'.$this->_meter->getSiteMeterId()]['sales_fee']);
            }
            $excel->getActiveSheet()->setCellValue('B11', Default_Model_Utils::normalize_percent($this->_proposal['Financing']['fed_tax']));
            $excel->getActiveSheet()->setCellValue('B12', Default_Model_Utils::normalize_percent($this->_proposal['Financing']['sta_tax']));
            $excel->getActiveSheet()->setCellValue('B16', Default_Model_Utils::normalize_percent($this->_proposal['Sysspec']['mid-'.$this->_meter->getSiteMeterId()]['global_degrad']));
            $excel->getActiveSheet()->setCellValue('B17', Default_Model_Utils::normalize_percent($this->_proposal['Financing']['om_esc']));
            $excel->getActiveSheet()->setCellValue('B26', $this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['installed_cpw']);
            $excel->getActiveSheet()->setCellValue('B32', $this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['total_dc']);
            $excel->getActiveSheet()->setCellValue('B33', Default_Model_Utils::normalize_percent($this->_proposal['Sysspec']['mid-'.$this->_meter->getSiteMeterId()]['global_derate']));
            $inv = $this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['invert_type_0'];
            if(substr($inv, 0, 2)=='g_') {
                $asset = Default_Model_GlobalAssets::findOne(substr($inv, 2));
            } else {
                $asset = Default_Model_Assets::findOne($inv);
            }
            $asset_detail = $asset->getDetail();
            if($asset_detail['micro']) {
                $excel->getActiveSheet()->setCellValue('B36', $this->getValue('inv-enh'));
            }
            $excel->getActiveSheet()->setCellValue('B37', (Default_Model_GlobalInputs::getGlobal('tilt-'.$this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['tilt']))?Default_Model_GlobalInputs::getGlobal('tilt-'.$this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['tilt']):0);
            $excel->getActiveSheet()->setCellValue('B35', is_numeric($this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['shade'])?Default_Model_Utils::normalize_percent(Default_Model_GlobalInputs::getGlobal('shade-'.intval($this->_proposal['Projin']['mid-'.$this->_meter->getSiteMeterId()]['shade']))):0);
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
                $excel->getActiveSheet()->setCellValue('B30', ($this->getValue('ppa-mindevfee')==Default_Model_GlobalInputs::getGlobal('ppa-mindevfee'))?$this->getValue('ppa-mindevfee')/$complete_count:$this->getValue('ppa-mindevfee'));
                $excel->getActiveSheet()->setCellValue('B21', ($this->getValue('ppa-ommin')==Default_Model_GlobalInputs::getGlobal('ppa-ommin'))?$this->getValue('ppa-ommin')/$complete_count:$this->getValue('ppa-ommin'));
            }
            if(isset($this->_costkwh)) {
                $excel->getActiveSheet()->setCellValue('B56', $this->_costkwh);
            }
            if(isset($this->_esc)) {
                $excel->getActiveSheet()->setCellValue('B58', $this->_esc);
            }
            if(isset($this->_wiser_fee)) {
                $excel->getActiveSheet()->setCellValue('B31', $this->_wiser_fee);
            }
            if(isset($this->_wiser_fee_min)) {
                $excel->getActiveSheet()->setCellValue('B30', $this->_wiser_fee_min);
            }
            if(is_numeric($this->_cpw)) {
                $cpw = $this->_cpw;
            } else {
                $global = new Default_Model_GlobalInputs();
                $cpw = $global->getRetailCost($this->_calcs['dc'], $this->_site);
            }
            $excel->getActiveSheet()->setCellValue('B26', $cpw);
            $excel->getActiveSheet()->setCellValue('B12', Default_Model_Utils::normalize_percent($this->_meter->getStateTax()));
            $excel->getActiveSheet()->setCellValue('B32', $this->_calcs['dc']);
            $excel->getActiveSheet()->setCellValue('B33', Default_Model_Utils::array_avg(array($this->getValue('derate'), $this->getValue('derate', 'high'))));
            }

        $excel->getActiveSheet()->setCellValue('B20', ($this->getValue('ppa-one-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())))?$this->getValue('ppa-one-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())):0);

        $sa = $this->_site->getDetail('adv');
        $excel->getActiveSheet()->setCellValue('B14', ($this->getValue('ppa-prod-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())))?$this->getValue('ppa-prod-'.strtolower($this->_site->getUtility()).'-'.strtolower($this->_site->getSiteState())):0);
        $excel->getActiveSheet()->setCellValue('B19', ($this->getValue('ppa-year-'.strtolower($this->_site->getSiteState())))?$this->getValue('ppa-year-'.strtolower($this->_site->getSiteState())):0);
        if(strtolower($this->_site->getUtility())=="hawaii") {
            $excel->getActiveSheet()->setCellValue('B22', "Yes");
            if($this->getValue('ppa-hawaiitei')==1) {
                $excel->getActiveSheet()->setCellValue('B23', "Yes");
            }
        }

        /*
         * #4636 - "PPA row 63 needs smart logic"
C63
=B6+(D51*$L$14)+(E51*$L$14^2)+(F51*$L$14^3)+(G51*$L$14^4)+(H51*$L$14^5)+(I51*L14^6)+(J51*L14^7)+(K51*L14^8)+(L51*L14^9)+(M51*L14^10)+(N51*L14^11)+(O51*L14^12)+(P51*L14^13)+(Q51*L14^14)+(R51*L14^15)+(S51*L14^16)+(T51*L14^17)+(U51*L14^18)+(V51*L14^19)
D63
=D51+(E51*$L$14)+(F51*$L$14^2)+(G51*$L$14^3)+(H51*$L$14^4)+(I51*$L$14^5)+(J51*L14^6)+(K51*L14^7)+(L51*L14^8)+(M51*L14^9)+(N51*L14^10)+(O51*L14^11)+(P51*L14^12)+(Q51*L14^13)+(R51*L14^14)+(S51*L14^15)+(T51*L14^16)+(U51*L14^17)+(V51*L14^18)
         */

        /*
        $cols = array(1 => 'C', 2 => 'D', 3 => 'E', 4 => 'F', 5 => 'G', 6 => 'H', 7 => 'I', 8 => 'J', 9 => 'K', 10 => 'L', 11 => 'M', 12 => 'N', 13 => 'O', 14 => 'P', 15 => 'Q', 16 => 'R', 17 => 'S', 18 => 'T', 19 => 'U', 20 => 'V', 21 => 'W', 22 => 'X', 23 => 'Y', 24 => 'Z', 25 => 'AA', 26 => 'AB', 27 => 'AC', 28 => 'AD', 29 => 'AE', 30 => 'AF');
        foreach($cols as $col) {
            $cells[$col.'63'] = "={$col}51";
        }
        $top = $bal_year;
        $offset = $top;
        foreach(range(1, $top) as $year) {
            $this_year = $year;
            $this_cell = "={$cols[$this_year]}51";
            $this_year++;
            $this_cell .= "+({$cols[$this_year]}51*\$L$14)";
            if($offset==2) {
                $cells[$cols[$year].'63'] = $this_cell;
                $offset-=1;
                continue;
            }
            if($offset<=1) {
                continue;
            }
            foreach(range(2, $offset-1) as $mult) {
                $this_year++;
                if(!isset($cols[$this_year])) { continue; }
                $this_cell .= "+({$cols[$this_year]}51*\$L$14";
                $this_cell .= "^".($mult);
                $this_cell .= ")";
            }
            $offset-=1;
            $cells[$cols[$year].'63'] = $this_cell;
        }

        foreach($cells as $cell => $val) {
            $excel->getActiveSheet()->setCellValue($cell, $val);
        }
        */

//        $excel->getActiveSheet()->setCellValue('B32', $this->getValue('ppa-loan-int'));
//        $excel->getActiveSheet()->setCellValue('B33', $this->getValue('ppa-loan-term'));
//        $excel->getActiveSheet()->setCellValue('B35', $this->getValue('ppa-loan-debt-rat'));
//
//        $excel->getActiveSheet()->setCellValue('I42', $this->getValue('ppa-caeb'));
//        $excel->getActiveSheet()->setCellValue('B54', $this->getValue('ppa-unoffset'));
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
