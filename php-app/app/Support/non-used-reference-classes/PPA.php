<?
class Default_Model_Cron_Results_PPA extends Default_Model_Cron_Abstract {
	public function action() {
		$results = array();
		if(isset($this->_options['id'])) {
    		$result = new Default_Model_MeterResult();
    		$result->findOneByMeterResultId($this->_options['id']);
    	} else {
    	    $result = $this->_options['result'];
    	}
		if(null===$result->getMeterResultId()) {
//			throw new Exception("CRON: ".get_class($this) . ": Could not find id - " . $this->_options['id']);
			return true;
		}

		$meter = Default_Model_SitesMeter::findOne($result->getSitesMeterId());
		$prefix = "SiteId-{$meter->getSiteId()}-MeterId-{$meter->getSiteMeterId()}-ID{$this->_options['id']}-PPA-";
		if(isset($this->_options['debug_email'])) {
		    $log_msgs = array('options' => $this->_options);
		    My_Timer::start();
		    $tmp = realpath(sys_get_temp_dir()).DIRECTORY_SEPARATOR.rand().DIRECTORY_SEPARATOR;
		    mkdir($tmp);
		}

		if(!isset($this->_options['recalc'])) {
    		if(null === ($tariff_detail = $result->getSitesMeter()->getDetail('tariffs'))) {
    		    return false;
    		}
		} else {
		    if(null === ($tariff_detail = $result->getSitesMeter()->getDetail('tariffs'))) {
		        return false;
		    }
		    $sglobals = new Default_Model_SitesGlobal();
		    if($sglobals->getValue('sys-size', $result->getSitesMeter()->getSite(), $result->getSitesMeter())) {
		        /* system size override, use this value to recalc tariffs and provide for PPA recalc */
		        $util = $result->getSitesMeter()->getUtilityTariff()->getUtility();
		        $syssize = $sglobals->getValue('sys-size', $result->getSitesMeter()->getSite(), $result->getSitesMeter());
		        $derate = Default_Model_Utils::array_avg(array($sglobals->getValue('derate', $result->getSitesMeter()->getSite(), $result->getSitesMeter()), $sglobals->getValue('derate', $result->getSitesMeter()->getSite(), $result->getSitesMeter(), 'high')));
		        $tariff_detail['dc'] = $syssize;
		        $tariff_detail['ac'] = ($syssize * $derate);
		        foreach(array_keys($tariff_detail['totals']) as $ut) {
		            if(!is_numeric($ut)) { continue; }
		            $tariff = $util->setTariff($ut)->getTariff(array('ac' => $tariff_detail['ac']));
		            $tariff_detail['totals'][$ut] = $util->getTotals($tariff);
		            if(isset($this->_options['debug_email'])) {
		                $objWriter = new PHPExcel_Writer_Excel2007($tariff);
		                $objWriter->save($tmp."tariff-{$ut}.xlsx");
		                $objWriter = new PHPExcel_Writer_CSV($tariff);
		                $objWriter->save($tmp."tariff-{$ut}.csv");
		                $attachments["{$prefix}tariff-{$ut}.xlsx"] = $tmp."tariff-{$ut}.xlsx";
		                $attachments["{$prefix}tariff-{$ut}.csv"] = $tmp."tariff-{$ut}.csv";
		            }
		        }
		        $meter->setDetail($tariff_detail, 'tariffs_refined')->save();
		    }
		}

		if(!isset($this->_options['recalc'])) {
    		foreach($meter->getSite()->getSitesGlobal() as $sglobal) {
    		    if(substr($sglobal->getSiteGlobalInputName(), 0, 5) == 'ppa') {
    		        $sglobal->delete();
    		    }
    		}
		}

		$curr_year = date("Y");
    	foreach(range(0, 30) as $year) {
			$years[] = $curr_year+$year;
    	}
    	$B106 = Default_Model_Utils::array_avg(Default_Model_GlobalInputs::getGlobal('ppa-annualutilincr'));

    	$options = array('meter' => $meter, 'tariff' => $tariff_detail);
    	if(is_numeric($result->getSitesMeter()->getDetail('si_cpw'))) {
    	    $options['cpw'] = $result->getSitesMeter()->getDetail('si_cpw');
    	} else if(is_numeric($result->getSitesMeter()->getSite()->getDetail('cpw'))) {
    	    $options['cpw'] = $result->getSitesMeter()->getSite()->getDetail('cpw');
    	}

	    if(!isset($this->_options['recalc'])) {
			$meter->setSize($tariff_detail['dc']);
			$newsize = $tariff_detail['dc'];

			if($_SESSION['debug_new_ppa']) {
    			$newppa = new Default_Model_Excel_NewPPA($options);
    			$newppa_excel = $newppa->findkWhCost();
    			if(isset($this->_options['debug_email'])) {
    			    $run = 'firstrun_newppa';
    			    $objWriter = new PHPExcel_Writer_Excel2007($newppa_excel);
    			    $objWriter->save($tmp."{$run}_ppa.xlsx");
    			    $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";

    			    foreach($newppa_excel->getSheetNames() as $name) {
    			        $newppa_excel->setActiveSheetIndexByName($name);
    			        $objWriter = new PHPExcel_Writer_CSV($newppa_excel);
    			        $objWriter->setSheetIndex($newppa_excel->getActiveSheetIndex());
    			        $objWriter->save($tmp."{$run}_ppa-{$name}.csv");
    			        $attachments["{$prefix}{$run}_ppa-{$name}.csv"] =$tmp."{$run}_ppa-{$name}.csv";
    			    }
    			}
    			if(isset($this->_options['debug_email'])) {
    			    array_push($log_msgs, "Duration to run initial NewPPA calculations: ",My_Timer::timeSinceStartOfRequest());
    			    My_Timer::start();
    			}
    			if($newppa->getCell('H13', $newppa_excel, 'Inputs & Calcs')<0) {
    			    $start_fyr = $newppa->getCell('H13', $newppa_excel, 'Inputs & Calcs');
    			    $new_seek_options = $options;
    			    $new_seek_options['esc'] = $newppa->getCell('F2', $newppa_excel, 'Cashflow');
    			    $wc_leave = Default_Model_GlobalInputs::getGlobal('ppa-wc-leave-new');
    			    $wc_leave_diff = ($wc_leave[1]-$wc_leave[0])/2;
    			    $new_seek_options['wc_leave'] = $wc_leave[0];
    			    $stop = false;
    			    $phase=1;
    			    $phase_1_cnt = 0;
    			    $phase_2_cnt = 0;
    			    $phase_2_totcnt =1;
    			    $phase_2_above = false;
    			    $phase_3_cnt = 0;

    			    $opts = array('found' => false);
    			    while(!$stop) {
    			        /* Adjustments attempted in this order:
    			        1) ESC +0.05% up to 2%
    			        2) CPW reduction down to $1.75 (set increments of -$.25 increments, then narrow in with +$.10)
    			        3) Wiser Fee reduction in 3 bands up to Z1, Z2, Z3
    			        */
    			        switch($phase) {
    			            case 1:
    			                $new_seek_options['esc'] = $new_seek_options['esc'] + 0.005;
    			                $new_seek_ppa = new Default_Model_Excel_NewPPA($new_seek_options);
    			                $new_seek_ppa_excel = $new_seek_ppa->findkWhCost();
    			                $start_fyr = $new_seek_ppa->getCell('H13', $new_seek_ppa_excel, 'Inputs & Calcs');
    			                $opts[$phase][$phase_1_cnt+1]=array('fyr' => $start_fyr, 'esc' => $new_seek_options['esc'], 'costkwh' => $new_seek_ppa->getCell('H2', $new_seek_ppa_excel, 'Cashflow'));
    			                if(isset($this->_options['debug_email'])) {
    			                    $run = 'phase-'.$phase.'-'.$phase_1_cnt;
    			                    $objWriter = new PHPExcel_Writer_Excel2007($new_seek_ppa_excel);
    			                    $objWriter->save($tmp."{$run}_ppa.xlsx");
    			                    $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";

    			                    foreach($new_seek_ppa_excel->getSheetNames() as $name) {
    			                        $new_seek_ppa_excel->setActiveSheetIndexByName($name);
    			                        $objWriter = new PHPExcel_Writer_CSV($new_seek_ppa_excel);
    			                        $objWriter->setSheetIndex($new_seek_ppa_excel->getActiveSheetIndex());
    			                        $objWriter->save($tmp."{$run}_ppa-{$name}.csv");
    			                        $attachments["{$prefix}{$run}_ppa-{$name}.csv"] =$tmp."{$run}_ppa-{$name}.csv";
    			                    }
    			                }
    			                if($start_fyr>=0) {
    			                    $opts['found']=true;
    			                    $stop=true;
    			                    break;
    			                }
    			                ++$phase_1_cnt;
    // 			                if(++$phase_1_cnt>=6) {
    		                    if($new_seek_options['esc']>=0.02) {
    			                    /* #5108, SIL/Sales users skip phase 2 optimization */
    		                        if(Zend_Auth::getInstance()->getIdentity() && (Zend_Auth::getInstance()->getIdentity()->isSales() || Zend_Auth::getInstance()->getIdentity()->isSIL())) {
    			                        $phase=3;
    			                    } else {
    			                        $phase=2;
    			                    }
    			                }
    			                break;
    			            case 2:
    			                $new_seek_options['esc'] = 0.02;
    			                if(!$phase_2_above) {
    			                    $new_seek_options['cpw'] = $new_seek_options['cpw'] - 0.25;
    			                    if($new_seek_options['cpw']<=1.75) {
    			                        $new_seek_options['cpw']=1.75;
    			                    }
    			                } else {
    			                    $new_seek_options['cpw'] = $new_seek_options['cpw'] + 0.10;
    			                }
    			                $new_seek_ppa = new Default_Model_Excel_NewPPA($new_seek_options);
    			                $new_seek_ppa_excel = $new_seek_ppa->findkWhCost();
    			                $new_seek_ppa_excel->setActiveSheetIndex(1);
    			                $start_fyr = $new_seek_ppa->getCell('H13', $new_seek_ppa_excel, 'Inputs & Calcs');
    			                if($phase_2_above && $start_fyr<0) {
    			                    $new_seek_options['cpw'] = $new_seek_options['cpw'] - 0.10;
    			                    $new_seek_ppa = new Default_Model_Excel_NewPPA($new_seek_options);
    			                    $new_seek_ppa_excel = $new_seek_ppa->findkWhCost();
    			                    $opts['found']=true;
    			                    $stop=true;
    			                    break;
    			                }
    			                $opts[$phase][$phase_2_totcnt++]=array('fyr' => $start_fyr, 'esc' => $new_seek_options['esc'], 'cpw' => $new_seek_options['cpw'], 'costkwh' => $new_seek_ppa->getCell('H2', $new_seek_ppa_excel, 'Cashflow'));
    			                if(isset($this->_options['debug_email'])) {
    			                    $run = 'phase-'.$phase.'-'.($phase_2_totcnt-1);
    			                    $objWriter = new PHPExcel_Writer_Excel2007($new_seek_ppa_excel);
    			                    $objWriter->save($tmp."{$run}_ppa.xlsx");
    			                    $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";

    			                    foreach($new_seek_ppa_excel->getSheetNames() as $name) {
    			                        $new_seek_ppa_excel->setActiveSheetIndexByName($name);
    			                        $objWriter = new PHPExcel_Writer_CSV($new_seek_ppa_excel);
    			                        $objWriter->setSheetIndex($new_seek_ppa_excel->getActiveSheetIndex());
    			                        $objWriter->save($tmp."{$run}_ppa-{$name}.csv");
    			                        $attachments["{$prefix}{$run}_ppa-{$name}.csv"] =$tmp."{$run}_ppa-{$name}.csv";
    			                    }
    			                }
    			                if(!$phase_2_above && $start_fyr>=0) {
    			                    $opts['found']=true;
    			                    $phase_2_above=true;
    			                    $phase_2_cnt=0;
    			                }
    			                if(++$phase_2_cnt>=2 && $phase_2_above) {
    			                    $opts['found']=true;
    			                    $stop=true;
    			                    break;
    			                }
    			                if($new_seek_options['cpw']<=1.75) {
    			                    if($start_fyr>=0) {
    			                        $opts['found']=true;
    			                        $stop=true;
    			                        break;
    			                    }
    			                    $phase=3;
    			                }
    			                break;
    			            case 3:
    			                $new_seek_ppa = new Default_Model_Excel_NewPPA($new_seek_options);
    			                $new_seek_ppa_excel = $new_seek_ppa->findkWhCost();
    			                $new_seek_ppa_excel->setActiveSheetIndex(1);
    			                $start_fyr = $new_seek_ppa->getCell('H13', $new_seek_ppa_excel, 'Inputs & Calcs');
    			                $opts[$phase][$phase_3_cnt+1]=array('fyr' => $start_fyr, 'wc_leave' => $new_seek_options['wc_leave'], 'esc' => $new_seek_options['esc'], 'cpw' => $new_seek_options['cpw'], 'costkwh' => $new_seek_ppa->getCell('H2', $new_seek_ppa_excel, 'Cashflow'));
    			                if(isset($this->_options['debug_email'])) {
    			                    $run = 'phase-'.$phase.'-'.$phase_3_cnt;
    			                    $objWriter = new PHPExcel_Writer_Excel2007($new_seek_ppa_excel);
    			                    $objWriter->save($tmp."{$run}_ppa.xlsx");
    			                    $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";

    			                    foreach($new_seek_ppa_excel->getSheetNames() as $name) {
    			                        $new_seek_ppa_excel->setActiveSheetIndexByName($name);
    			                        $objWriter = new PHPExcel_Writer_CSV($new_seek_ppa_excel);
    			                        $objWriter->setSheetIndex($new_seek_ppa_excel->getActiveSheetIndex());
    			                        $objWriter->save($tmp."{$run}_ppa-{$name}.csv");
    			                        $attachments["{$prefix}{$run}_ppa-{$name}.csv"] =$tmp."{$run}_ppa-{$name}.csv";
    			                    }
    			                }
    			                if($start_fyr>=0) {
    			                    $opts['found']=true;
    			                    $stop=true;
    			                    break;
    			                }
    			                if(++$phase_3_cnt && ($new_seek_options['wc_leave']+=$wc_leave_diff)>$wc_leave[1]) {
    			                    $stop=true;
    			                    break;
    			                }
    			                break;
    			            default:
    			                $stop=true;
    			                break;
    			        }
    			    }
    			    if(isset($this->_options['debug_email'])) {
    			        array_push($log_msgs, "Duration to run NewPPA optimization: ",My_Timer::timeSinceStartOfRequest());
    			        My_Timer::start();
    			    }
    			}
			}

			$ppa = new Default_Model_Excel_OldPPA($options);
			$ppa_excel = $ppa->findkWhCost();
			$ppa_excel->setActiveSheetIndex(1);
			if(isset($this->_options['debug_email'])) {
			    array_push($log_msgs, "Duration to run initial OldPPA calculations: ",My_Timer::timeSinceStartOfRequest());
			    My_Timer::start();
			}
			if($ppa->getCell('H13', $ppa_excel)<Default_Model_GlobalInputs::getGlobal('fyas_min')) {
			    $start_fyr = $ppa->getCell('H13', $ppa_excel);
// 			    echo "Begin fyr: {$start_fyr} - ".Default_Model_GlobalInputs::getGlobal('fyas_min').PHP_EOL;
			    $seek_options = $options;
// 			    $seek_options['costkwh'] = $ppa->getCell('B56', $ppa_excel);
			    $seek_options['esc'] = $ppa->getCell('B58', $ppa_excel);
			    $seek_options['wiser_fee'] = $ppa->getCell('B31', $ppa_excel);
			    $wiser_fee_min = $ppa->getCell('B30', $ppa_excel);
			    $stop = false;
			    $phase=1;
			    $phase_1_cnt = 0;
			    $phase_2_cnt = 0;
			    $phase_2_totcnt =1;
			    $phase_2_above = false;
			    $phase_3_cnt = 0;
			    $h5 = $ppa->getCell('E12', $ppa_excel);
			    if($h5>100001) {
			        $phase_3_max = Default_Model_GlobalInputs::getGlobal('wiser_fee_z1');
			    } else if($h5>50001) {
			        $phase_3_max = Default_Model_GlobalInputs::getGlobal('wiser_fee_z2');
			    } else {
			        $phase_3_max = Default_Model_GlobalInputs::getGlobal('wiser_fee_z3');
			    }
			    $opts = array('found' => false);
			    while(!$stop) {
			        /* Adjustments attempted in this order:
                        1) increments of PPA -$.005 AND ESC +.5% up to 3%
                        2) CPW reduction down to $1.75 (set increments of -$.25 increments, then narrow in with +$.10)
                        3) Wiser Fee reduction in 3 bands up to Z1, Z2, Z3
			        */
			        switch($phase) {
			            case 1:
// 			                $seek_options['costkwh'] = $seek_options['costkwh'] - 0.005;
			                $seek_options['esc'] = $seek_options['esc'] + 0.005;
			                $seek_ppa = new Default_Model_Excel_OldPPA($seek_options);
			                $seek_ppa_excel = $seek_ppa->findkWhCost();
			                $seek_ppa_excel->setActiveSheetIndex(1);
			                $start_fyr = $seek_ppa->getCell('H13', $seek_ppa_excel);
// 			                echo "Phase {$phase}: {$start_fyr}".PHP_EOL;
			                $opts[$phase][$phase_1_cnt+1]=array('fyr' => $start_fyr, 'esc' => $seek_options['esc'], 'costkwh' => $seek_ppa->getCell('B56', $seek_ppa_excel, 1));
			                if(isset($this->_options['debug_email'])) {
			                    $run = 'phase-'.$phase.'-'.$phase_1_cnt;
			                    $objWriter = new PHPExcel_Writer_Excel2007($seek_ppa_excel);
			                    $objWriter->save($tmp."{$run}_ppa.xlsx");
			                    $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
			                    $objWriter->setSheetIndex(0);
			                    $objWriter->save($tmp."{$run}_ppa-1.csv");
			                    $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
			                    $objWriter->setSheetIndex(1);
			                    $objWriter->save($tmp."{$run}_ppa-2.csv");
			                    $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";
			                    $attachments["{$prefix}{$run}_ppa-1.csv"] = $tmp."{$run}_ppa-1.csv";
			                    $attachments["{$prefix}{$run}_ppa-2.csv"] = $tmp."{$run}_ppa-2.csv";
			                }
			                if($start_fyr>=Default_Model_GlobalInputs::getGlobal('fyas_min')) {
			                    $opts['found']=true;
			                    $stop=true;
			                    break;
			                }
			                if(++$phase_1_cnt>=6) {
			                    /* #5108, SIL/Sales users skip phase 2 optimization */
			                    if(Zend_Auth::getInstance()->getIdentity() && (Zend_Auth::getInstance()->getIdentity()->isSales() || Zend_Auth::getInstance()->getIdentity()->isSIL())) {
			                        $phase=3;
			                    } else {
			                        $phase=2;
			                    }
			                }
			                break;
			            case 2:
			                $seek_options['esc'] = 0.02;
			                if(!$phase_2_above) {
			                    $seek_options['cpw'] = $seek_options['cpw'] - 0.25;
			                    if($seek_options['cpw']<=1.75) {
			                        $seek_options['cpw']=1.75;
			                    }
			                } else {
			                    $seek_options['cpw'] = $seek_options['cpw'] + 0.10;
			                }
			                $seek_ppa = new Default_Model_Excel_OldPPA($seek_options);
			                $seek_ppa_excel = $seek_ppa->findkWhCost();
			                $seek_ppa_excel->setActiveSheetIndex(1);
			                $start_fyr = $seek_ppa->getCell('H13', $seek_ppa_excel);
// 			                echo "Phase {$phase}: {$start_fyr}".PHP_EOL;
			                if($phase_2_above && $start_fyr<Default_Model_GlobalInputs::getGlobal('fyas_min')) {
			                    $seek_options['cpw'] = $seek_options['cpw'] - 0.10;
			                    $seek_ppa = new Default_Model_Excel_OldPPA($seek_options);
			                    $seek_ppa_excel = $seek_ppa->findkWhCost();
			                    $opts['found']=true;
			                    $stop=true;
			                    break;
			                }
			                $opts[$phase][$phase_2_totcnt++]=array('fyr' => $start_fyr, 'esc' => $seek_options['esc'], 'cpw' => $seek_options['cpw'], 'costkwh' => $seek_ppa->getCell('B56', $seek_ppa_excel, 1));
			                if(isset($this->_options['debug_email'])) {
			                    $run = 'phase-'.$phase.'-'.($phase_2_totcnt-1);
			                    $objWriter = new PHPExcel_Writer_Excel2007($seek_ppa_excel);
			                    $objWriter->save($tmp."{$run}_ppa.xlsx");
			                    $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
			                    $objWriter->setSheetIndex(0);
			                    $objWriter->save($tmp."{$run}_ppa-1.csv");
			                    $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
			                    $objWriter->setSheetIndex(1);
			                    $objWriter->save($tmp."{$run}_ppa-2.csv");
			                    $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";
			                    $attachments["{$prefix}{$run}_ppa-1.csv"] = $tmp."{$run}_ppa-1.csv";
			                    $attachments["{$prefix}{$run}_ppa-2.csv"] = $tmp."{$run}_ppa-2.csv";
			                }
			                if(!$phase_2_above && $start_fyr>=Default_Model_GlobalInputs::getGlobal('fyas_min')) {
			                    $opts['found']=true;
			                    $phase_2_above=true;
			                    $phase_2_cnt=0;
			                }
			                if(++$phase_2_cnt>=2 && $phase_2_above) {
			                    $opts['found']=true;
			                    $stop=true;
			                    break;
			                }
			                if($seek_options['cpw']<=1.75) {
			                    if($start_fyr>=Default_Model_GlobalInputs::getGlobal('fyas_min')) {
			                        $opts['found']=true;
			                        $stop=true;
			                        break;
			                    }
			                    $phase=3;
			                }
			                break;
			            case 3:
			                $seek_options['wiser_fee'] = $seek_options['wiser_fee'] - 0.005;
			                $seek_options['wiser_fee_min'] = $wiser_fee_min * (1-(($phase_3_cnt+1) * 0.005));
// 			                echo "fee min: {$wiser_fee_min}".PHP_EOL;
			                $seek_ppa = new Default_Model_Excel_OldPPA($seek_options);
			                $seek_ppa_excel = $seek_ppa->findkWhCost();
			                $seek_ppa_excel->setActiveSheetIndex(1);
			                $start_fyr = $seek_ppa->getCell('H13', $seek_ppa_excel);
// 			                echo "Phase {$phase}: {$start_fyr}".PHP_EOL;
			                $opts[$phase][$phase_3_cnt+1]=array('fyr' => $start_fyr, 'wiser_fee' => $seek_options['wiser_fee'], 'wiser_fee_min' => $seek_options['wiser_fee_min'], 'esc' => $seek_options['esc'], 'cpw' => $seek_options['cpw'], 'costkwh' => $seek_ppa->getCell('B56', $seek_ppa_excel, 1));
// 			                Zend_Debug::dump($opts);
			                if(isset($this->_options['debug_email'])) {
			                    $run = 'phase-'.$phase.'-'.$phase_3_cnt;
			                    $objWriter = new PHPExcel_Writer_Excel2007($seek_ppa_excel);
			                    $objWriter->save($tmp."{$run}_ppa.xlsx");
			                    $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
			                    $objWriter->setSheetIndex(0);
			                    $objWriter->save($tmp."{$run}_ppa-1.csv");
			                    $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
			                    $objWriter->setSheetIndex(1);
			                    $objWriter->save($tmp."{$run}_ppa-2.csv");
			                    $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";
			                    $attachments["{$prefix}{$run}_ppa-1.csv"] = $tmp."{$run}_ppa-1.csv";
			                    $attachments["{$prefix}{$run}_ppa-2.csv"] = $tmp."{$run}_ppa-2.csv";
			                }
			                if($start_fyr>=Default_Model_GlobalInputs::getGlobal('fyas_min')) {
			                    $opts['found']=true;
			                    $stop=true;
			                    break;
			                }
			                if(++$phase_3_cnt>=($phase_3_max*2)) {
			                    $stop=true;
			                    break;
			                }
			                break;
			            default:
			                $stop=true;
			                break;
			        }
			    }
			    if(isset($this->_options['debug_email'])) {
    			    array_push($log_msgs, "Duration to run PPA optimization: ",My_Timer::timeSinceStartOfRequest());
    			    My_Timer::start();
			    }
			}
			if($opts['found']) {
			    $opt = array();
			    $seek_ppa_excel->setActiveSheetIndex(1);
			    foreach(array('H7', 'B32', 'H13', 'H12', 'C51', 'B55', 'B56', 'B54', 'B53', 'B58', 'B59', 'B60', 'B57', 'B26', 'B30', 'B31', 'B13', 'B18', 'B27', 'E12') as $k) {
			        $opt[$k] = (intval($seek_ppa->getCell($k, $seek_ppa_excel))==999)?0:$seek_ppa->getCell($k, $seek_ppa_excel);
			    }
			    $opt['B53/N9'] = $opt['B53']/$tariff_detail['totals'][$tariff_detail['lowest_ut']]['N9'];
			    $opt['H12/N9'] = $opt['H12']/$tariff_detail['totals'][$tariff_detail['lowest_ut']]['N9'];
			    $yr=0;
			    $term = $seek_ppa->getCell("B55", $seek_ppa_excel);
			    $termcnt=0;
			    $seek_ppa_excel->setActiveSheetIndex(0);
			    foreach(array('B6', 'B12') as $k) {
			        $opt[$k] = (intval($seek_ppa->getCell($k, $seek_ppa_excel))==999)?0:$seek_ppa->getCell($k, $seek_ppa_excel);
			    }
			    foreach(range('B', 'Z') as $cell) {
			        if(++$termcnt>$term) { continue; }
			        $yr++;
			        if(!isset($opt['balyr'])&&$seek_ppa->getCell($cell.'21', $seek_ppa_excel)<=0) {
			            $opt['balyr']=$yr;
			        }
			        $opt['16'][] = $seek_ppa->getCell($cell.'16', $seek_ppa_excel);
			        $opt['16bal'][] = ($seek_ppa->getCell($cell.'16', $seek_ppa_excel)<=0)?$yr:false;
			        $opt['6'][] = $seek_ppa->getCell($cell.'6', $seek_ppa_excel);
			        $opt['26'][] = $seek_ppa->getCell($cell.'26', $seek_ppa_excel);
			    }
			    foreach(range('A', 'E') as $cell) {
			        if(++$termcnt>$term) { continue; }
			        $yr++;
			        if(!isset($opt['balyr'])&&$seek_ppa->getCell("A".$cell.'21', $seek_ppa_excel)<=0) {
			            $opt['balyr']=$yr;
			        }
			        $opt['16'][] = $seek_ppa->getCell("A".$cell.'16', $seek_ppa_excel);
			        $opt['16bal'][] = ($seek_ppa->getCell("A".$cell.'16', $seek_ppa_excel)<=0)?$yr:false;
			        $opt['6'][] = $seek_ppa->getCell("A".$cell.'6', $seek_ppa_excel);
			        $opt['26'][] = $seek_ppa->getCell("A".$cell.'26', $seek_ppa_excel);
			    }
                $tariffs = $tariff_detail;
                $seek_options['tariff'] = $tariffs;
                foreach($tariff_detail['totals'] as $tid => $totals) {
                    $seek_options['tariff']['lowest_ut'] = $tid;
                    $seek_ppa = new Default_Model_Excel_OldPPA($seek_options);
                    $seek_ppa_excel = $seek_ppa->findkWhCost();
                    $seek_ppa_excel->setActiveSheetIndex(1);
                    $opt['tid'][$tid] = $seek_ppa->getCell('H13', $seek_ppa_excel);
                    if(isset($this->_options['debug_email'])) {
                        $run .= "-tariff-".$tid;
                        $objWriter = new PHPExcel_Writer_Excel2007($seek_ppa_excel);
                        $objWriter->save($tmp."{$run}_ppa.xlsx");
                        $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
                        $objWriter->setSheetIndex(0);
                        $objWriter->save($tmp."{$run}_ppa-1.csv");
                        $objWriter = new PHPExcel_Writer_CSV($seek_ppa_excel);
                        $objWriter->setSheetIndex(1);
                        $objWriter->save($tmp."{$run}_ppa-2.csv");
                        $attachments["{$prefix}{$run}_ppa.xlsx"] = $tmp."{$run}_ppa.xlsx";
                        $attachments["{$prefix}{$run}_ppa-1.csv"] = $tmp."{$run}_ppa-1.csv";
                        $attachments["{$prefix}{$run}_ppa-2.csv"] = $tmp."{$run}_ppa-2.csv";
                    }
                }
			}
			$ppa = new Default_Model_Excel_OldPPA($options);
			$ppa_excel = $ppa->findkWhCost();
	    } else {
	        $newsize = $result->getDc();
	        $options['result'] = $result->getDetail('refine');
	        $meter->setSize($newsize);
	        $lowest = $tariff_detail['lowest_ut'];
	        foreach(array_keys($tariff_detail['totals']) as $ut) {
	            if($ut==$lowest) { continue; }
	            $options['result'] = $result->getDetail('refine');
	            $meter->setSize($newsize);
	            $tar_options = $options;
	            $tar_options['tariff']['lowest_ut'] = $ut;
	            $ppa = new Default_Model_Excel_OldPPA($tar_options);
	            if(intval($ppa->getValue('ppa-def-bal-yr'))!=intval($options['result']['B55']) ||
	            floatval(($meter->getDetail('si_cpw')>0)?$meter->getDetail('si_cpw'):$meter->getSite()->getDetail('cpw'))!=floatval($options['result']['B26'])
	            ) {
	                $ppa_excel = $ppa->findkWhCost();
	            } else if(intval($ppa->getValue('ppa-cashupfront'))!=intval($options['result']['B57'])) {
	                $ppa_excel = $ppa->findkWhCost();
// 	                $ppa_excel = $ppa->findBuyItSooner($ppa_excel);
	            } else {
	                $ppa_excel = $ppa->getExcelModel();
	            }
	            $ppa_excel->setActiveSheetIndex(1);
	            $tariff_detail['totals'][$ut]['fyr'] = $ppa->getCell('H13', $ppa_excel);
	            if(isset($this->_options['debug_email'])) {
                    $objWriter = new PHPExcel_Writer_Excel2007($ppa_excel);
                    $objWriter->save($tmp."ppa-firstyear-{$ut}-{$newsize}.xlsx");
                    $objWriter = new PHPExcel_Writer_CSV($ppa_excel);
                    $objWriter->setSheetIndex(0);
                    $objWriter->save($tmp."ppa-firstyear-1-{$ut}-{$newsize}.csv");
                    $objWriter = new PHPExcel_Writer_CSV($ppa_excel);
                    $objWriter->setSheetIndex(1);
                    $objWriter->save($tmp."ppa-firstyear-2-{$ut}-{$newsize}.csv");
                    $attachments["{$prefix}ppa-firstyear-{$ut}.xlsx"] = $tmp."ppa-firstyear-{$ut}-{$newsize}.xlsx";
                    $attachments["{$prefix}-1-ppa-firstyear-{$ut}.csv"] = $tmp."ppa-firstyear-1-{$ut}-{$newsize}.csv";
                    $attachments["{$prefix}-2-ppa-firstyear-{$ut}.csv"] = $tmp."ppa-firstyear-2-{$ut}-{$newsize}.csv";
	                array_push($log_msgs, "Duration to run First year calculations: ",My_Timer::timeSinceStartOfRequest());
	                My_Timer::start();
	            }
	        }

	        $ppa = new Default_Model_Excel_OldPPA($options);
	        if(intval($ppa->getValue('ppa-def-bal-yr'))!=intval($options['result']['B55']) ||
	           floatval(($meter->getDetail('si_cpw')>0)?$meter->getDetail('si_cpw'):$meter->getSite()->getDetail('cpw'))!=floatval($options['result']['B26'])
            ) {
	            $ppa_excel = $ppa->findkWhCost();
	        } else if(intval($ppa->getValue('ppa-cashupfront'))!=intval($options['result']['B57'])) {
// 	            $ppa_excel = $ppa->findBuyItSooner($ppa_excel);
	            $ppa_excel = $ppa->findkWhCost();
	        } else {
	            $ppa_excel = $ppa->getExcelModel();
	        }
	        $ppa_excel->setActiveSheetIndex(1);
	        $tariff_detail['totals'][$tariff_detail['lowest_ut']]['fyr'] = $ppa->getCell('H13', $ppa_excel);
	        if(isset($this->_options['debug_email'])) {
                $objWriter = new PHPExcel_Writer_Excel2007($ppa_excel);
                $objWriter->save($tmp."ppa-firstyear-{$ut}-{$newsize}.xlsx");
                $objWriter = new PHPExcel_Writer_CSV($ppa_excel);
                $objWriter->setSheetIndex(0);
                $objWriter->save($tmp."ppa-firstyear-1-{$ut}-{$newsize}.csv");
                $objWriter = new PHPExcel_Writer_CSV($ppa_excel);
                $objWriter->setSheetIndex(1);
                $objWriter->save($tmp."ppa-firstyear-2-{$ut}-{$newsize}.csv");
                $attachments["{$prefix}ppa-firstyear-{$ut}.xlsx"] = $tmp."ppa-firstyear-{$ut}-{$newsize}.xlsx";
                $attachments["{$prefix}-1-ppa-firstyear-{$ut}.csv"] = $tmp."ppa-firstyear-1-{$ut}-{$newsize}.csv";
                $attachments["{$prefix}-2-ppa-firstyear-{$ut}.csv"] = $tmp."ppa-firstyear-2-{$ut}-{$newsize}.csv";
	            array_push($log_msgs, "Duration to run First year calculations: ",My_Timer::timeSinceStartOfRequest());
	            My_Timer::start();
	        }
	        $meter->setDetail($tariff_detail, 'tariffs_refined')->save();
	    }
	    if(isset($this->_options['debug_email'])) {
    	    array_push($log_msgs, "Duration to begin saving calcs: ",My_Timer::timeSinceStartOfRequest());
    	    My_Timer::start();
	    }
	    $ppa_excel->setActiveSheetIndex(1);
		/* Save all of the results for debugging */
		$cell = $ppa->getCell('H13', $ppa_excel);
		$results["size-".$newsize] = $cell;

		/* If the savings from this size is better, record it as best */
		$results['best']['size'] = $meter->getSite()->isCommercial()?$tariff_detail['totals'][$tariff_detail['lowest_ut']]['N19']:$tariff_detail['totals'][$tariff_detail['lowest_ut']]['N10'];
		$results['best']['ac'] = $ppa->getCell('H7', $ppa_excel);
		$results['best']['dc'] = $ppa->getCell('H22', $ppa_excel);
		$results['best']['val'] = $cell;
		$det = array();
		foreach(array('H7', 'H22', 'H13', 'H12', 'C51', 'B55', 'B56', 'B54', 'B53', 'B30', 'B58', 'B59', 'B60', 'B57', 'B26', 'B30', 'B31','B32', 'E12') as $k) {
			$det[$k] = (intval($ppa->getCell($k, $ppa_excel))==999)?0:$ppa->getCell($k, $ppa_excel);
		}
		$yr=0;
		$term = $ppa->getCell("B55", $ppa_excel);
		$termcnt=0;
		$ppa_excel->setActiveSheetIndex(0);
		foreach(array('B6', 'B12') as $k) {
		    $det[$k] = (intval($ppa->getCell($k, $ppa_excel))==999)?0:$ppa->getCell($k, $ppa_excel);
		}
		foreach(range('B', 'Z') as $cell) {
            if(++$termcnt>$term) { continue; }
		    $yr++;
		    if(!isset($det['balyr'])&&$ppa->getCell($cell.'21', $ppa_excel)<=0) {
		        $det['balyr']=$yr;
		    }
		    $det['16'][] = $ppa->getCell($cell.'16', $ppa_excel);
		    $det['16bal'][] = ($ppa->getCell($cell.'16', $ppa_excel)<=0)?$yr:false;
		    $det['6'][] = $ppa->getCell($cell.'6', $ppa_excel);
		    $det['26'][] = $ppa->getCell($cell.'26', $ppa_excel);
		}
		foreach(range('A', 'E') as $cell) {
            if(++$termcnt>$term) { continue; }
		    $yr++;
		    if(!isset($det['balyr'])&&$ppa->getCell("A".$cell.'21', $ppa_excel)<=0) {
		        $det['balyr']=$yr;
		    }
		    $det['16'][] = $ppa->getCell("A".$cell.'16', $ppa_excel);
		    $det['16bal'][] = ($ppa->getCell("A".$cell.'16', $ppa_excel)<=0)?$yr:false;
		    $det['6'][] = $ppa->getCell("A".$cell.'6', $ppa_excel);
		    $det['26'][] = $ppa->getCell("A".$cell.'26', $ppa_excel);
		}
		if(!isset($det['balyr'])) {
		    $det['balyr']=31;
		}
		$N9 = $tariff_detail['totals'][$tariff_detail['lowest_ut']]['N9'];
		$det['N9pre'] = $tariff_detail['totals'][$tariff_detail['current_ut']]['N9'];
		$det['N19post'] = $tariff_detail['totals'][$tariff_detail['lowest_ut']]['N19'];
		$det['N9post'] = $tariff_detail['totals'][$tariff_detail['lowest_ut']]['N9'];
		$det['N7pre'] = $tariff_detail['totals'][$tariff_detail['current_ut']]['N7'];
		$det['N7post'] = $tariff_detail['totals'][$tariff_detail['lowest_ut']]['N7'];
		$det['N14pre'] = $tariff_detail['totals'][$tariff_detail['current_ut']]['N14'];
		$det['N24pre'] = $tariff_detail['totals'][$tariff_detail['current_ut']]['N24'];
		$det['N15pre'] = $tariff_detail['totals'][$tariff_detail['current_ut']]['N15'];
		$det['N25pre'] = $tariff_detail['totals'][$tariff_detail['current_ut']]['N25'];
		$det['B106'] = $B106;
		$det['years'] = $years;
		$det['B53/N9'] = $det['B53']/$det['N9post'];
		$det['H12/N9'] = $det['H12']/$det['N9post'];
		$det['current_ut'] = $tariff_detail['totals'][$tariff_detail['current_ut']];
		$det['lowest_ut'] = $tariff_detail['totals'][$tariff_detail['lowest_ut']];
		$det['opts'] = $opts;
		$det['opts_cells'] = $opt;
		$results['best']['detail'] = $det;
		$results['recalc'] = $this->_options['recalc'];

		if(isset($this->_options['debug_email'])) {
		    $objWriter = new PHPExcel_Writer_Excel2007($ppa_excel);
		    $objWriter->save($tmp."ppa-{$newsize}.xlsx");
		    $objWriter = new PHPExcel_Writer_CSV($ppa_excel);
		    $objWriter->setSheetIndex(0);
		    $objWriter->save($tmp."ppa-1-{$newsize}.csv");
		    $objWriter = new PHPExcel_Writer_CSV($ppa_excel);
		    $objWriter->setSheetIndex(1);
		    $objWriter->save($tmp."ppa-2-{$newsize}.csv");
		    $attachments["{$prefix}ppa.xlsx"] = $tmp."ppa-{$newsize}.xlsx";
		    $attachments["{$prefix}-1-ppa.csv"] = $tmp."ppa-1-{$newsize}.csv";
		    $attachments["{$prefix}-2-ppa.csv"] = $tmp."ppa-2-{$newsize}.csv";
		    $tariffcalcs["{$prefix}ppa-tariffcalcs"] = Zend_Debug::dump($tariff_detail, "TariffCalc", false);
			$mail = Default_Model_Mail::getInstance();
			$mail->setTemplate(Default_Model_Mail::EXPORT_EXCEL);
			$mail->setRecipient($this->_options['debug_email']);
			$mail->tariffcalc = Zend_Debug::dump($results, "{$prefix}PPA Results", false);
			$mail->attachments = $attachments;
			$mail->advcalc = $tariffcalcs;
			$mail->send();
			foreach($attachments as $file) {
			    unlink($file);
			}
			rmdir($tmp);
			array_push($log_msgs, "Completed at: ",My_Timer::timeSinceStartOfRequest());
			My_Timer::stop();
			Zend_Registry::get('logger')->log($log_msgs, Zend_Log::DEBUG);
		}
		if(!isset($this->_options['recalc'])) {
    		return $result->setDetail($results['best']['detail'])->setDetail($results['best']['detail'], 'refine')
    			   		  ->setAc($results['best']['ac'])
    			   		  ->setDc($results['best']['dc'])
    			   		  ->setSysSize($results['best']['size'])
    			   		  ->setTotCost($results['best']['cost'])
    			   		  ->setProcessing(false)
    			   		  ->setUpdatedOn(My_Date::now())
    			   		  ->save();
		} else {
		    return $result->setDetail($results['best']['detail'], 'refine')->setProcessing(false)->setUpdatedOn(My_Date::now())->save();
		}
	}
}