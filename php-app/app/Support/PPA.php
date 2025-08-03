<?php 
namespace App\Support;

use App\Models\Meta;
use App\Models\Site;
use App\Models\GlobalInput;
use App\Models\SolarInstaller;
use App\Models\Asset;
use App\Helpers\Helper;
use Debugbar;
use App\User;
use PHPExcel\PHPExcel_Calculation;
use PHPExcel\PHPExcel_IOFactory;
use Auth;
use Mail;
use DB;
use Log;
use Flysystem;

class PPA {
	
	private $metas;
	private $site;
	private $solarInstaller;
	private $solarInstallerMetas;
	private $costkwh;
	private $esc;
	private $wiserFee;
	private $wiserFeeMin;
	private $excel;
	private $site_id;
	public $PPACell;
	public $calcCell;
	public $EPCCostCell;
	public $devFeeCell;
	public $FYSCell;
	public $fixedPPARate;
	public $grossRevenue; 
	public $totalInvestment;
	public $totalITC;
	public $totalADPD;
	public $EPCCost;
	
	public function __construct($site_id)
    {
		$this->site = Site::find($site_id);
		$this->metas = $this->site->getMeta();
		
		$this->EPCCostCell = [0, 'G27'];
		$this->ESCCell = [0, 'G80'];
    	$this->PPACell = [0, 'G79'];
    	$this->FYSCell = [2, 'J28'];
    	$this->TotalSavingsCell = [2, 'I58'];
    	$this->EPCCost = [0, 'G29'];
    	$this->devFeeCell = [0, 'G34'];
    	
    	//termsheet values
    	$this->grossRevenue = [6, 'G20'];
		$this->totalInvestment = [0,'G29'];
		$this->totalITC = [12, 'E35'];
		$this->totalADPD = [12, 'E37'];
    	
    	//FOR FIT
    	$this->annualFITRevenue = [2, "I28"];
    	$this->CummulativeFITRevenue = [2, "I53"];
    	$this->landLeaseRevenue = [0, "M78"];
    	$this->landLeaseYears = [0, "M77"];
    	$this->annualLandLeaseRateRevenue = [6, 'G39']; 
    	
		$termCellArr = [
			20 	=>  'JQ84',
			21	=> 	'KC84',
			22 	=> 	'KO84',
			23 	=> 	'LA84',
			24	=>	'LM84',
			25	=>	'LY84',
			26	=>	'MK84',
			27	=>	'MW84',
			28	=>	'NI84',
			29	=>	'NU84',
			30	=>	'OG84',
		];
		$term = $this->site->getTerm();
		$this->calcCell = [6, $termCellArr[$term]]; //'LY' //OG84 for 30 years...


    	
    	$this->esc = 0;
		$this->getExcelModel();
		$this->populateExcel();
		
		
	
		
		
    }
    
    public function setFixedPPARate($PPARate)
    {
	    $this->fixedPPARate = $PPARate;
	    $this->setCell($this->PPACell, $PPARate);
	    return true;
    }
    
    
    public function getExcelModel() 
    {
    	if(!$this->excel)
    	{
	    	if($this->site->isFIT())
	    	{
		    	$file = storage_path('files/excel/Wiser Capital Model FIT.xlsx');
			}
	    	else
	    	{
		    	$file = storage_path('files/excel/Wiser Capital Model.xlsx'); 
	    	}
	    	$inputFileType = \PHPExcel_IOFactory::identify($file);
			$objReader = \PHPExcel_IOFactory::createReader($inputFileType);
			$excel = $objReader->load($file);
			
        	$this->excel = $excel;
    	}
    	else
    	{
	    	$excel = $this->excel;
    	}
    	
        return $excel;
    }
    
    public function getUpdatedExcel()
    {
        $excel = $this->excel; //$this->getExcelModel();
        \PHPExcel_Calculation::getInstance($excel)->flushInstance();
        \PHPExcel_Calculation::getInstance($excel)->clearCalculationCache();
        return $excel;
    }
    
    public function debugMail()
    {
        $user      = Auth::user();
        $objWriter = \PHPExcel_IOFactory::createWriter($this->getUpdatedExcel(), 'Excel2007');
        $objWriter->save(storage_path('files/excel/output/'.$this->site->name.' Model.xlsx'), 'Excel2007');
        if( $user->debug() ) {
            $user = Auth::user();

            return Mail::send('emails.ppa', ['user' => $user], function ($m) use ($user) {
                $m->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
                            $m->to($user->email, $user->name)->subject('Your Results')->attach(storage_path('files/excel/output/'.$this->site->name.' Model.xlsx'));
            });
        }
        return true;
    }
    
    private function setCell($cell, $value)
    {
		$excel = $this->excel;
		$excel->setActiveSheetIndex($cell[0]);
		$excel->getActiveSheet()->setCellValue($cell[1], $value);    
		return true;
    }
    
    private function getCell($data)
    {
	    $excel = $this->excel;
	    $excel->setActiveSheetIndex($data[0]);
	    \PHPExcel_Calculation::getInstance($excel)->clearCalculationCache();
    	//$token = \PHPExcel_Calculation::getInstance($excel)->parseformula($excel->getActiveSheet()->getCell($data[1]));
    	//\PHPExcel_Calculation::getInstance($excel)->flushInstance();
    	//return \PHPExcel_Calculation::getInstance($excel)->_processTokenStack($token, $data[1], $excel->getActiveSheet()->getCell($data[1]));
    	return $excel->getActiveSheet()->getCell($data[1])->getCalculatedValue();
    }
    
    public function setEsc($esc)
    {
	    $this->setCell($this->ESCCell, $esc); 
    }
    
    public function setEPCCost($EPCCost)
    {
	    $this->setCell($this->EPCCostCell, $EPCCost); 
    }
    
    public function setDevFee($data)
    {
	    $this->setCell($this->devFeeCell, $data); 
    }
    
    public function findkWhCost() 
    {
	    if(isset($this->fixedPPARate))
	    {
		    return $this->fixedPPARate;
	    }
	    
	    $excel = $this->excel;
    	
    	$avoidedCost = $this->site->getAvoidedElectricCost() - 0.001;
    	
    	$PPARate = 0.04;
    	  
    	\PHPExcel_Calculation::getInstance($excel)->clearCalculationCache();
    	
    	
    	for($i=0; $i<100; $i++)  
    	{
	    	Log::debug( "current time:" . date('H:i:s', time() - date('Z'))	); 
    	   	
    	   	$PPARate+=0.005;
    	 
		   	if($PPARate >= $avoidedCost  )
	    	{
		    	Log::debug( "******** PPA Rate Higher Than Current Rate ********" . $PPARate );
		    	return false;
	    	}
	    	
    	   	$this->setCell($this->PPACell, $PPARate);
    	    Log::debug( "Price per kWh is: " . $PPARate );
	    	
	    	$c = $this->getCell($this->calcCell);
	    	
	    	
	    	if($c > 0)
	    	{
		    	 Log::debug( "Calc cell is " . $c );
		    	 Log::debug( "SOLVED At Rate " . $PPARate );
		    	 break;
	    	}
	    	else
	    	{
		    	Log::debug( "Calc cell is " . $c );
	    	}
	    	
    	}
    	
    	
    	return $excel;
    }
        
    
    public function populateExcel() {
	    
	    $excel = $this->excel;

	    //INPUTS TAB
        $globals = [
	        '0' => [ //inputs
		        'G56' => 'ppa-te-cap',
	            'G59' => 'ppa-wc-leave',
	            'M91' => 'ppa-itc',
	            'M92' => 'ITC_eligibility_percent',
	            'M49' => 'ppa-tedr',
	            'M54' => 'ppa-irr',
	            'M99' => 'ppa-db',
	            'M95' => 'state_tax_rate',
	            'M104' => 'ppa-bdw',
	            'M94' => 'ppa-fedtax',
	            'G34' => 'ppa-devfee',
	            'G35' => 'ppa-mindevfee',
	            'G38' => 'const_fin',
	            'G37' => 'sales_fee',
	            'G40' => 'te_fee',
	            'M82' => 'llc_fee',
	            'M80' => 'ppa-omkwdc',
				'M18' => 'ppa-degrad',
				'M81' => 'ppa-omesc',
				'G21' => 'ppa-disbuy',
	            'M79' => 'ppa-ommin',
	            'G78' => 'ppa-def-bal-yr',
				'G82' => 'ppa-cashupfront',
            	'G79' => 'ppa-costkwh',
				'G58' => 'ppa-loan-lev',
				'M61' => 'ppa-loan-int',
	            'M46' => 'tei-num-yr',
	            'M97' => 'ppa-hawaiitci',
	            'M96' => 'ppa-hawaiinonres',
	            'M62' => 'ppa-loan-debt-rat',
	            'G81' => 'escalator-year-cap',
	            'G56' => 'cap-stack-tax-equity',
	            'G57' => 'cap-stack-sponsor-equity',
	            'G58' => 'cap-stack-leverage',
	            'G59' => 'cap-stack-wiser',
	            'M49' => 'ppa-disbuy',
	            'M61' => 'debt-interest-rate',
	            'M60' => 'debt-term-years'
	                                  
	        ],
	        '8' => [ //lookup
		    	'C18' => 'ppa-macrs-1',
	            'C19' => 'ppa-macrs-2',
	            'C20' => 'ppa-macrs-3',
	            'C21' => 'ppa-macrs-4',
	            'C22' => 'ppa-macrs-5',
	            'C23' => 'ppa-macrs-6'
	        ]
	    ];
		
        foreach($globals as $sheet_index  => $cell) 
        {
	        $excel->setActiveSheetIndex($sheet_index);
	        foreach($cell as $cell => $global)
	        {
		    	if(!empty($val = GlobalInput::where('name', $global)->value('low')))
				{
					$excel->getActiveSheet()->setCellValue($cell, $val);
				}
				else
				{
					Log::debug( "missing global for: {$cell}, global value {$global} ");
				}
		    }
		}
       
        
		
        //INPUTS
        $excel->setActiveSheetIndex(0);
        $excel->getActiveSheet()->setCellValue('G10', $this->site->name);
		$excel->getActiveSheet()->setCellValue('G12', $this->site->address);
		$excel->getActiveSheet()->setCellValue('G13', $this->site->city);
		$excel->getActiveSheet()->setCellValue('G14', $this->site->state);
		$excel->getActiveSheet()->setCellValue('G15', $this->site->zip_code);
		$excel->getActiveSheet()->setCellValue('G27', $this->site->getEPCCost());
		$excel->getActiveSheet()->setCellValue('M20', $this->site->getSystemLocation());
		$excel->getActiveSheet()->setCellValue('M21', $this->site->getSoilType());
		
		$excel->getActiveSheet()->setCellValue('G78', $this->site->getTerm());
		
		
		$excel->getActiveSheet()->setCellValue('M63', 'Yes');
		
		
		//new ones
		
		if(!empty($this->site->getITCEligibility()))
		{
			$excel->getActiveSheet()->setCellValue('M92', $this->site->getITCEligibility()/100);
		}
		
		
		
		if(!empty($this->site->getStateTax()))
		{
			$excel->getActiveSheet()->setCellValue('M95', $this->site->getStateTax()/100);
		}
		
		
		/*TODO , make term dynamic */
	    $excel->getActiveSheet()->setCellValue('M70', $this->site->getTerm());
	    
	    
		
		$excel->getActiveSheet()->setCellValue('G26', $this->site->getUtility(true));
		$excel->getActiveSheet()->setCellValue('M37', $this->site->getEnergyYield());
		$excel->getActiveSheet()->setCellValue('M10', $this->site->getNoticeToProceedDate());
		$excel->getActiveSheet()->setCellValue('M11', $this->site->getCommercialOperationDate());
		$val = GlobalInput::where('name', 'tei-ret')->value('low');
        $excel->getActiveSheet()->setCellValue('M48', $this->normalize_percent($val));
        
        $excel->getActiveSheet()->setCellValue('G18',  $this->site->getFITPPARate());
        
		$excel->getActiveSheet()->setCellValue('M19', $this->array_avg(array(GlobalInput::where('name', 'derate')->value('low'), GlobalInput::where('name', 'derate')->value('high'))));
	   
	   
		$landLease = $this->site->getLandLeaseAmount();
	   	if(!empty($landLease) || $landLease == 0 || $landLease == '0')
	   	{
		   $excel->getActiveSheet()->setCellValue('M78', $landLease);
	   	}
	   
	   	$landLeaseTerm = $this->site->getLandLeaseTerm();
	   	if(!empty($landLeaseTerm) || $landLeaseTerm == 0 || $landLeaseTerm == '0')
	   	{
		   $excel->getActiveSheet()->setCellValue('M77', $landLeaseTerm);
	   	}
	   
	   	$landLeaseRate = $this->site->getLandLeaseRate();
	   	if(!empty($landLeaseRate) || $landLeaseRate == 0 || $landLeaseRate == '0')
	   	{
		   $excel->getActiveSheet()->setCellValue('M86', $landLeaseRate/100);
	   	}
	   
	   	$propertyTaxRate = $this->site->getPropertyTaxRate();
	   	if(!empty($propertyTaxRate) || $propertyTaxRate == 0 || $propertyTaxRate == '0')
	   	{
		   $excel->setActiveSheetIndex(1);
		   $excel->getActiveSheet()->setCellValue('E9',$propertyTaxRate/100);
		   $excel->setActiveSheetIndex(0);
	   	}
	   	
		
		
		$propertyCostOther = $this->site->getPropertyCostOther();
	   	if(!empty($propertyCostOther) || $propertyCostOther == 0 || $propertyCostOther == '0')
	   	{
		   $excel->getActiveSheet()->setCellValue('M85', $propertyCostOther);
	   	}
	   	
	   	
	   	
	   	
	   
       /*
       if (is_array($arr = $this->site->getMeta('incentive_year')))
		
		   if(is_numeric($arr[1]))
		   {
			 	$excel->getActiveSheet()->setCellValue('G85', $arr[1]);  
		   }
		}
		*/
		
		if (is_array($arr = $this->site->getMeta('incentive_year')))
		{
		   $years = 0;
		   
		   $row = 96;
		   foreach($arr as $discount)
		   {
			   if(is_numeric($discount))
			   {
				   
				   $excel->getActiveSheet()->setCellValue('F'.$row, 0);
				   $excel->getActiveSheet()->setCellValue('G'.$row, $discount);
				   $row++;
				   $years++;
			   }
		   }
		   $excel->getActiveSheet()->setCellValue('G87',  $years);
		}
		
		if (is_numeric($incentive_dc = $this->site->getMeta('incentive_dc')))
		{
		   $excel->getActiveSheet()->setCellValue('G87',  $incentive_dc);
		}
        
       	$excel->getActiveSheet()->setCellValue('M17',  $this->site->getMeta('system_size') );
        
        
        
        
       if(isset($this->costkwh)) {
            $excel->getActiveSheet()->setCellValue('G79', $this->costkwh);
        }
        if(isset($this->esc)) {
            $excel->getActiveSheet()->setCellValue('G80', $this->esc);
        }
        if(isset($this->wiserFee)) {
            $excel->getActiveSheet()->setCellValue('G34', $this->wiserFee);
        }
        if(isset($this->wiserFeeMin)) {
            $excel->getActiveSheet()->setCellValue('G35', $this->wiserFeeMin);
        }
        
        
      
        
        
           /*
		//LOOKUP
		$excel->setActiveSheetIndex(8);
		 
		 
		$val = GlobalInput::where('name', 'ppa-tedr')->value('low') * 100;
        $val2 = GlobalInput::where('name', 'ppa-tax-table-'.$val)->value('low');
        $excel->getActiveSheet()->setCellValue('D79', $val2);
        
        $val = GlobalInput::where('name', 'ppa-disbuy')->value('low') * 100;
        $val2 = GlobalInput::where('name', 'ppa-tax-table-'.$val)->value('low');
        $excel->getActiveSheet()->setCellValue('D83', $val2);
        
		
		
		//TARIFF
		$excel->setActiveSheetIndex(1);
        
        //$excel->getActiveSheet()->setCellValue('B6', Helper::production($this->site->getMeta('system_size'), $this->site->getMeta('energy_yield')));
		$excel->getActiveSheet()->setCellValue('B5',  $this->site->getMeta('energy_yield')); 

		
        $excel->getActiveSheet()->setCellValue('B35', 0); //SUN HOURS
        $excel->getActiveSheet()->setCellValue('H22', 0); //TBD
        $excel->getActiveSheet()->setCellValue('J22', 0); //MICRO INVERTER
        $excel->getActiveSheet()->setCellValue('L22', 0); //TILT
	    */
      
        
        /*
        $excel->setActiveSheetIndex(0);
        \PHPExcel_Calculation::getInstance($excel)->flushInstance();
        \PHPExcel_Calculation::getInstance($excel)->clearCalculationCache();
        */
        return $excel;
    }
    
    
    
    private function normalize_percent($value) {
        return $value/100;
        /*
         * If the value does not contain a period, convert to a more useful
         * notation to avoid breaking things. 70 becomes 0.7, 0.02 becomes 0.02,
         * 50.04 becomes 0.5004
         */
        $value = (strpos($value, ".") !== -1) ? $value : $value / 100;
        return ($value<1) ? $value : $value / 100;
    }
    
    public static function array_avg($array) {
        if(!is_array($array) || count($array) == 0) {
            return $array;
        } else {
            return array_sum($array) / count($array);
        }
    }
    
    public function storeAnnualUtilitySavings()
    {
	    $excel = $this->excel;
	    
	    $range = $excel->setActiveSheetIndex(2)->rangeToArray('C28:K58');
	    
	   
	
	    foreach($range as $key => $r)
	    {
		 
		    
		    if( empty($range[$key][1]))
		    {
				unset($range[$key]);
		    }
	    }
	    

	    
	    $this->site->setMeta(['annual_utility_savings' => $range]);
		$this->site->save();
	    
	    Log::debug( "Saved Annual Utility Savings Array");
	
	    
	    return true;
	    
    }
    
    
    public function storeSunHours()
    {
	    $excel = $this->excel;
	    
	    $array = $excel->setActiveSheetIndex(11)->rangeToArray('A32:C44');
	    $this->site->setMeta(['sun_hours' => $array]);
		$this->site->save();
	    
	    Log::debug( "Saved Sun Hours Array");
	   
		return true;
	    
    }
    
    
    
     
     
    
    public function storePPA()
	{
		
		
		$results = [
	        'price_per_kwh' => round($this->getCell($this->PPACell),4),
	        'first_year_savings' =>  intval($this->getCell($this->FYSCell)),
	        'total_savings' => intval($this->getCell($this->TotalSavingsCell)),
	        'accepted_epc_cost' => $this->getCell($this->EPCCostCell), //round($this->getCell([1, 'B26']),2),
	        'esc' => $this->getCell($this->ESCCell)+0,
	        'epc_cost' => round($this->site->getEPCCost(),2),
	        'term' => $this->site->getTerm(),
			'calculation_timestamp' => date("Y-m-d H:i:s"),
			'fixed_ppa_rate' => $this->fixedPPARate,
			'gross_revenue' => $this->getCell($this->grossRevenue),
			'total_investment' => $this->getCell($this->totalInvestment),
			'total_ITC'		=> $this->getCell($this->totalITC),
			'total_ADPD'	=> $this->getCell($this->totalADPD),
			'epc_all_in_cost' => $this->getCell($this->EPCCost) / ($this->site->getSystemSize() * 1000)
		    //'wiser_fee' =>  $this->getCell([1, 'B30']),
	        //'wiser_min_fee' => $this->getCell([1, 'B30']),
	    ];
		
		
		if($this->site->IsFIT())
		{
			$results['annual_FIT_revenue'] = $this->getCell($this->annualFITRevenue);
			$results['cummulative_FIT_revenue'] = $this->getCell($this->CummulativeFITRevenue);
			$results['land_lease_revenue'] = $this->getCell($this->landLeaseRevenue);
			$results['land_lease_years'] = $this->getCell($this->landLeaseYears);
			$results['annual_land_lease_rate_revenue'] = $this->getCell($this->annualLandLeaseRateRevenue);
			
			
			
		}
		
		
		$this->site->setMeta(['ppa' => $results]);
		$this->site->save();
        Log::debug( "Saved PPA Array");
        Log::debug($results);
         
        
        return $results;	
	}
}
?>
