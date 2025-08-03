<?php
namespace App\Models;

use Kodeine\Metable\Metable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Replacement;
use App\Models\SolarInstaller;
use App\Support\PPAOptimizer;
use App\Support\Dropdown;
use App\Support\WSAR;
use App\Helpers\Helper;
use Auth;
use Debugbar;

class Site extends Model
{ 
	use Metable;
        
    const DATA_ROOM = 'Data Room';
    const SITE_DATA = 'Site Data';
	
    protected $fillable = ['name', 'address', 'city', 'state', 'user_id', 'area', 'zip_code', 'map_json', 'status'];
   
    protected $metaTable = 'sites_meta';
    
    protected $ppa_result = '';
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function projectUser()
    {
        return $this->belongsToMany('App\User', 'project_users', 'site_id', 'user_id');
    }
    public function company()
    {
        return $this->belongsToMany('App\Models\Company', 'company_site', 'site_id', 'company_id');
    }
    
    /*
     * Retrieves the solar installer associated with the current site
     * @return \App\Models\SolarInstaller | null
     */
    public function getSolarInstaller() {
        $solarInstallerId = $this->getMeta('solar_installer_id');
        if ($solarInstallerId) {
            return SolarInstaller::where('id', $solarInstallerId)->first();
        }
        return null;
    }
    
    public function getITCEligibility()
    {
	    if( is_numeric($this->getMeta('itc_eligibility')) )
		{
			return $this->getMeta('itc_eligibility');
		}
    }
    
    
    public function getStateTax()
    {
	    
	    if( is_numeric($this->getMeta('state_tax_rate')) )
		{
			return $this->getMeta('state_tax_rate');
		}
    }
    
    public function getSunHours()
    {
	    $data = $this->getMeta('sun_hours');
	    if(is_array($data))
	    {
		    return $data;
	    }
    }
    
    
    public function getAnnualUtilitySavings()
    {
	    $data = $this->getMeta('annual_utility_savings');
	    if(is_array($data))
	    {
		    return $data;
	    }
    }
    
    
    
    public function getSystemLocation()
    {
	   $system_location = $this->getMeta('system_location');
	   
	   $output = '';
	   foreach($system_location as $sl)
	   {
		   $output = $output .  Dropdown::$system_location[$sl] . "/";
	   }
	   return rtrim($output,'/');
    }
    
    public function getWSARPoints()
    {
		$WSAR       = new WSAR($this->id);
        $wsar_score = $WSAR->totalScore();
       return $wsar_score;
    }
    
   
    
    public function getSoilType()
    {
		if (isset($this->attributes['soil_type']))
	    { 
		    return Dropdown::$soil_type[$this->attributes['soil_type']]; 
		} 
	    return null;
	}
    
    
    public function getReplacementHostState() {
        return strtoUpper($this->state);
    }
    
    public function getReplacementHostAddress() {
        return ($this->address) . ", " . ($this->city) . ' ' . strtoUpper($this->state) . ' ' . strtoUpper($this->zip_code);
    }
    
    public function getReplacementSystemSizeDC() {
        return $this->getMeta('system_size');
    }
    
    public function getReplacementPPATermYear() {
        return 25;
    }
    
    public function getReplacementEscalationPercent() {
        if (!is_array($this->ppa_result)) {
            $ppa = new PPAOptimizer($this->id); 
            $this->ppa_result = $ppa->ppa();
        }
        $ppa_result = $this->ppa_result;
        return ((float)$ppa_result['esc'] * 100 ). '%';
    }
    
    public function getReplacementPPAPrice() {
        if (!is_array($this->ppa_result)) {
            $ppa = new PPAOptimizer($this->id); 
            $this->ppa_result = $ppa->ppa();
        }
        $ppa_result = $this->ppa_result;
        return number_format($ppa_result['price_per_kwh'], 3);
    }
    
    public function getFirstYearProduction() {
        
        $system_size = $this->getMeta('system_size');
        $energy_yield =  $this->getMeta('energy_yield');
        $year_one_production = Helper::yearOneProduction($energy_yield, $system_size);
        
        return $year_one_production;
    }
    
    public function getReplacementUtilityName() {
        
        $utility_provider = UtilityProvider::find($this->getMeta('utility_provider'));
        return !empty($utility_provider) ? $utility_provider->name : '';
    }
    
    public function getReplacementHostParcelNumber() {
        
        return $this->getMeta('parcel_number');
    }
    
   
    
    public function getReplacementHostLegalDescription() {
        
        return $this->getMeta('legal_description');
    }
    
    public function getReplacementDate() {
        
        return $this->created_at->format('d-m-Y H:i:s');
    }
    
    public function getReplacementInvestor()
    {	
	    $user = Auth::user();
	    return "{$user->first_name} {$user->last_name}";
    }
    
    /**
     * Return all the replacement that we would require for dataroom
     * @return array
     */
    public function getReplacements() {
        $variableInfo = config('constants.hf.document_replacements');
        $replacements = [];
        foreach ($variableInfo as $key => $value) {
            $valueToPut = '';
            if (!empty($this->{$value})) {
                $valueToPut = $this->{$value};
            } else if (method_exists($this, 'getReplacement' . ucfirst($value))) {
                $valueToPut = call_user_func_array([$this, 'getReplacement' . ucfirst($value)], []);
            }
            
            $replacements[Replacement::REPLACEMENT_START . $key . Replacement::REPLACEMENT_END] = $valueToPut;
        }
        return $replacements;
    }
    
    
    public function getProjectStatus()
    { 
	    if (isset($this->attributes['status']))
	    { 
		    return Dropdown::$site_status[$this->attributes['status']]; 
		} 
	    return null;
	}
	
	public function getUtility($full_name = false)
    { 
	    $utility_provider = UtilityProvider::find($this->getMeta('utility_provider'));
	    
	    if($full_name)
	    {
		    return !empty($utility_provider) ? $utility_provider->name : 'unknown';
	    }
	    else
	    {
			return !empty($utility_provider) ? Helper::acronym($utility_provider->name) : 'unknown';
		}
	}
	
	public function getPPAPrice()
	{
		if($ppa = $this->getMeta('ppa'))
		{ 
			if( isset($ppa['price_per_kwh']) )
				return $ppa['price_per_kwh']*100;
		}
		return false;
		
	}
	
	public function getUtilityPaidPrice()
	{
		if( is_numeric($this->getMeta('utility_paid_price')) )
		{
			return number_format($this->getMeta('utility_paid_price') *100, 3)+0;
		}
		return false;
	}
	
	public function isFIT()
	{
		if($this->getMeta('interconnection_type') == Dropdown::INTERCONNECTION_FIT)
		{ 
			return true;
			
		}
		else
		{
			return false;
		}
	}
	
	public function getPrice()
	{
		return $this->getPPAPrice()/100;
		
	}
	
	
	
	
	public function getTerm()
	{
		if($fixedTerm =  $this->getMeta('fixed_ppa_term'))
		{ 
			return $fixedTerm;
		}
			
		if($ppa = $this->getMeta('ppa'))
		{ 
			if( isset($ppa['term']) )
				return $ppa['term'];
		}
		return 25;
	}
	
	public function getCPW()
	{
		if ($this->isFIT())
		{
			return $this->getEPCCost();
		}
		
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['accepted_epc_cost']) )
			{
				return number_format($ppa['accepted_epc_cost'],2);
			}
			
		}
		return false;
	}
	
	public function getEPCCost()
	{
		if(!empty($this->getMeta('epc_cost')))
		{
			return number_format($this->getMeta('epc_cost'),2);
		}
		return false;
	}
	
	
	public function getAcceptedEPCCost()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['accepted_epc_cost']) )
			{
				return number_format($ppa['accepted_epc_cost'],2);
			}
			
		}
		return false;
	}
	
	
	
	public function getAvoidedElectricCost()
	{
		if($this->isFIT())
		{
			return 0;
		}
		
		if(!empty($this->getMeta('current_electric_pricing')))
		{
			return $this->getMeta('current_electric_pricing');
		}
		return false;
		
		
	}
	
	
	public function getFITPPARate()
	{
		if($this->isFIT())
		{
			return $this->getFITRate();
		}
		else
		{
			return $this->getAvoidedElectricCost();
		}
		
		
		return false;
		
		
	}
	
	
	
	public function getTotalEPCCost()
	{
		return $this->getCPW() * 1000 * $this->getSystemSize();
	}
	
	
	public function getEsc()
	{
	
	 
		
		if( $this->getFixedPPAEsc() !== null )
		{
			return $this->getFixedPPAEsc();
		}
		
		if($this->isFIT())
		{
			if( is_numeric($this->getMeta('fit_esc')))
			{
				return $this->getMeta('fit_esc');
			}
		}
	
					
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['esc']) )
				return $ppa['esc'] * 100;
		}
		return false;
	}
	
	public function getFacilityType()
	{
	
		if($val = $this->getMeta('facility_type'))
		{
			return Dropdown::$facility_types[$val];
		}
		return false;
		
	}
	
	public function getAllInCost()
	{
	
		
		if( is_numeric($this->getMeta('all_in_cost')))
		{
			return $this->getMeta('all_in_cost');
		}
		
		
		/*
		if( is_numeric( $this->getCPW() ) && is_numeric( $this->system_size ) )
		{
			$construction_cost = $this->getCPW() * $this->system_size * 1000;
			
			$construction_financing = $construction_cost * GlobalInput::where('name', 'const_fin')->value('low');
			$sales_referral_fee = $construction_cost * GlobalInput::where('name', 'sales_fee')->value('low');
			
			$total_construction_cost = $construction_cost + $construction_financing + $sales_referral_fee;
			$gross_trasanaction_fee = GlobalInput::where('name', 'ppa-devfee')->value('low');
			$minimum_gross_transaction_fee = GlobalInput::where('name', 'ppa-mindevfee')->value('low'); // 500000
			//dd($total_construction_cost * $gross_trasanaction_fee); // 182250.0
			
			if( $total_construction_cost * $gross_trasanaction_fee > $minimum_gross_transaction_fee)
			{
				$fee = $total_construction_cost * $gross_trasanaction_fee;
			}
			else
			{
				$fee = $minimum_gross_transaction_fee;
			}
			
			
			return number_format((($fee + $construction_cost) / $this->system_size) / 1000, 2);
		}
		
		*/
		
		
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['epc_all_in_cost']) )
			{
				return $ppa['epc_all_in_cost'];
			}
			
		}
		
		
		return false;
	}
		
		
		
		
		
		
	
	public function getEnergyYield()
	{
		if( is_numeric($this->getMeta('energy_yield')) && is_numeric($this->getMeta('energy_yield')))
		{
			return round($this->getMeta('energy_yield'), 2);
		}
	}
	
	
	public function getProduction()
	{
		if( is_numeric($this->getMeta('energy_yield')) && is_numeric($this->getMeta('system_size')))
		{
			return ($this->getMeta('energy_yield') * $this->getMeta('system_size'));
		}
		return false;
    }
	
	
	public function getSystemSize()
	{
	
		if( is_numeric($this->system_size) )
		{
			return $this->system_size;
		}
		return false;
	}
	
	public function getAgreementType()
	{
		if($agreement_type = $this->getMeta('agreement_type'))
		{
			return Dropdown::$agreement_types[$agreement_type];
		}
		return false;
	}
	
	
	

	
	
	
	public function getGrossIncomeOverLife()
	{
		
		$total_income = 0;
		$production = $this->getProduction();
		$price = $this->getPrice()/100;
		
		
	
		for($i = 1; $i <= $this->getTerm(); $i++)
		{
			$total_income+=  $production * ($price * (($this->getEsc() / 100) + 1));
			$production = $production * 0.995; // calculate on production, not on gross. apply esc to PPA rate directly
			
		}
		return $total_income;
	}
	
	public function getSystemSizeDC()
	{
		return $this->getMeta('system_size');
	}
	
	public function getPanelManufacturer()
	{
		$module_type = $this->getMeta('module_type');
		
		
		if(is_numeric($module_type))
		{
			$panel = Asset::find($module_type);
			return $panel->manufacturer;
		}
		return false;
	}
	
	
	public function getRackingManufacturer()
	{
		$racking_type = $this->getMeta('racking_type');
		
		if(is_numeric($racking_type))
		{
			$racking = Asset::find($racking_type);
			return $racking->manufacturer;
		}
		return false;
	}
	
	
	public function getMonitoringManufacturer()
	{
		$other = $this->getMeta('monitoring_system_input');
		
		if(strlen($other))
		{
			return $other;
		}
		elseif(is_numeric($this->getMeta('monitoring_system')))
		{
			return Dropdown::$monitoring_system[$this->getMeta('monitoring_system')]; 
		}
		else
		{
			return false;
		}
	}
	
	public function getPanelModel()
	{
		$module_type = $this->getMeta('module_type');
		
		if(is_numeric($module_type))
		{
			$panel = Asset::find($module_type);
			return $panel->model;
			
		}
		return false;
	}
	
	public function getPanelQuantity()
	{
		$module_quantity = $this->getMeta('module_quantity');
		
		if(is_numeric($module_quantity))
		{
			return $module_quantity;
		}
		return false;
	}
	
	public function getInverterManufacturer()
	{
		$inverter = $this->getMeta('inverter');
		
		if (is_array($inverter))
		{
			foreach($inverter as $i)
			{
				if(is_numeric($i['type']))
				{
					$inverter = Asset::find($i['type']);
					return ($inverter->manufacturer);
				}
			}
		}
		return false;
	}
 
	public function getInverterModel()
	{
		$inverter = $this->getMeta('inverter');
		
		if (is_array($inverter))
		{
			foreach($inverter as $i)
			{
				if(is_numeric($i['type']))
				{
					$inverter = Asset::find($i['type']);
					return ($inverter->model);
				}
			}
		}
		return false;
	}
	
	public function getInverterQuantity()
	{
		$inverter = $this->getMeta('inverter');
		
		if (is_array($inverter))
		{
			foreach($inverter as $i)
			{
				if(isset($i['quantity']))
				{
					return $i['quantity'];
				}
			}
		}
		return false;
	}
	
	
	public function interestInProperty()
	{
		if($var = $this->getMeta('interest_in_property') == 1)
		{
			return "Owns";
		}
		else
		{
			return "Leases";
		}
		return false;
	}
	
	public function getNoticeToProceedDate()
	{
 		$ntp = $this->getMeta('notice_to_proceed_date');
		if(strlen($ntp))
		{
			return $ntp;
		}
	}
	
	
	public function getFixedPPARate()
	{
 		$data = $this->getMeta('fixed_ppa_rate');
		if(is_numeric($data))
		{
			return $data;
		}
	}
	
	
	public function getFixedPPAEsc()
	{
 		$data = $this->getMeta('fixed_ppa_esc');
		if(is_numeric($data))
		{
			return $data;
		}
	}
	
	
	
	public function getCommercialOperationDate()
	{
 		$cpd = $this->getMeta('commercial_operation_date');
		if(strlen($cpd))
		{
			return $cpd;
		}
	}
        
        public function getIncentives()
        {
            $data = $this->getMeta('incentive_year');
            if (!$data) {
                $year = [];
                for($i = 1; $i <= 10; $i++) {
                    $year[$i] = '';
                } 
                return $year;
            }
            return $data;
        }
	
	
	
	public function getLandLeaseAmount()
	{
		
		$data = $this->getMeta('ongoing_system_cost_20_amount');
		$data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
		
		if(!empty($data) || $data == 0 || $data == '0')
		{
			return $data;
		}
	}
	
 
	
	
	
	
	public function getLandLeaseTerm()
	{
		
		$data = $this->getMeta('ongoing_system_cost_20_year');
		
		if(!empty($data) || $data == 0 || $data == '0')
		{
			return $data;
		}
	}
	
	
	public function getLandLeaseRate()
	{
		
		$data = $this->getMeta('ongoing_system_cost_20_rate');
		
		if(!empty($data) || $data == 0 || $data == '0')
		{
			return $data;
		}
	}
	
	public function getPropertyTaxRate()
	{
		
		$data = $this->getMeta('ongoing_system_cost_30');
		
		if(!empty($data) || $data == 0 || $data == '0')
		{
			return $data;
		}
	}
	
	public function getPropertyCostOther()
	{
		
		$data = $this->getMeta('ongoing_system_cost_40_value');
		
		if(!empty($data) || $data == 0 || $data == '0')
		{
			return $data;
		}
		
	}
	
	

	
	public function getGrossRevenue()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['gross_revenue']) )
			{
				return $ppa['gross_revenue'];
			}
			
		}
		return false;
		
	}
	
	
	
	public function getAnnualFITRevenue()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['annual_FIT_revenue']) )
			{
				return $ppa['annual_FIT_revenue'];
			}
			
		}
		return false;
		
	}
	
	
	public function getCummulativeFITRevenue()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['cummulative_FIT_revenue']) )
			{
				return $ppa['cummulative_FIT_revenue'];
			}
			
		}
		return false;
		
	}
	
	
	public function getLandLeaseRevenue()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['land_lease_revenue']) )
			{
				$data = preg_replace("/[^0-9]/","", $ppa['land_lease_revenue']);
				return $data;
				
				
			}
			
		}
		return false;
		
	}
	
	
	
	public function getLandLeaseYears()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['land_lease_years']) )
			{
				return $ppa['land_lease_years'];
			}
			
		}
		return false;
		
	}
	
	
	
	
	

	public function getTotalInvestment()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['total_investment']) )
			{
				return $ppa['total_investment'];
			}
		}
		return false;
	}
	

	public function getTotalITC()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['total_ITC']) )
			{
				return $ppa['total_ITC'];
			}
			
		}
		return false;
	}
	
	
	public function getTotalADPD()
	{
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['total_ADPD']) )
			{
				return $ppa['total_ADPD'];
			}
			
		}
		return false;
	}
	
	
	public function getFITrate()
	{
		$data = $this->getMeta('fit_rate');
		if(is_numeric($data))
		{
			return $data;
		}
	}
	
	
	
	
	public function getAnnualLandLeaseRateRevenue()
	{

		if( $this->getLandLeaseAmount() > 0 )
		{
			return $this->getLandLeaseAmount();
		}
		
		if($ppa = $this->getMeta('ppa'))
		{
			if( isset($ppa['annual_land_lease_rate_revenue']) )
			{
				return $ppa['annual_land_lease_rate_revenue'];
			}
			
		}
		return false;
	}
	
	public function totalPPAPriceYearOne()
	{
		$annualSavings = $this->getAnnualUtilitySavings();
		
		if(is_array($annualSavings) && count($annualSavings))
		{
			return ($annualSavings[0][5]);
			
		}
	}
	
	public function firstYearSavings()
	{
		$annualSavings = $this->getAnnualUtilitySavings();
		
		if(is_array($annualSavings) && count($annualSavings))
		{
			$data = filter_var($annualSavings[0][6]
			, FILTER_SANITIZE_NUMBER_INT);
			return $data;
			
		}
	}
	
	
}
