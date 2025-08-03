<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\SolarInstaller;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Auth;
use App\Repositories\AuditRepository as Audit;
use URL;
use DB;
use App\Support\Dropdown;
use App\Support\WSAR;
use App\Support\PPAOptimizer;
use Flash;
use App\User;
use Input;
use App\Support\HFHelper;
use Illuminate\Pagination\Paginator;
use App\Helpers\Helper;
use App\Models\ProjectUser;
use App\Models\Agreement;

class InvestorController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
      
      	$user = Auth::user();
      	
      	$search = Input::get('search');
        $page   = Input::get('page');
        
      	
        $page_title = 'LIST OF ALL PROJECTS'; // trans('admin/users/general.page.index.title'); // "Admin | Users";
        $page_description = '';//trans('admin/users/general.page.index.description'); // "List of users";
        
        $view = $user->getMeta('user_project_list_preferrence') ? $user->getMeta('user_project_list_preferrence') : User::LISTVIEW;
        
        $site   = app('App\Http\Controllers\HFController')->getSites('', ['fileExist' => true, 'gridView' => true, 'currentPage' => $page, 'search' => $search]);
        $portfolios = $user->portfolios;
        
		$termSheet = Agreement::where('name', '=', 'Term Sheet')->get()->first();
		
		
        if( count($site) || !empty($search)) {
            return view('investors.index', compact('page_title', 'page_description', 'id', 'view', 'search', 'page', 'site', 'portfolios', 'termSheet' ));
        } else {
            return view('investors.index_get_started', compact('page_title', 'page_description', 'id', 'view'));
        }
        
        		   
    }
    
    public function dataTable()
    {
		$site   = app('App\Http\Controllers\HFController')->getSites('', ['fileExist' => true]);
        
        return Datatables::of($site)
            ->editColumn('name',function ($data){
                /*
                    clean-up the url construction
                */
                return '<a href="'.url(route('hf.facility-profile', ['id' => $data->id])).'">'.$data->name.'</a>';
            })
            ->addColumn('extend',function ($data){
               
                    $variable = '<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>';                    
                
                return $variable;
            })
            ->addColumn('favorite',function ($data){
                if ($data->favorite_id) {
                    $variable = '<a href="' .route('user.favorite.projects.delete',
                                    $data->favorite_id). '" title="'.
                                    trans('general.button.delete'). '"> ' . 
                                    '<i class="fa fa-star"></i></a>';
                } else {
                    $variable = '<form action="'. route('user.favorite.projects.store',
                                    $data->id) .'" method="POST" id="favorite-site-'.$data->id.'"> '
                                    . '<input type="hidden" name="_token" />'
                                    . '<i class="fa fa-star-o" id="favorite-site-icon-'.$data->id.'"'
                                    . ' style="cursor:pointer" data-id="'.$data->id.'"></form>';                    
                }
                return $variable;
            })
           ->addColumn('paid_price', function($data) {
                 return $data->getFITPPARate(). "<small>¢</small>";
            })
			->addColumn('esc', function($data) {
                 return $data->getEsc()."%";
            })
			->addColumn('all_in_epc_cost', function($data) {
                 return "<small>$</small>".$data->getAllInCost();
            })
			->addColumn('term', function($data) {
                 return $data->getTerm();
            })
			->addColumn('wsar_score', function($data) {
                 $WSAR       = new WSAR($data->id);
				 return $WSAR->totalScore() . "<small> / 1000 </small>";;
			})
			->addColumn('status',function ($data){
                $site_status = Dropdown::$site_status;
                $variable = !empty($site_status[$data->status]) ? $site_status[$data->status] : '----';
                return $variable;
            })
            ->addColumn('production',function ($data){
                return number_format($data->getProduction()) . " kWh/Year";
            })
            ->addColumn('system_location',function ($data){
                return $data->getSystemLocation();
            })
            ->addColumn('facility_type',function ($data){
                return $data->getFacilityType();
            })
            ->addColumn('agreement_type',function ($data){
                return $data->getAgreementType();
            })
            ->make(true);
    }
    

    
    public function dataTablePortfolio()
    {
		$user = Auth::user();
		 
		
		
		
        return Datatables::of($user->portfolios)
        	->addColumn('extend',function ($data){
				$variable = '<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>';                    
				return $variable;
            })
			->addColumn('paid_price', function($data) {
                 return $data->avgPaidPrice(). "<small>¢</small>";
			})
			->addColumn('esc', function($data) {
                 return $data->avgEsc() . "%";
			})
			->addColumn('total_system_size', function($data) {
                 return $data->totalSystemSize() . ' kW';
			})
			->addColumn('all_in_epc_cost', function($data) {
                 return "<small>$</small>" . $data->getAvgAllInCost();
			})
			->addColumn('term', function($data) {
                 return $data->totalTerm();
			})
			->addColumn('total_production',function ($data){
               return number_format($data->totalProduction()) . " kWh/Year";
            })
            ->addColumn('term_sheet',function ($data){
                return "<a href='#'>Term Sheet</a>";
            })
            ->addColumn('delete',function ($data){
            	return '<a data-toggle="modal" class="delete-portfolio" data-target="#modal-delete-dialog" title="Delete" href="'.url(route("portfolio.confirm-delete", ["id" => $data->id])).'"><span style="font-size:0.8em;" class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>';
        	})
        	->addColumn('sites',function ($data){
            	
            	foreach($data->sites as $site)
            	{
	            	
	            	$site->setAttribute('all_in_epc_cost', '<small>$</small>' . $site->getAllInCost());
	            	$site->setAttribute('system_size', $site->getMeta('system_size'));
	            	$site->setAttribute('paid_price', $site->getPrice() . '<small>&cent;</small>');
	            	$site->setAttribute('term', $site->getTerm());
	            	$site->setAttribute('wsar_score', $site->getWSARPoints() . "<small> / 1000 </small>");
            	}
            	
            	return $data->sites->toArray();
            	
        	})
            ->make(true);
    }
    
    
   
    
    

    
}
