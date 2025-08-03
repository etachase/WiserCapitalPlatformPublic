<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Auth;
use App\Repositories\AuditRepository as Audit;
use App\Support\Dropdown;
use App\Support\PPAOptimizer;
use Flash;
use App\Helpers\Helper;
use Mail;
use App\Models\ProjectUser;
use Redirect;
use App\Models\UtilityProvider;
use Log;

class ResultController extends Controller
{
    /**
     * Fetch results page
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function downloadProposal($id, Request $request)
    {		
        $site = Site::find($id);
        
        $ongoing_system_cost = $site->getMeta('ongoing_system_cost');
        $error = false;
        foreach ($ongoing_system_cost as $cost_value) {
            $error = $error ? $error : (($cost_value != Dropdown::ONGOING_NONE) ? true : false);
        }
        $metas = $site->getMeta();

        $ppa = new PPAOptimizer($id); 
        $ppa_result = $ppa->ppa($request->id);

        $site = Site::find($id);
        //Area SqFt * 1.4 kW/100 sq feet= appox  system size DC

        $system_size = $site->getSystemSize();
        $energy_yield =  $site->getEnergyYield();
        $year_one_production = Helper::yearOneProduction($energy_yield, $system_size);
        $solar_cost     = $site->getPrice();
        $ppa_escalation = $site->getEsc();
        $electricity_pricing = $site->getAvoidedElectricCost();
        
        
        $mean    = ($electricity_pricing + $solar_cost) / 2;
        
        
        $first_annual_saving    = $ppa_result['first_year_savings'];
        $annual_utility_savings = $site->getAnnualUtilitySavings();
        if (is_array($annual_utility_savings)) {
            $first_annual_saving = $site->isFIT() ? $annual_utility_savings[0][7] : $annual_utility_savings[0][6];
            $total_saving = !empty($annual_utility_savings[$site->getTerm()]) ? $annual_utility_savings[$site->getTerm()][6] : "$0.00";
        }
        $data = [
            'ppa_result'          => $ppa_result,
            'site'                => $site,
            'metas'               => $metas,
            'system_size'         => $system_size,
            'energy_yield'        => $energy_yield,
            'year_one_production' => $year_one_production,
            'table_data'          => $annual_utility_savings,
            'chart'               => $request->get('canvasChart'),
            'total_saving'        => $total_saving,
            'annual_price'        => $first_annual_saving,
            'type'                => $site->isFIT() ? 'fit' : 'ppa'
        ];
//        return view('hf.pdf.download_proposal', $data);
        $pdf = \PDF::loadView('hf.pdf.download_proposal', $data);
        $pdf->setPaper('A4')->setOption('margin-bottom', 2)->setOption('margin-left', 3)
                ->setOption('margin-right', 10)->setOption('margin-top', 5)->setOption('disable-smart-shrinking', true)
                ->setOption('zoom', 0.6);
        return $pdf->download($site->name . ' Proposal.pdf');
    }
    /**
     * Download Excel
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function downloadExcel($id, Request $request)
    {		
        $site = Site::find($id);
        
        return response()->download(storage_path('files/excel/output/'.$site->name.' Model.xlsx'), 'Excel.xlsx', [
            'Pragma' => 'public',
            'Cache-control' => 'must-revalidate, post-check=0, pre-check=0',
            'Cache-control' => 'private',
            'Expires' => '0000-00-00',
            'Content-Type' => 'application/vnd.ms-excel; charset=utf-8',
            'Content-Disposition' => 'attachment;',
        ]);
    }
    /**
     * Fetch results page
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function results($id, Request $request)
    {	
		
		
		\Debugbar::disable();	
        $site = Site::find($id);
        $metas = $site->getMeta();
        $ppa_term = $site->getTerm();
        
        
        $ongoing_system_cost = $site->getMeta('ongoing_system_cost');
        $error = false;
        foreach ($ongoing_system_cost as $cost_value) {
            $error = $error ? $error : (($cost_value != Dropdown::ONGOING_NONE) ? true : false);
        }
        
        if (($site->getMeta('signed_site_lease') == 1) || ($site->getMeta('signed_power_purchase_agreement') == 1) ) {
           $page_title       = 'System Message'; 
            $page_description = '';
            
            $ongoing_sys_error = $error;
            $error_messages    = Dropdown::$edit_preliminary_information_error_messages;
           
          
            return view('hf.results_not_processed', compact('page_title', 'metas', 
                'page_description', 'site', 'error_messages', 'ongoing_sys_error'));
        }
        
	if ($request->ajax()) {
            $metas = $site->getMeta();
            
            $ppa = new PPAOptimizer($id); 
            $ppa_result = $ppa->ppa($request->id);
            // getting updated meta values
            $site = Site::find($id);
			
			
            Log::debug('dumping get Meta PPA');
            Log::debug($site->getMeta('ppa'));
            Log::debug('esc is:' . $site->getEsc());
            
            return response()->json([
                'site'                	=> $site,
                'metas'               	=> $metas,
                'annual_utility_savings'=> $site->getAnnualUtilitySavings(),
                'system_size'         	=> $site->getSystemSize(),
                'energy_yield'        	=> $site->getEnergyYield(),
                'current_electric_pricing' => $site->getAvoidedElectricCost(),
                'year_one_production'	=> number_format($site->getProduction(),0),
                'esc'					=> $site->getEsc(),
                'term'					=> $site->getTerm(),
                'all_in_cost'			=> $site->getAllInCost(),
                'accepted_epc_cost'		=> $site->getCPW(),
                'epc_cost'				=> $site->getEPCCost(),
                'fixed_ppa_esc'			=> $site->getFixedPPARate(),
                'ppa_result'          	=> $ppa_result,
                'is_fit'                => $site->isFit() ? 1 : '',
            ]);
        }	
       	
        $page_title = 'PRELIMINARY PROPOSAL'; // trans('admin/users/general.page.index.title'); // "Admin | Users";
        $page_description = '';//trans('admin/users/general.page.index.description'); // "List of users";
        $site_status = Dropdown::$site_status;
        
        return view('hf.results', compact('page_title', 'page_description', 'site', 'ppa_term', 'site_status', 'metas'));

    }
    
    /**
     * Confirm Assessment
     *
     * @param   int   $id
     * @return  View
     */
    public function confirmAssessment($id)
    {
        $site = Site::find($id);

        if (!$site) {
            abort(403);
        }
        $error = '';
        
        $modal_title   = trans('hf/dialog.preliminary-proposal.title');
        $modal_route   = route('hf.submit-assessment', array('id' => $site->id));
        $modal_submit = 'Submit';

        $modal_body = trans('hf/dialog.preliminary-proposal.body');
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body', 'modal_submit'));
    }  
    
    /**
     * Submit Assessment
     *
     * @param   int   $id
     * @return  View
     */
    public function submitAssessment($id)
    {
        $site = Site::find($id);

        if (!$site) {
            abort(403);
        }
        
        if ($site->status == Dropdown::PRELIMINARY_PPA_QUOTE) {
            $site->status = Dropdown::PRELIMINARY_PROPOSAL_REVIEW;
            $site->save();

            $facility_types   = Dropdown::$facility_types;
            $utility_provider = UtilityProvider::find($site->getMeta('utility_provider'));

            $data = [
                'project_title'    => $site->name,
                'project_type'     => !empty($site->getMeta('facility_type')) ? 
                                        $facility_types[$site->getMeta('facility_type')] : '',
                'utility_provider' => !empty($utility_provider) ? $utility_provider->name : '',
            ];
            Mail::send('emails.wiser-project', $data, function ($m) {
                $m->from(env('INFO_EMAIL'));
                $m->to(env('PROJECT_EMAIL'), 'Wiser Capital')->subject('Preliminary Project Review');
            });

            $submit_assessment = true;
        }

     
     
    	Flash::success("Your project has been submitted and a Wiser Capital representative has been assigned to your project. Our assigned representative will contact shortly.");
        return redirect()->route('hf.edit', $id);    
    }  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSiteMeta(Request $request, $id)
    {
        //$this->validate($request, config('constants.hf.'. $request->type));
        
        $site = Site::find($id);
        
        $post_metas = collect($request->except('name', '_token', '_method'))->filter(function ($item) {
            return !(empty($item) && ($item !== '0') && ($item !== 0));
        });
        
        foreach($request->except('name', '_token', '_method') as $key => $value) {
            if (empty($value) && ($value !== '0') && ($value !== 0)) {
                $site->unsetMeta($key);
            }
        }

        if ($request->type != 'ppa') {
	       $site->setMeta($post_metas->all());
        } else {
            $site->setMeta(['fixed_ppa_esc' => 	$request->fixed_ppa_esc]);
            $site->setMeta(['fixed_ppa_term' => $request->fixed_ppa_term]);
            $site->setMeta(['fixed_ppa_rate' => $request->fixed_ppa_rate]);
        }

        $site->save();
        
        Audit::log(Auth::id(), Site::SITE_DATA, 'Updated Site Meta : '. $site->name);
        
        Flash::success(trans(ucwords(str_replace('_', " ", $request->type)). ' Project Information Updated'));
        return back();
    }
}
