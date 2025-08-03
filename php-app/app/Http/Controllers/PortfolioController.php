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
use Redirect;


class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->sites) && count($request->sites))
	    {
			$user = Auth::user();
			$portfolio = new Portfolio;
			$portfolio->name = $request->name;
			$portfolio->save();
			$portfolio->sites()->attach($request->sites);
			$portfolio->users()->attach([$user->id]);
			
		}
		$url = URL::route('investor.index');
		return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    
		\App\Models\Portfolio::destroy($id);
        $url = URL::route('investor.index');
		return redirect()->to($url);
			
			
    }
    
     public function getModalDelete($id)
    {
        $error       = null;
        $portfolio        = Portfolio::find($id);
        $modal_title = trans('hf/dialog.delete-confirm.title');

        if ($portfolio) {
            $modal_route = route('portfolio.delete', array('id' => $portfolio->id));
            $modal_body  = trans('hf/dialog.delete-confirm.body');
        }
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));
    }
}
