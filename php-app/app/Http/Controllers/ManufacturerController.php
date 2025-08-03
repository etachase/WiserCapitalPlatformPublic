<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Yajra\Datatables\Datatables;
use Flash;
use URL;
use App\Repositories\AuditRepository as Audit;
use Auth;
use App\Models\Manufacturer;
use App\Http\Requests\ManufacturerRequest;
use App\Support\Dropdown;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = trans('manufacturers/general.page.index.title');
        $page_description = trans('manufacturers/general.page.index.description');
        $manufacturers = Manufacturer::paginate(25);
        $type_mappings = Asset::$type_mappings;
        return view('manufacturers.index', compact('page_title', 'page_description','manufacturers','type_mappings','type_mappings_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_mappings = Asset::$type_mappings;
        $yes_no        = Dropdown::$yes_no;
        $page_title       = trans('manufacturers/general.page.create.title');
        $page_description = trans('manufacturers/general.page.create.description');
        $manufacturer = new Manufacturer();
        $metas        = [];
        return view('manufacturers.view', compact('page_title', 'yes_no', 
                'page_description', 'type_mappings', 'manufacturer', 'metas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerRequest $request)
    {
        $inputs = $request->all();
        $no = Dropdown::NO;
        $inputs['equity'] = isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) && 
                                isset($inputs['equity']) ? $inputs['equity'] : null;
        $inputs['yearly_sales_trend'] =  json_encode([
            'yr_1_sales_trend' => isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) 
                                    && !empty($inputs['yr_1_sales_trend']) ? $inputs['yr_1_sales_trend'] : '',
            'yr_2_sales_trend' => isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) 
                                    && !empty($inputs['yr_2_sales_trend']) ? $inputs['yr_2_sales_trend'] : '',
            'yr_3_sales_trend' => isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) 
                                    && !empty($inputs['yr_3_sales_trend']) ? $inputs['yr_3_sales_trend'] : '',
        ]);
	$manufacturer = Manufacturer::create($inputs);
        
        $type_mappings = Asset::$type_mappings;
        Audit::log(Auth::id(), ucfirst(Manufacturer::MANUFACTURER), 
                'Add New Manufacturer : '.$manufacturer->name, [
                    'id' => $manufacturer->id, 
                    'asset_type' => $type_mappings[$manufacturer->asset_type_id]
                ]);

        Flash::success(trans('manufacturers/general.page.store.msg'));
        return redirect()->route('manufacturers.list');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manufacturer  = Manufacturer::find($id);
        $type_mappings = Asset::$type_mappings;
        $is_update     = true;       
        $yes_no        = Dropdown::$yes_no;
        
        $metas = [];
        $yearly_sales_trend = json_decode($manufacturer->yearly_sales_trend, true);
        if ($yearly_sales_trend && is_array($yearly_sales_trend)) {
            foreach($yearly_sales_trend as $key => $value) {
                $metas[$key] = $value;
            }
        }
        
        $page_title         = trans('manufacturers/general.page.edit.title');
        $page_description   = trans('manufacturers/general.page.edit.description');
        
        return view('manufacturers.view', compact('page_title', 'is_update', 'metas', 
                'page_description', 'type_mappings', 'manufacturer', 'yes_no'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacturerRequest $request, $id)
    {
	    
        $manufacturer = Manufacturer::find($id);
        $inputs = $request->all();
        $no = Dropdown::NO;
        $inputs['equity'] = isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) && 
                                isset($inputs['equity']) ? $inputs['equity'] : null;
        $inputs['yearly_sales_trend'] =  json_encode([
            'yr_1_sales_trend' => isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) 
                                    && !empty($inputs['yr_1_sales_trend']) ? $inputs['yr_1_sales_trend'] : '',
            'yr_2_sales_trend' => isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) 
                                    && !empty($inputs['yr_2_sales_trend']) ? $inputs['yr_2_sales_trend'] : '',
            'yr_3_sales_trend' => isset($inputs['publicity_traded']) && ($inputs['publicity_traded'] == $no) 
                                    && !empty($inputs['yr_3_sales_trend']) ? $inputs['yr_3_sales_trend'] : '',
        ]);
        
        $manufacturer->update($inputs);
        
        $type_mappings = Asset::$type_mappings;
        Audit::log(Auth::id(), ucfirst(Manufacturer::MANUFACTURER), 'Update Manufacturer : '.$manufacturer->name,
            ['id' => $manufacturer->id, 'manufacturer' => $manufacturer->name,
                'asset_type' => $type_mappings[$manufacturer->asset_type_id]]);
        
        Flash::success(trans('manufacturers/general.page.update.msg'));
        return redirect()->route('manufacturers.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Asset::where('manufacturer_id', $id)->first()) {
            Flash::error(trans('manufacturers/general.page.destroy.error'));
            return redirect()->route('manufacturers.list');
        }
        $manufacturer = Manufacturer::find($id);
        Audit::log(Auth::id(), ucfirst(Manufacturer::MANUFACTURER), 'Destroy Manufacturer : '.$manufacturer->name);
        Manufacturer::destroy($id);
        Flash::success(trans('manufacturers/general.page.destroy.msg'));
        return redirect()->route('manufacturers.list');
    }

    public function dataTable()
    {
	    
        return Datatables::of(Manufacturer::query())
            ->addcolumn('asset_type',function($data){
                return Asset::$type_mappings[$data->asset_type_id];
            })
            ->addColumn('action', function($data) {
               return '<a href="'.URL::route( "manufacturers.edit", array($data->id )).
               '"><i class="fa fa-pencil-square-o"></i></a> <a data-toggle="modal" data-target="#modal_dialog" href="'.
               URL::route( "manufacturers.confirm-delete", array( $data->id )).'"><i class="fa fa-trash-o deletable"></i></a>';

            })->make(true);
    }
    /**
     * Delete Confirm Modal
     *
     * @param   int   $id
     * @return  View
     */
    public function getModalDelete($id)
    {
        $error = null;
        $manufacturer = Manufacturer::find($id);
        $modal_title = trans('manufacturers/dialog.delete-confirm.title');
        if ($manufacturer) {
            $modal_route = route('manufacturers.delete', array('id' => $manufacturer->id));
            $modal_body = trans('manufacturers/dialog.delete-confirm.body');
        }
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));
    }
}
