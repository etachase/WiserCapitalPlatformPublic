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

class PPAOptimizer {
	
	private $site_id;
	private $site;

	public function __construct($site_id)
    {
	     ini_set('memory_limit', '256M');
	    
	     set_time_limit ( 0 );
		 ignore_user_abort(false);
		 $this->site_id = $site_id;
		 $this->site = Site::find($site_id);
	
    }
    
    public function ppa($id = null)
    {
	    
	    //if ajax call, setup socket server
		
        
        $ppa_result = $this->site->getMeta('ppa');
        
        if(is_array($ppa_result) && isset($ppa_result['calculation_timestamp']))
        {
	       
            $count = DB::table('sites_meta')
                    ->where('sites_meta.site_id', '=', $this->site->id)
                    ->where('sites_meta.updated_at', '>', $ppa_result['calculation_timestamp'])
                    ->whereNotIn('sites_meta.key', array('ppa', 'sun_hours', 'annual_utility_savings' ) )
                    ->count();
					
					
            if($count == 0)
            {
                Debugbar::info($ppa_result); 
                
                return $ppa_result;
                
            }
        }
		
        if ($id) {
            $client   = new \Hoa\Websocket\Client(
                            new \Hoa\Socket\Client(env('WEB_SOCKET_BACKEND', 'tcp://127.0.0.1:8889'))
                        );
            $client->setHost('hoa-project.net');
            $client->connect();
            $client->send(json_encode(array('id' => $id, 'message' => 'Modeling data to find your PPA Price')));
        }
			
		
		
		
		
		$solved = false;
		
		$ppav2 = new PPA($this->site_id);
		
		if(is_numeric($this->site->getMeta('fixed_ppa_rate')))
		{
			$ppav2->setFixedPPARate($this->site->getMeta('fixed_ppa_rate'));
		}
		
		
		if($this->site->isFIT())
		{
			$ppav2->setFixedPPARate($this->site->getFITrate());	
			$label = "FIT";
		}
		else
		{
			$label = "PPA";
		}
		
		
		if($this->site->getFixedPPAEsc() !== null )
		{
			$ppav2->setEsc($this->site->getFixedPPAEsc()/100);
		}
			
			
		
		
		Log::debug( "*** starting phase 1 ***");
		
		
		
		
		$id ? $client->send(json_encode(array('id' => $id, 'status' => 'phase_1', 'message' => "Finance Modeling - Calculating {$label} Rate" ))) : '';
		
		if($ppav2->findkWhCost())
		{
			$solved = true;
		}
		 
		
		if($this->site->getFixedPPAEsc() == null )
		{
			if(!$solved)
			{
				Log::debug( "*** starting phase 2 ***");
			
				//try increment PPA rate of .005
				 
				$esc = 0;
				for($i=0; $i<6; $i++)
				{
					$esc = $esc + 0.005;	
					$ppav2->setEsc($esc);
					$id ? $client->send(json_encode(array('id' => $id, 'status' => 'phase_2', 'message' => "Finance Modeling - Calculating with Escalator: " . (($esc*100)+0)  . "%" ))) : '';
					Log::debug( "*** escalator set to {$esc} ***");
					
					
					
					if($ppav2->findkWhCost())
					{
						$solved = true;
						break;
					}
					
				}
			}
		} 
			
		
		
		if(!$solved)
		{
			Log::debug( "*** starting phase 3 ***");
			$lowestEPCCost = 1;
			$EPCCost = $this->site->getEPCCost();
			
			for($i=0; $i<10; $i++)
			{
				$EPCCost = $EPCCost - 0.25;
				
				if($lowestEPCCost > $EPCCost)
				{
					break;	
				}
				
				$id ? $client->send(json_encode(array('id' => $id, 'status' => 'phase_3', 'message' => "Finance Modeling - Calculating with EPC Cost: $" . number_format($EPCCost,2) ))) : '';
				$ppav2->setEPCCost($EPCCost);
				if( $ppav2->findkWhCost())
				{
					$solved = true;
					break;
				}
			}
		}
		
		
		if(!$solved)
		{
			Log::debug( "*** starting phase 4 ***");
			
			$DevFee = GlobalInput::where('name', 'ppa-devfee')->value('low');
			
			
			for($i=0; $i<7; $i++)
			{
				
				
				$DevFee = $DevFee - 0.01;
				
				$id ? $client->send(json_encode(array('id' => $id, 'status' => 'phase_3', 'message' => "Finance Modeling - Calculating fees..." ))) : '';
				
				Log::debug( "*** Lowering Dev Fee {$DevFee} ***");
				
				$ppav2->setDevFee($DevFee);
				if($ppav2->findkWhCost())
				{
					$solved = true;
					break;
				}
			}
		}
		
		
		
		if(!$solved)
		{
			Log::debug( "*** starting phase 3 again ***");
			$lowestEPCCost = 0;
			$EPCCost = 1;
			
			for($i=0; $i<10; $i++)
			{
				$EPCCost = $EPCCost - 0.1;
				
				if($lowestEPCCost > $EPCCost)
				{
					break;	
				}
				
				$id ? $client->send(json_encode(array('id' => $id, 'status' => 'phase_3', 'message' => "Finance Modeling - Calculating with EPC Cost: $" . number_format($EPCCost,2) ))) : '';
				$ppav2->setEPCCost($EPCCost);
				if( $ppav2->findkWhCost())
				{
					$solved = true;
					break;
				}
			}
		}
		
		
		
		//what happens if we reach here and we still hav not solved?
		
		 
		$ppav2->debugMail();
		$ppav2->storeAnnualUtilitySavings();
                
		$ppav2->storeSunHours();
		
		$id ? $client->send(json_encode(array('id' => $id, 'status' => 'complete'))) : '';
		$id ? $client->close() : '';
                                
        return $ppav2->storePPA();
        
         
    }
	    
	    
     	
}

?>
