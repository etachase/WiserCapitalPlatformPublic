<?php 
namespace App\Support;
use App\Models\Meta;
use App\Models\Site;
use App\Models\SolarInstaller;
use App\Models\Asset;
use Debugbar;
use App\Models\Manufacturer;

class WSAR {
	
	private $metas;
	private $site;
	private $solarInstaller;
	private $solarInstallerMetas;
	const GENERAL_AND_ADMIN_EXPENSES = 1;
	const GROSS_SALES = 2;
	const COST_OF_GOODS = 3; 
	const TOTAL_SCORE = 1000;
	
public function __construct($site_id)
    {
	   
    	$this->site = Site::find($site_id);
		$this->metas = $this->site->getMeta();
		Debugbar::info($this->site->getMeta('solar_installer_id'));
		
		if( is_numeric($this->site->getMeta('solar_installer_id')) )
		{
			$this->solarInstaller = SolarInstaller::find($this->site->getMeta('solar_installer_id'));
			$this->solarInstallerMetas = $this->solarInstaller ? $this->solarInstaller->getMeta() : [];
		}
	
    }
    
    
    public function maxScore()
    {
	    return self::TOTAL_SCORE;
    }
    
    private function calculateGrowthOverOneYear($year1, $average)
    {
		
	    if (!is_numeric($year1) && !is_numeric($average) || $average == 0)
			return false;
		
		return (($year1 - $average)/$average) * 100;
    }
    
    
    private function calculateTrend($year1, $year2, $year3)
    {
	   	//year 1 being most current year
		//using calculation from: http://www.wikihow.com/Calculate-an-Annual-Percentage-Growth-Rate
		
		if (!is_numeric($year1) && !is_numeric($year3))
			return null;
		
		
	    if (!is_numeric($year1) || !is_numeric($year3) || $year3 == 0)
	    	return 0;
	    
		if ($year3 == 0 && $year1 > 0) return 100;
		
		return (pow(($year1/$year3), 1/3) - 1) * 100;
		    
    }
		
	public function standardizedDocuments()
	{
		$score = [1 => 25, 2 => 20, 3 => 0]; 
		$status = $this->site->getMeta('standardized_documents'); 
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		
		return null;
	}
	

	public function projectPermitting()
	{
		$score = [1 => 15, 2 => 10, 3 => 10, 4 => 0];
		$status = $this->site->getMeta('status_project_permit');
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
	}
	
	public function interconnectionStudyStatus()
	{
		$score = [1 => 15, 2 => 15, 3 => 0]; 
		$status = $this->site->getMeta('interconnection_study_status'); 
	
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
	}
	
	
	public function pastTwoYearsAuditedFinancials()
	{
		
		if(isset($this->solarInstaller))
		{
			$financials = $this->solarInstaller->getMeta('meta_file_past_two_years_financials');
			if(is_array($financials) && isset($financials['filename']))
			{
				return 25;
			}
		}
		return null;
	}
	
	
	function EPCfinancialsWorkExperience()
	{
		return (isset($this->solarInstaller) ? ($this->pastTwoYearsAuditedFinancials() + $this->pastProjectMegaWattInstalled()) : null ); 
	}
	
	
	public function certificateGoodStanding()
	{
		
		if( isset($this->solarInstaller) && is_array($this->solarInstaller->getMeta('meta_file_certificate_of_good_standing')))
		{
			return 5;
		}
		else
			return null;
		
		
	}
	
	
	public function installerWorkExperienceStatus()
	{
		/*
			1 => 'Green Check', 
			2 => 'Red X', 
			3 => 'Red I'
			
		*/
		
		$score = [1 => 1, 2 => null, 3 => "I"]; 
		$status = $this->site->getMeta('installer_work_experience_status');
			
			 
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
		
		
		
	}
	
	public function businessFinancialStrengthStatus()
	{
	
		
		/*
		
		$score = [1 => 1, 2 => null, 3 => "I"]; 
		$status = $this->site->getMeta('creditworthinesss_status');
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
			TODO
			what do I really do here? dropdown or actual score?
			1 => 'Green Check', 
			2 => 'Red X', 
			3 => 'Red I'
			
		*/
		
		
		
		$score = [1 => 200, 2 => 200, 3=> 200, 4 => 0];
		$status = $this->site->getMeta('public_debt_rating');
			
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
		
			
			 
		
		
		
	}
	
	
	public function pastProjectMegaWattInstalled()
	{
		if ( isset($this->solarInstaller) )
		{
			$meta = $this->solarInstaller->getMeta();
			
			if( isset($meta['commercial_mw_installed']) && is_numeric($meta['commercial_mw_installed']) &&  $meta['commercial_mw_installed'] >= 5)
			{
				return 10;
			}
			elseif( isset($meta['commercial_mw_installed']) && is_numeric($meta['commercial_mw_installed']) &&  $meta['commercial_mw_installed'] >= 1.5)
			{
				return 5;
			}
			elseif( isset($meta['commercial_mw_installed']) && is_numeric($meta['commercial_mw_installed']) )
			{
				return 0;
			}
			else
			{
				return null;
			}
		}
		return null;			
	}
	
	
	public function installerWorkExperience()
	{
		return $this->pastProjectMegaWattInstalled() + $this->pastTwoYearsAuditedFinancials() + $this->certificateGoodStanding() + $this->workersCompensation() + $this->GeneralLiability() + $this->bondingCapability();
	}
		
	public function workersCompensation()
	{
		
		if (isset($this->solarInstaller))
		{
			$workers_comp 	= $this->solarInstaller->getMeta('minimum_workers_comp_maximum_policy_limit');
			
			
			
		
			if( is_numeric($workers_comp) && $workers_comp >= 1000000 )
			{
				return 4;
			}
			elseif( is_numeric($workers_comp) && $workers_comp < 1000000 )
			{
				return 0;
			}
			
		}
		
		
		return null;
		
	}
	
	public function GeneralLiability()
	{
	 
		
	
		if (isset($this->solarInstaller))
		{
			$gen_liability 	= $this->solarInstaller->getMeta('general_liability_maximum_policy_limit');
			
			
			
		
			if( is_numeric($gen_liability) && $gen_liability >= 1000000 )
			{
				return 4;
			}
			elseif( is_numeric($gen_liability) && $gen_liability < 1000000 )
			{
				return 0;
			}
			
		}
		
		
		return null;

	}
	
	
	
	public function debtAmmortization()
	{
		$score = [1 => 10, 2 => 5, 3 => 0]; 
		$status = $this->site->getMeta('debt_ammortization'); 
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
	}
	
	public function interestRateRisk()
	{
		$score = [1 => 20, 2 => 10, 3 => 0]; 
		$status = $this->site->getMeta('interest_rate_risk'); 
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
	}
	
	
	
	
	public function bondingCapability()
	{
		
		if( isset($this->solarInstaller) &&  ($this->solarInstaller->getMeta('bonding_capability') == 1) )
		{
		 	return 2;
		}
		elseif( isset($this->solarInstaller) &&  ($this->solarInstaller->getMeta('bonding_capability') == 0) ) 
		{
			return 0;
		}
			
		return null;
	}
	
	public function certifiedRoofingStudyRemainingLifeYears()
	{
		
		$system_type = $this->site->getMeta('system_location'); 
		
		if( is_array($system_type) && !in_array(10, $system_type))
		{
			return 0;
		}
		
		$status = $this->site->getMeta('certified_roofing_study_remaining_life_year');
				
		if( is_numeric($status) && $status >= $this->site->getTerm() ) {
			return 10;			

		}
		elseif( !is_null($status)  || $status == 'not_yet_completed' )
		{
		
			return 0;
		}
		
		return null;
	}
	
	
	
	
	public function certifiedRoofingStudySoilConditions()
	{
		if($this->certifiedRoofingStudyRemainingLifeYears() > 0)
		{
			return $this->certifiedRoofingStudyRemainingLifeYears();
		}
		else
		{
			return $this->soilType();
		}
		 
		
	}
	
	public function structuralDrawingsorPlans()
	{
		//IF ADMIN decided to waive this review, always give it 15 points
		$score = [1 => 15]; 
		$status = $this->site->getMeta('waive_structural_review'); 
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		
		
		$score = [1 => 15, 2 => 10, 3 => 10, 4 => 0]; 
		$status = $this->site->getMeta('support_solar_array'); 
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;	
	}
	
	
	
	
	
	public function soilType()
	{
		
		$system_type = $this->site->getMeta('system_location'); 
		
		
		$score =0;
		
		if( is_array($system_type) && in_array(10, $system_type) && count($system_type) == 1)
		{
			return 0;
		}
		
		if( !in_array($this->site->getMeta('soil_type'), array(1,2,3)) ) 
		{
			$score+=4;
		}
		
		
		
		if( ( $this->site->getMeta('hydrology_required')  == 0))
		{
			$score+=3;	
		}
		if( ( $this->site->getMeta('eir_required')  == 0))
		{
			$score+=3;	
		}
		
	
			
		return $score;
	}
	
	
	public function interestInProperty()
	{
		
		$interest_in_property =  $this->site->getMeta('interest_in_property');
		$property_rent_term = $status =  $this->site->getMeta('property_rent_term');
		
		
		if( $interest_in_property == 1 )
		{
			return 20;
		}
		elseif( $interest_in_property == 2 && $property_rent_term >= 20 )
		{
			return 20;
		}
		elseif(  $interest_in_property == 2 && $property_rent_term < 20 )
		{
			return 10;
		}
		else
		{
			return 0;
		}
		
		return null;
	}
	
	
	public function performanceInsurance()
	{
		$score = [1 => 50, 0 => 0]; 
		$status = $this->site->getMeta('performance_insurance');
		
		if(isset($score[$status])) {
			return $score[$status];
		}
	
		return null;
	}
	
	
	public function PanelManufacturerPerformanceHistoryProcess()
	{
		$score = [1 => 30, 0 => 0]; 
		$status = $this->site->getMeta('panel_manufacturer_performance_history_process');
		
		if(isset($score[$status])) {
			return $score[$status];
		}
	
		return null;
	}
	
	
	public function panelManufacturerFinancialStrength()
	{
            $module_type = $this->site->getMeta('module_type');
		
            if(!is_numeric($module_type)) {
                return null;
            }
            $module = Asset::find($module_type);

            $total_score = null;

            if ($module && is_numeric($module->manufacturer_id) && 
                    ($manufacturer = Manufacturer::find($module->manufacturer_id))) {
                
                $score = [1 => 25, 0 => 0]; 
                $status = $manufacturer->publicity_traded;
                if(isset($score[$status])) {
                    $total_score = $total_score + $score[$status];
                }

                $score = [1 => 25, 0 => 0]; 
                $status = $manufacturer->business_length;
                if(isset($score[$status])) {
                    $total_score = $total_score + $score[$status];
                }

                /*
                    don't check the other queries, return score...
                */
                if($manufacturer->publicity_traded == 1) {
                    return $total_score;
                }

                $score = [1 => 5, 0 => 0]; 
                $status = $manufacturer->equity;
                if(isset($score[$status])) {
                    $total_score = $total_score + $score[$status];
                }


                $data = $manufacturer->yearly_sales_trend ? json_decode($manufacturer->yearly_sales_trend, true) : [];
                
                foreach($data as $value) {
                    if(empty($value) && (((int)$value) !== 0)) {
                        return $total_score;
                    }
                }

                $average = ($data['yr_2_sales_trend'] + $data['yr_3_sales_trend']) / 2;


                $trend = $this->calculateGrowthOverOneYear($data['yr_1_sales_trend'], $average);


                if($trend > 3 ) {
                    $total_score += 5;
                } elseif($trend >= -3 && $trend <= 3) {
                    $total_score += 5;
                } elseif($trend < -3) {
                    $total_score += 0;
                }
            }
            return $total_score;
	}
	
	
	public function inverterManufacturerFinancialStrength()
	{
            $inverters = $this->site->getMeta('inverter');
            $warrantyCollection = [];
            
            $previous_score = null;
            if(count($inverters))
            {
                foreach($inverters as $inverter)
                {
                    if(!is_numeric($inverter['type'])) {
                        return null;
                    }
                    $asset = Asset::find($inverter['type']);

                    $total_score = null;

                    if ($asset && is_numeric($asset->manufacturer_id) && 
                            ($manufacturer = Manufacturer::find($asset->manufacturer_id))) {
                        $score = [1 => 10, 0 => 0]; 
                        (isset($score[$manufacturer->publicity_traded])) ?
                            ($total_score = $total_score + $score[$manufacturer->publicity_traded]) : '';
                        
                        $score = [1 => 10, 0 => 0]; 
                        (isset($score[$manufacturer->business_length])) ?
                            ($total_score = $total_score + $score[$manufacturer->business_length]) : '';

                        /*
                            don't check the other queries, return score...
                        */

                        if($manufacturer->publicity_traded == 1) {
                            $previous_score = is_null($total_score) || (($previous_score > 0) && ($previous_score < $total_score)) ? $previous_score : $total_score;
                            
                            continue;
                        }

                        $score = [1 => 3, 0 => 0]; 
                        $status = $manufacturer->equity;
                        if(isset($score[$status])) {
                            $total_score = $total_score + $score[$status];
                        }


                        $data = $manufacturer->yearly_sales_trend ? json_decode($manufacturer->yearly_sales_trend, true) : [];

                        foreach($data as $value) {
                            if(empty($value) && (((int)$value) !== 0)) {
                                $previous_score = is_null($total_score) || (($previous_score > 0) && ($previous_score < $total_score)) ? $previous_score : $total_score;
                                continue;
                            }
                        }

                        $average = ($data['yr_2_sales_trend'] + $data['yr_3_sales_trend']) / 2;


                        $trend = $this->calculateGrowthOverOneYear($data['yr_1_sales_trend'], $average);


                        if($trend > 3 ) {
                            $total_score += 3;
                        } elseif($trend >= -3 && $trend <= 3) {
                            $total_score += 3;
                        } elseif($trend < -3) {
                            $total_score += 0;
                        }
                        $previous_score = is_null($total_score) || (($previous_score > 0) && ($previous_score < $total_score)) ? $previous_score : $total_score;
                    }
                }

            }

            return $previous_score;
	}
	
	
	
	public function rackingTrackingManufacturerFinancialStrength()
	{
            $racking_type_id = $this->site->getMeta('racking_type');
		
            $total_score = null;
            if(is_numeric($racking_type_id)) {
                $asset = Asset::find($racking_type_id);
                if($asset && is_numeric($asset->manufacturer_id) && 
                        ($manufacturer = Manufacturer::find($asset->manufacturer_id))) {

                    $score = [1 => 10, 0 => 0]; 
                    $status = $manufacturer->publicity_traded;
                    if(isset($score[$status])) {
                        $total_score = $total_score + $score[$status];
                    }

                    /*
                    $score = [1 => 5, 0 => 0]; 
                    $status = $manufacturer->equity;
                    if(isset($score[$status])) {
                            $total_score = $total_score + $score[$status];
                    }

                    $score = [1 => 10, 0 => 0]; 
                    $status = $manufacturer->business_length;
                    if(isset($score[$status])) {
                            $total_score = $total_score + $score[$status];
                    }
                    */

                    $data = $manufacturer->yearly_sales_trend ? json_decode($manufacturer->yearly_sales_trend, true) : [];

                    foreach($data as $value)
                    {
                        if(empty($value) && (($value) !== '0') && (($value) !== 0))
                        {
                            return $total_score;
                        }
                    }

                    $average = ($data['yr_2_sales_trend'] + $data['yr_3_sales_trend']) / 2;
                    $trend = $this->calculateGrowthOverOneYear($data['yr_1_sales_trend'], $average);


                    if($trend > 3 )
                    {
                        $total_score+= 5;
                    }
                    elseif($trend >= -3 && $trend <= 3)
                    {
                        $total_score+= 5;
                    }
                    elseif( $trend < -3)
                    {
                        $total_score+= 0;
                    }

                }
            }

            return $total_score;
	}
	
	
	
	
	public function MonitoringServices()
	{
		
		//wiser_discretionary_assessment
		$score = $this->site->getMeta('wiser_discretionary_assessment');
		
		if( is_numeric($score) )
			return $score;
			
		return null;
	}
	
	public function publicDebtRating()
	{
		
		
		$score = [1 => 200, 2 => 200, 3=> 200, 4 => 0];
		$status = $this->site->getMeta('public_debt_rating');
			
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
	}
	
	
	public function profitability()
	{
		
	
		
		$data = [
			1 => $this->site->getMeta('yr_1_income_before_tax'),
			2 => $this->site->getMeta('yr_2_income_before_tax'),
			3 => $this->site->getMeta('yr_3_income_before_tax')
		]; 
		
		foreach($data as $value)
		{
			if(empty($value) && (($value) !== '0') && (($value) !== 0))
			{
				return null;
			}
		}
		
		$average = ($data[2] + $data[3]) / 2;
		
		
		$trend = $this->calculateGrowthOverOneYear($data[1], $average);
		
		
		Debugbar::info('average trend: ' . number_format($average,2));
		Debugbar::info('profitability trend: ' . number_format($trend,2) .'% ... actual: ' . $trend);
		
		
		 
		if( in_array($this->site->getMeta('type_of_business'), [8,9])) //nonprofit and gov
		{
			if($trend > 3 )
			{
				return 40;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 40;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		else
		{
			if($trend > 3 )
			{
				return 40;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 30;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		
		return 0;
	}
	
	
	public function debtEquityRatio()
	{
		
		$liability = $this->site->getMeta('yr_1_total_liabilities');
		$equity = $this->site->getMeta('yr_1_total_equity');
		
		Debugbar::info('equity: ' . $equity);
		Debugbar::info('liability: ' . $liability);
		
		if (!is_numeric($liability) || !is_numeric($equity)) return null;
	
		
		
		
		$debt_equity_ratio =  $equity ? ($liability / $equity) : 0;
		
		//dd($debt_equity_ratio);
		
		
		Debugbar::info("Type of Business: " . $this->site->getMeta('type_of_business'));
		
		
		
		Debugbar::info("debt equity ratio: " . $debt_equity_ratio);
		
		if( $liability == 0 )
		{
			return 40;
		}
		
		if(in_array($this->site->getMeta('type_of_business'), [1])) //real estate
		{
			if(bccomp(4,$debt_equity_ratio, 6) >= 0)
			{
				Debugbar::info('real estate');
				return 40;
			}
		}
		
		if(in_array($this->site->getMeta('type_of_business'), [2,3,4, 5])) //manufacturing distrubition retail
		{
			if(bccomp(2,$debt_equity_ratio, 6)  >= 0)
			{
				return 40;
			}
		}
		
		if(in_array($this->site->getMeta('type_of_business'), [6,7,8,9])) //service, construction, nonprofit, public entity
		{
			if(bccomp(1, $debt_equity_ratio, 6)  >= 0 )
			{
				return 40;
			}
		}
		return 0;
	}
	
	
	
	public function liquidity()
	{
		
		
		$score = 0;
		
		$data = [
			0 => $this->site->getMeta('yr_1_current_assets'),
			1 => $this->site->getMeta('yr_1_current_liabilities'),
			2 => $this->site->getMeta('3_month_operating_expenses')
		]; 
		
		
		
		foreach($data as $value)
		{
			if(empty($value) && (($value) !== '0') && (($value) !== 0))
				return null;
		}
		
		if( $data[1] + $data[2] == 0  )
		{
			return 40;
		}
	
		$calc1 = bcdiv($data[0], bcadd($data[1], $data[2], 3), 3);
		
		Debugbar::info("Liquidity: " . $calc1);
		
		
		if(bccomp($calc1,1.5, 3) >= 0)
		{
			return 40;
		}
		elseif( (bccomp($calc1, 1.25, 3) >= 0) && (bccomp(1.5,$calc1, 3) >= 0)  )
		{
			return 20;
		}
		elseif(bccomp($calc1, 1.5, 3) >= 0)
		{
			return 0;
		}	
		else
		{
			return 0;
		}
	
		
		Debugbar::info("yr_1_current_assets: " .$this->site->getMeta('yr_1_current_assets'));
		Debugbar::info("yr_1_current_liabilities: " .$this->site->getMeta('yr_1_current_liabilities'));
		Debugbar::info("3_month_operating_expenses: " .$this->site->getMeta('3_month_operating_expenses'));
		Debugbar::info("liquidity calc1: " .$calc1);
		Debugbar::info("liquidity calc2: " .$calc2);
		Debugbar::info("liquidity score: " . $score);
		
		return 0;
		
	}
	
	public function debtServicesRatio()
	{
	
		
		
		$data = [
			0 => $this->site->getMeta('principle'),
			1 => $this->site->getMeta('interest'),
			2 => $this->site->getMeta('taxes'),
			3 => $this->site->getMeta('depreciation'),
			4 => $this->site->getMeta('amortization'),
			5 => $this->site->getMeta('yr_1_income_before_tax')
		]; 
		
		
		foreach($data as $value)
		{
			if(empty($value) && (($value) !== '0') && (($value) !== 0))
			{
				return null;
			}
		}
		
		
		
		$EBITDA = $data[5] + ($data[1] + $data[2] + $data[3] + $data[4]);
		
		
		
		Debugbar::info("EBITDA: " . $EBITDA);
		
		if( ($data[1] + $data[0]) == 0)
			return 40;
		
		$calc1 = bcdiv($EBITDA, bcadd($data[0], $data[1], 3), 3);
		Debugbar::info("EBITDA/(principle + interest): " . $calc1);
		
		if(bccomp($calc1,1.75, 4) >= 0)
		{
			return 40;
		}
		elseif( (bccomp($calc1, 1.25, 4) >= 0) && (bccomp(1.75,$calc1, 4) >= 0)  )
		{
			return 20;
		}
		elseif(bccomp($calc1, 1.25, 4) >= 0)
		{
			return 0;
		}	
		else
		{
			return 0;
		}
		
		
		return 0;
		
	
	}

	public function calculateProfitTrend() 
	{
		$data = [
			self::GENERAL_AND_ADMIN_EXPENSES => [
				1 => $this->site->getMeta('yr_1_general_admin_expenses'),
				2 => $this->site->getMeta('yr_2_general_admin_expenses'),
				3 => $this->site->getMeta('yr_3_general_admin_expenses')
			],
			self::GROSS_SALES => [
				1 => $this->site->getMeta('yr_1_gross_sales'),
				2 => $this->site->getMeta('yr_2_gross_sales'),
				3 => $this->site->getMeta('yr_3_gross_sales')
			],
			self::COST_OF_GOODS => [
				1 => $this->site->getMeta('yr_1_cost_of_goods'),
				2 => $this->site->getMeta('yr_2_cost_of_goods'),
				3 => $this->site->getMeta('yr_3_cost_of_goods')
			]
		];
		
		$year1Profit = $data[self::GROSS_SALES][1] - $data[self::GENERAL_AND_ADMIN_EXPENSES][1] - $data[self::COST_OF_GOODS][1];
		$year2Profit = $data[self::GROSS_SALES][2] - $data[self::GENERAL_AND_ADMIN_EXPENSES][2] - $data[self::COST_OF_GOODS][2];
		$year3Profit = $data[self::GROSS_SALES][3] - $data[self::GENERAL_AND_ADMIN_EXPENSES][3] - $data[self::COST_OF_GOODS][3];
		
		foreach($data as $category)
		{
			foreach($category as $item)
			{
				if(empty($item) && (($item) !== '0') && (($item) !== 0))
				{
					return null;
				}
			}
		}
		
		$averageProfit = ($year2Profit + $year3Profit) / 2;
		
		
		return $this->calculateGrowthOverOneYear($year1Profit, $averageProfit);
	}
	
	public function profitTrend()
	{		
		$data = [
			self::GENERAL_AND_ADMIN_EXPENSES => [
				1 => $this->site->getMeta('yr_1_general_admin_expenses'),
				2 => $this->site->getMeta('yr_2_general_admin_expenses'),
				3 => $this->site->getMeta('yr_3_general_admin_expenses')
			],
			self::GROSS_SALES => [
				1 => $this->site->getMeta('yr_1_gross_sales'),
				2 => $this->site->getMeta('yr_2_gross_sales'),
				3 => $this->site->getMeta('yr_3_gross_sales')
			],
			self::COST_OF_GOODS => [
				1 => $this->site->getMeta('yr_1_cost_of_goods'),
				2 => $this->site->getMeta('yr_2_cost_of_goods'),
				3 => $this->site->getMeta('yr_3_cost_of_goods')
			]
		];
		
		$year1Profit = $data[self::GROSS_SALES][1] - $data[self::GENERAL_AND_ADMIN_EXPENSES][1] - $data[self::COST_OF_GOODS][1];
		$year2Profit = $data[self::GROSS_SALES][2] - $data[self::GENERAL_AND_ADMIN_EXPENSES][2] - $data[self::COST_OF_GOODS][2];
		$year3Profit = $data[self::GROSS_SALES][3] - $data[self::GENERAL_AND_ADMIN_EXPENSES][3] - $data[self::COST_OF_GOODS][3];
		
		foreach($data as $category)
		{
			foreach($category as $item)
			{
				if(empty($item) && (($item) !== '0') && (($item) !== 0))
				{
					return null;
				}
			}
		}
		
		$averageProfit = ($year2Profit + $year3Profit) / 2;
		
		
		$trend = $this->calculateGrowthOverOneYear($year1Profit, $averageProfit);		
		
		Debugbar::info('average profit: '.$averageProfit);
		Debugbar::info('year 1 profit: '.$year1Profit);
		Debugbar::info('trend: '.$trend);	
		
		if( in_array($this->site->getMeta('type_of_business'), [8,9])) //nonprofit and gov
		{
			if($trend > 3 )
			{
				return 20;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 10;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		else
		{
			if($trend > 3 )
			{
				return 20;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 10;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		return 0;
	}
	
	public function calculateGrossMargin()
	{
		$data = [
			self::GROSS_SALES => [
				1 => $this->site->getMeta('yr_1_gross_sales'),
				2 => $this->site->getMeta('yr_2_gross_sales'),
				3 => $this->site->getMeta('yr_3_gross_sales')
			],
			self::COST_OF_GOODS => [
				1 => $this->site->getMeta('yr_1_cost_of_goods'),
				2 => $this->site->getMeta('yr_2_cost_of_goods'),
				3 => $this->site->getMeta('yr_3_cost_of_goods')
			]
		];
		
	foreach($data as $category)
		{
			foreach($category as $item)
			{
				if(empty($item) && (($item) !== '0') && (($item) !== 0))
				{
					return null;
				}
			}
		}
		
		
		
		$year1GrossMargin = $data[self::GROSS_SALES][1] - $data[self::COST_OF_GOODS][1];
		$year2GrossMargin = $data[self::GROSS_SALES][2] - $data[self::COST_OF_GOODS][2];
		$year3GrossMargin = $data[self::GROSS_SALES][3] - $data[self::COST_OF_GOODS][3];
		
		
		
		
		$averageGrossMargin = ($year2GrossMargin + $year3GrossMargin) / 2;
		return $this->calculateGrowthOverOneYear($year1GrossMargin, $averageGrossMargin);
	}
	
	public function grossMarginComparison()
	{
		
		$trend = $this->calculateGrossMargin();
		if (is_null($trend)) {
			return $trend;
		}
			
		if( in_array($this->site->getMeta('type_of_business'), [8,9])) //nonprofit and gov
		{
			if($trend > 3 )
			{
				return 10;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 10;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		else
		{
			if($trend > 3 )
			{
				return 10;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 5;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		return 0;
	}

	public function calculateOperationExpenditurestoSales()
	{
		$data = [
			self::GENERAL_AND_ADMIN_EXPENSES => [
				1 => $this->site->getMeta('yr_1_general_admin_expenses'),
				2 => $this->site->getMeta('yr_2_general_admin_expenses'),
				3 => $this->site->getMeta('yr_3_general_admin_expenses')
			],
			self::GROSS_SALES => [
				1 => $this->site->getMeta('yr_1_gross_sales'),
				2 => $this->site->getMeta('yr_2_gross_sales'),
				3 => $this->site->getMeta('yr_3_gross_sales')
			]
		];
		
		
		
		
		foreach($data as $category)
		{
			foreach($category as $item)
			{
				if(empty($item) && (($item) !== '0') && (($item) !== 0))
				{
					return null;
				}
			}
		}
		
		
		if( $data[self::GROSS_SALES][1] == 0  )
		{
			return 40;
		}
		
		if( $data[self::GROSS_SALES][2] == 0  )
		{
			return 40;
		}
		
		if( $data[self::GROSS_SALES][3] == 0  )
		{
			return 40;
		}
		
		
		
		$year1OES = $data[self::GENERAL_AND_ADMIN_EXPENSES][1] / $data[self::GROSS_SALES][1];
		$year2OES = $data[self::GENERAL_AND_ADMIN_EXPENSES][2] / $data[self::GROSS_SALES][2];
		$year3OES = $data[self::GENERAL_AND_ADMIN_EXPENSES][3] / $data[self::GROSS_SALES][3];
		
		
		$averagOES = ($year2OES + $year3OES) / 2;
		return $this->calculateGrowthOverOneYear($year1OES, $averagOES);
	}
	
	public function operationExpenditurestoSales()
	{
	
		
		$data = [
			self::GENERAL_AND_ADMIN_EXPENSES => [
				1 => $this->site->getMeta('yr_1_general_admin_expenses'),
				2 => $this->site->getMeta('yr_2_general_admin_expenses'),
				3 => $this->site->getMeta('yr_3_general_admin_expenses')
			],
			self::GROSS_SALES => [
				1 => $this->site->getMeta('yr_1_gross_sales'),
				2 => $this->site->getMeta('yr_2_gross_sales'),
				3 => $this->site->getMeta('yr_3_gross_sales')
			]
		];
		
		
		
		
		foreach($data as $category)
		{
			foreach($category as $item)
			{
				if(empty($item) && (($item) !== '0') && (($item) !== 0))
				{
					return null;
				}
			}
		}
		
		
		if( $data[self::GROSS_SALES][1] == 0  )
		{
			return 40;
		}
		
		if( $data[self::GROSS_SALES][2] == 0  )
		{
			return 40;
		}
		
		if( $data[self::GROSS_SALES][3] == 0  )
		{
			return 40;
		}
		
		
		
		$year1OES = $data[self::GENERAL_AND_ADMIN_EXPENSES][1] / $data[self::GROSS_SALES][1];
		$year2OES = $data[self::GENERAL_AND_ADMIN_EXPENSES][2] / $data[self::GROSS_SALES][2];
		$year3OES = $data[self::GENERAL_AND_ADMIN_EXPENSES][3] / $data[self::GROSS_SALES][3];
		
		
		$averagOES = ($year2OES + $year3OES) / 2;
		$trend = $this->calculateGrowthOverOneYear($year1OES, $averagOES);
				
		if( in_array($this->site->getMeta('type_of_business'), [8,9])) //nonprofit and gov
		{
			if($trend > 3 )
			{
				return 10;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 10;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		else
		{
			if($trend > 3 )
			{
				return 10;
			}
			elseif($trend >= -3 && $trend <= 3)
			{
				return 5;
			}
			elseif( $trend < -3)
			{
				return 0;
			}
		}
		return 0;
	}
	
	
	public function inverterWarranty()
	{
		$inverters = $this->site->getMeta('inverter');
		$warrantyCollection = [];
		
		if(count($inverters))
		{
			foreach($inverters as $inverter)
			{
				$asset = Asset::find($inverter['type']);
				
				if($asset)
				{
					$warrantyYear = $asset->getMeta('warranty_years');
					$extendedWarrantyYear = $asset->getMeta('extended_warranty_years');
					$warrantyCollection[] = ($warrantyYear + $extendedWarrantyYear);
				}
			}
			if(count($warrantyCollection))
			{
				$minWarranty = min($warrantyCollection);
				
				if( $minWarranty >= 20)
				{
					return 25;
				}
				else
				{
					return 0;
				}
				
			}
			
		}
		return null;
		
		 
	}
	
	
	
	public function rackingTrackingManufacturerWarranty()
	{
		
		$racking_type_id = $this->site->getMeta('racking_type');
		
		if(is_numeric($racking_type_id))
		{
			$asset = Asset::find($racking_type_id);
			if($asset)
			{
				$wsar_score = $asset->getMeta('sufficient_warranty');
				
				if(is_numeric($wsar_score) || $wsar_score == 0)
				{
					return $wsar_score;
				}
			}
		}
		
		return null;
	}
	
	
	public function panelWarranty()
	{
		
		/*"warranty_type" => "Linear"
		    "phase_1_years" => 25.0
		    "phase_1_percent" => 80.7
		    "_method" => "PATCH"
		    "power_output_warranty" => "Standard"
		    "warranty_phase_1_years" => "10"
		    "warranty_phase_1_percent" => "11"
		    "warranty_phase_2_years" => "12"
		    "warranty_phase_2_percent" => "13"
		*/
		
		
		$module = $this->site->getMeta('module_type');
		
		if( is_numeric($module) )
		{
			$module = Asset::find($module);

			$score = 0;
		 
		
			if ( $module )
			{
				$year 			= $module->getMeta('warranty_phase_1_years') + $module->getMeta('warranty_phase_2_years');
				$degeneration 	= $module->getMeta('warranty_phase_1_percent');
				
				if ( is_numeric($year) && is_numeric($degeneration))
				{

					if( $degeneration >= 85 && $year >= 25)
					{
						return 60;
					}
					elseif( $degeneration >= 80 && $year >= 30 )
					{
						return 55;
					}
					elseif( $degeneration >= 80 && $year >= 25)
					{
						return 50;
					}
					elseif( $degeneration >= 80 && $year >= 20)
					{
						return 45;
					}
					else
					{
						return 0;
					}
				}
			}
			
			return null;
		}
	}
	
	
	public function businessFinancialStrength()
	{
		
		return ($this->publicDebtRating() == 200 ? 200 :  $this->profitability() + $this->debtEquityRatio() + $this->liquidity() + $this->threeYearTrend() + $this->debtServicesRatio());
		
	}
	
	
	public function grossSales()
	{
		$score = 0;
		$year1GrossSales	= $this->site->getMeta('yr_1_gross_sales');
		$year2GrossSales 	= $this->site->getMeta('yr_2_gross_sales');
		$year3GrossSales 	= $this->site->getMeta('yr_3_gross_sales');
		
		
		$trend = $this->calculateTrend($year1GrossSales, $year2GrossSales, $year3GrossSales);
		
				
		if (is_numeric($trend))
		{
			
			if( in_array($this->site->getMeta('type_of_business'), [8,9])) //nonprofit and gov
			{
				if($trend < -3 )
				{
					return 0;
				}
				elseif($trend >= -3 && $trend <= 3)
				{
					return 5;
				}
				elseif( $trend > 3)
				{
					return 10;
				}
				
			}
			else //all other business ent
			{ 
				if($trend < -3 )
				{
					return 0;
				}
				elseif($trend >= -3 && $trend <= 3)
				{
					return 10;
				}
				elseif( $trend > 3)
				{
					return 20;
				}
			}
 		}
		
		return null; 
	}
	
	
	public function netMargin()
	{
		$year1CostGoods		= $this->site->getMeta('yr_1_cost_of_goods');
		$year2CostGoods		= $this->site->getMeta('yr_2_cost_of_goods');
		$year3CostGoods		= $this->site->getMeta('yr_3_cost_of_goods');

		$year1GrossSales	= $this->site->getMeta('yr_1_gross_sales');
		$year2GrossSales 	= $this->site->getMeta('yr_2_gross_sales');
		$year3GrossSales 	= $this->site->getMeta('yr_3_gross_sales');
	 
		if ( is_numeric($year1GrossSales) 
			&& is_numeric($year1CostGoods) 
				&& is_numeric($year2CostGoods) 
					&& is_numeric($year3CostGoods) 
						&& is_numeric($year1GrossSales) 
							&& is_numeric($year2GrossSales) && $year2GrossSales > 0
								&& is_numeric($year3GrossSales) && $year3GrossSales > 0
							)
		{
			
			$GrossThreeYearAverage	= ($year1GrossSales + $year2GrossSales + $year3GrossSales) / 3;
			Debugbar::info("Gross Sales Average 3 year: " . $GrossThreeYearAverage);
			
			$costGoodsAverage 		= ($year1CostGoods + $year2CostGoods + $year3CostGoods) / 3;
			Debugbar::info("Cost of Goods Average 3 year: " . $costGoodsAverage);
			
			$trend = $this->calculateTrend($year1GrossSales - $year1CostGoods, 0, $GrossThreeYearAverage - $costGoodsAverage);
			Debugbar::info("Yr1 Gross Sales - Yr1 COG / 3 Yr Gross Sales / 3 Year COG: " . $trend);
			
			
			if( in_array($this->site->getMeta('type_of_business'), [8,9])) //nonprofit and gov
			{
				return 20;
			}
			else
			{
				if($trend < -3 )
				{
					return 0;
				}
				elseif($trend >= -3 && $trend <= 3)
				{
					return 10;
				}
				elseif( $trend > 3)
				{
					return 20;
				}
			}
		}
		
		return null;
		
	}
	
	
	public function GAExpensesToGrossSales()
	{
		$score = 0;
		
		$yr1gae = $this->site->getMeta('yr_1_general_admin_expenses');
		$yr2gae = $this->site->getMeta('yr_2_general_admin_expenses');
		$yr3gae = $this->site->getMeta('yr_3_general_admin_expenses');
		
		$year1GrossSales = $this->site->getMeta('yr_1_gross_sales');
		$year2GrossSales = $this->site->getMeta('yr_2_gross_sales');
		$year3GrossSales = $this->site->getMeta('yr_3_gross_sales');

		
		
		if( is_numeric($yr1gae) 
			&& is_numeric($yr2gae) 
				&& is_numeric($yr3gae) 
					&& is_numeric($year1GrossSales) 
						&& is_numeric($year1GrossSales) 
							&& is_numeric($year2GrossSales) && $year2GrossSales > 0
								&& is_numeric($year3GrossSales) && $year3GrossSales > 0
								)
		{
			
			
			$GrossThreeYearAverage	= ($year1GrossSales + $year2GrossSales + $year3GrossSales) / 3;
			$gaeAverage				= ($yr1gae + $yr2gae + $yr3gae) / 3;
			
			
			$trend = $this->calculateTrend($yr1gae / $year1GrossSales, 0, $yr3gae / $year3GrossSales);
			
			
			Debugbar::info("Yr1G&A/Yr1 Gross compared to G&A(3year)/Gross Sales (3 Year)  " . $trend);
			
			
			if( in_array($this->site->getMeta('type_of_business'), [8,9])) //nonprofit and gov
			{
				if($trend < -3 )
				{
					return 20;
				}
				elseif($trend >= -3 && $trend <= 3)
				{
					return 10;
				}
				elseif( $trend > 3)
				{
					return 0;
				}
			}
			else
			{
				if($trend < -3 )
				{
					return 10;
				}
				elseif($trend >= -3 && $trend <= 3)
				{
					return 5;
				}
				elseif( $trend > 3)
				{
					return 0;
				}
			}
			
			
		return $score;
		}
		return null;

	}


	public function threeYearTrend()
	{
		return $this->grossSales() + $this->netMargin() + $this->GAExpensesToGrossSales();
	}
	
	
	public function generalAdminExpenses()
	{
		$general_admin_expenses = $this->site->getMeta('yr_1_general_admin_expenses') / $this->site->getMeta('yr_2_general_admin_expenses');
		 
			
		if(in_array($this->site->getMeta('type_of_business'), [8])) //nonprofit
		{
			if($general_admin_expenses <= 0.97 && $general_admin_expenses >= 1.03)
			{
				return 10;
			}
			elseif($general_admin_expenses <= 1.03)
			{
				return 20;
			}
		}
		else //all other
		{
			if($general_admin_expenses >= 0.97 && $general_admin_expenses <= 1.03)
			{
				return 5;
			}
			elseif($general_admin_expenses <= 1.03)
			{
				return 10;
			}
		}
		return null;
	}
	
	public function historyLongTermViability()
	{
		
		$score = 0;
	
		if ( $this->site->getMeta('financial_reports_audited') == 1 )
			$score+=85;
			
	
		
		
		if ( $this->site->getMeta('financial_reports_audited') === '0' )
		{
			
			if ( $this->site->getMeta('financial_reports_reviewed_audited_compiled_by_outside_cpa') == 1 )
				$score+=60;
			
			if ( $this->site->getMeta('tax_returns_obtained_through_4506_process_vetted') == 1 )
				$score+=5;
				
			if ( $this->site->getMeta('acceptable_ar_audit_with_aging_chargeoffs') == 1 )
				$score+=5;	
			
			if ( $this->site->getMeta('acceptable_payable_audit') == 1 )
				$score+=5;
				
			if ( $this->site->getMeta('statement_of_pending_legal_issues_provided') == 1 )
				$score+=5;	
				
			if ( $this->site->getMeta('liabilities_callable_or_subject_to_baloon_payments') === '0' )
				$score+=5;
			
		
			
			if ( ($this->site->getMeta('liabilities_callable_or_subject_to_baloon_payments') == 1)  && ( $this->site->getMeta('cash_flow_sufficient_to_pay_off_liabilities') === '0' ) )
				$score-=20;
			
		}
		
		
		
		
		if ( $this->site->getMeta('60_percent_or_fewer_than_5_large_clients_or_short_term_contracts') == 1 )
			$score+=25;
	
	
		
		
		if ( $this->site->getMeta('exposed_to_dependancy_or_commodity_price_increase_or_other_potential_volatility') == 1 )
			$score-=20;		
		
	

		if ( $this->site->getMeta('host_compliance_term_conditions_current_credit_facilities') === '0' )
			$score-=100;	
		

			
				
				
		
		if ( $this->site->getMeta('company_in_good_standing') == 1 )
			$score+=10;
		

			
		if ( $this->site->getMeta('derogatory_findings_public_search_record') === '0' )
			$score+=25;
		 	
				
		if ( $this->site->getMeta('derogatory_findings_public_search_record') == 1 && $this->site->getMeta('derogatory_finding_b_or_better') == 1 )
			$score+=25;
		
	
		
		if( $this->site->getMeta('volatility_of_industry') == 20)
		{
			$score+=20;
		}
		
		if( $this->site->getMeta('volatility_of_industry') == 30)
		{
			$score+=30;
		}
		
		
		return $score;	
		
		
	}
	
	public function offtakerEconomicGains()
	{
		
		$score = [1 => 25];
		$status = $this->site->getMeta('agreement_saves_money_year_one');
		if(isset($score[$status])) {
			return $score[$status];
		}
		
		$status = $this->site->getMeta('fit_lease_payments');
		if(isset($score[$status])) {
			return $score[$status];
		}
		
		
		
		return null;
		
	}
	 
	public function hostFacilitySavings()
	{
		
		$ppa = $this->site->getMeta('ppa');
		
		if( $this->site->getMeta('interconnection_type') == Dropdown::INTERCONNECTION_FIT )
		{
			return 100;
		}
		
		if(isset($ppa['first_year_savings']) && intval($ppa['first_year_savings']) > 1000)
		{
			return 100;
		}
		else
		{
			return 0;
		}
		
		return null;
	}
	
	
	public function projectFireCasualtyRisk()
	{
		$score = [1 => 5, 0 => 0];
		$status = $this->site->getMeta('rebuilt_if_casualty');
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
	}
	
	
	
	public function projectOfftakerFireCasualtyInsurance()
	{
		return $this->projectFireCasualtyRisk() + $this->offtakerFireCasualtyRisk();
	}
	
	public function offtakerFireCasualtyRisk()
	{
		
		
		$score = [1 => 5, 0 => 0];
		$status = $this->site->getMeta('host_maintain_casualty_insurance');
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
		
	}
	
	public function SNDAReviwedWaived()
	{
		/*
		if (is_array($this->site->getMeta('exhibit_c_snda')) )
		{
			return 50;
		}
		*/	
	
		$status = $this->site->getMeta('requirements_for_snda_reviewed_waived_by_wc');
		
		if(is_null($status))
		{
			return null;
		}
		
		$score = [10 => 50, 20 => 50, 30 => 0];
		if(isset($score[$status])) {
			return $score[$status];
		}
		
		return false;
		
	}
	
	
	public function titleInsuranceRoofPenetrationInsurance()
	{
		if (is_array($this->site->getMeta('facility_information_file_roof_penetration_warranty')) )
		{
			return 20;
		}
		
		if (is_array($this->site->getMeta('exhibit_d_host_facility_insurance'))  )
		{
			return 20;
		}
		
		return null;
	}
	
	public function titleInsuranceLienRightsRoofPenetrationInsurance()
	{
		/*TODO check for filename */
		
		 		
		if( is_array($this->site->getMeta('exhibit_d_host_facility_insurance')) && count($this->site->getMeta('exhibit_d_host_facility_insurance') ) ) {
			return 20;
		}
		return null;
		
		
		//file_subordination_non_disturbance_agreement[]
	 return null;	
	}
	
	
	public function publicPolicyRateRisks()
	{
		
		$score = [0 => 20, 1 => 0];
		$status = ($this->site->getMeta('policy_or_rate_change_could_threaten_ppa_cash_flow'));
		
	
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
	}
	
	
	
	
	
	
	public function OM()
	{
	
		$score = [1 => 15, 0 => 0];
		$status = ($this->site->getMeta('o&m_experience'));
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
		
	}
	
	public function servicingRisk()
	{
		
		$score = [1 => 15, 0 => 0];
		$status = ($this->site->getMeta('servicing_risk'));
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
	}
	
	
	public function sequesteredAccount()
	{
		
		
		$score = [1 => 10, 0 => 0];
		$status = ($this->site->getMeta('sequestered_account'));
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
		
	}
	
	public function businessInteruptionInsurance()
	{
		
		
		$score = [1 => 10, 0 => 0];
		$status = ($this->site->getMeta('business_interruption_insurance'));
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
		
	}
	
	public function firstLossSurety()
	{
		$score = [1 => 50, 0 => 0];
		$status = ($this->site->getMeta('supported_by_first_loss_surety'));
		
		if(isset($score[$status])) {
			return $score[$status];
		}
		return null;
		
		
	}
	
	
	public function DSCR()
	{
		
		
		$data = [
			'net_income' => $this->site->getMeta('spe_net_income'),
			'interest' => $this->site->getMeta('spe_interest'),
			'taxes' => $this->site->getMeta('spe_taxes'),
			'depreciation' => $this->site->getMeta('spe_depreciation'),
			'amortization' => $this->site->getMeta('spe_amortization'),
			'debt_obligation' => $this->site->getMeta('spe_debt_obligation')
		]; 
		
		
		
		foreach($data as $value)
		{
			if(empty($value) && ($value !== '0') && ($value !== 0))
			{
				return null;
			}
		}
		
		
		
	
	
		if($data['debt_obligation'] == 0 || $data['debt_obligation'] == '0')
		{ 
			return 30;
		}
		
		
		$EBITDA = $data['net_income'] + ($data['interest'] + $data['taxes'] + $data['depreciation'] + $data['amortization']);
		$DSCR = $EBITDA/$data['debt_obligation'];
		
	
		
		Debugbar::info("DSCR: " . $DSCR);
		
	
		 
		$calc1 = $DSCR;
		
		if(bccomp($calc1,1.30, 4) >= 0)
		{
			return 30;
		}
		elseif( (bccomp($calc1, 1.2, 4) >= 0) && (bccomp(1.3,$calc1, 4) >= 0)  )
		{
			return 20;
		}
		elseif(bccomp($calc1, 1.3, 4) >= 0)
		{
			return 0;
		}	
		else
		{
			return 0;
		}
		return 0;
	}
	
	public function debtToProjectValue()
	{
		$data = [
			'spe_debt_for_transaction' => $this->site->getMeta('spe_debt_for_transaction'),
			'spe_total_projected_investment' => $this->site->getMeta('spe_total_projected_investment')
		]; 
	
		foreach($data as $value)
		{
			if(empty($value) && (($value) !== '0') && (($value) !== 0))
			{
				return null;
			}
		}
		//DtPV=Debt for Transaction/Total Project Investment
		if($data['spe_total_projected_investment'] == 0 || $data['spe_total_projected_investment'] == '0')
		{ 
			return 40;
		}
		
		

		
		$DTPV = $data['spe_debt_for_transaction'] / $data['spe_total_projected_investment'];
		
			
		Debugbar::info("DTPV: " . $DTPV);
		
	
		 
		$calc1 = $DTPV;
	
		
		if( $calc1 > 0.6)
		{
			return 0;
		}
		elseif( $calc1 == 0.5 || $calc1 > 0.4  )
		{
			return 30;
		}
		elseif( $calc1 < 0.6)
		{
			return 40;
		}	
		else
		{
			return 0;
		}
		
		return false;




	}
	
	
	public function offtakerCreditworthiness()
	{
		return 
			$this->businessFinancialStrength() + 
			$this->historyLongTermViability() + 
			$this->offtakerEconomicGains();
	}
	
	
	
	public function systemPerformance()
	{
		return 
			$this->panelWarranty() +
			$this->panelManufacturerFinancialStrength() +
			$this->inverterWarranty() +
			$this->inverterManufacturerFinancialStrength() +
			$this->rackingTrackingManufacturerWarranty() + 
			$this->rackingTrackingManufacturerFinancialStrength() +
			$this->MonitoringServices();
	}
	
	public function EPCCreditworthiness()
	{
		return 
			$this->pastTwoYearsAuditedFinancials() + 
			$this->pastProjectMegaWattInstalled() + 
			$this->workersCompensation() + 
			$this->GeneralLiability() + 
			$this->bondingCapability() + 
			$this->certificateGoodStanding();
	}
	
	
	
	public function legalPolicy()
	{
		return
			$this->standardizedDocuments() +
			$this->projectPermitting() + 
			$this->interconnectionStudyStatus() +
			$this->interestInProperty() +
			$this->projectOfftakerFireCasualtyInsurance() +
			$this->SNDAReviwedWaived() +
			$this->titleInsuranceLienRightsRoofPenetrationInsurance() +
			$this->publicPolicyRateRisks() +
			$this->certifiedRoofingStudySoilConditions() +
			$this->structuralDrawingsorPlans();
			
	}
	
	
	public function servicingAdministration()
	{
		return 
			$this->OM() + 
			$this->servicingRisk() + 
			$this->sequesteredAccount() + 
			$this->businessInteruptionInsurance();
	}
	
	
	public function transactionalOverview()
	{
		return 
			$this->DSCR() + 
			$this->debtToProjectValue() + 
			$this->debtAmmortization() + 
			$this->interestRateRisk();
	}
	
	
	public function totalScore()
	{
		return 
			$this->offtakerCreditworthiness() + 
			$this->systemPerformance() + 
			$this->EPCCreditworthiness() + 
			$this->legalPolicy() + 
			$this->servicingAdministration() + 
			$this->transactionalOverview();
	}
	
	public function workersCompensationGeneralLiabilityBonding()
	{
		return (isset($this->solarInstaller) ? ($this->workersCompensation() + $this->GeneralLiability() + $this->bondingCapability()) : null ); 
	}

	 
	public function WSARScore()
	{		
            $wsar_score = [];
            
            foreach (WSARStructure::$wsar_score_structure as $key => $section) {
                $wsar_score[$section['name']] = [
                    'score'       => is_null($v = call_user_func_array([$this, $key], [])) ? 0 : $v,
                    'tooltip'     => Meta::where('key', '=', $section['name'])->where('type', '=', Meta::WSARSCORE)->pluck('value'),
                    'total_score' => $section['score'],
                    'items'       => []
                ];
                
                foreach ($section['items'] as $item_key => $item) {
                    $method_value = '';
                    $method_exist = false;
                    if (method_exists($this, $item_key)) {
                        $method_exist = true;
                        $method_value = call_user_func_array([$this, $item_key], []);
                    }
                    array_push($wsar_score[$section['name']]['items'], [
                        'title'   => $item['name'],
                        'status'  => $method_exist ? $method_value : null,
                        'tooltip' => Meta::where('key', '=', $item['name'])->where('type', '=', Meta::WSARSCORE)->pluck('value'),
                        'score'   => ($method_exist ? (!$method_value ? 0 : $method_value) : ''). '/'. $item['score']
                    ]);
                }
            }		
          
            return $wsar_score;
	}
}

?>