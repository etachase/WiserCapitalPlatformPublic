<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use phpDocumentor\Reflection\Types\Self_;
use Yajra\Datatables\Datatables;
use App\Http\Requests\AssetRequest;
use Flash;
use URL;
use Flysystem;
use App\Repositories\AuditRepository as Audit;
use Auth;
use App\Models\Manufacturer;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = trans('assets/general.page.index.title');
        $page_description = trans('assets/general.page.index.description');
        $assets = Asset::paginate(25);
        $type_mappings = Asset::$type_mappings;
        $type_mappings_view = Asset::$type_mappings_view;
        return view('assets.index', compact('page_title', 'page_description','assets','type_mappings','type_mappings_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $type_mappings = Asset::$type_mappings;
        $type_mappings_view = Asset::$type_mappings_view;
        $type_id = array_keys($type_mappings_view,$type);
        $manufacturers = Manufacturer::where('asset_type_id', $type_id)->lists('name', 'id');
        $mappings_view = $type;
        $type_name = $type_mappings[$type_id['0']];
        $page_title = trans('assets/general.page.create.title',['type_name'=>$type_name]);
        $page_description = trans('assets/general.page.create.description',['type_name'=>$type_name]);
        $asset = new Asset();
        return view('assets.view', compact('page_title', 'page_description','type_mappings','type',
                    'type_name','asset','mappings_view','type_mappings_view','type_id', 'manufacturers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetRequest $request)
    {
	 		    
	    $asset = Asset::create($request->all());
        $asset_metas = collect($request->except($asset->getFillable()))->filter(function ($item) {
            return !(empty($item) && ($item !== '0') && ($item !== 0));
        });
     	$asset->setMeta($asset_metas->except('_token')->toArray());
		       
        if ($request->file('datasheet')) {
            $s3DirPath = 'assets/' . Asset::$type_mappings_view[$request->asset_type_id] . '/' . $asset->id . '/';
            $s3FilePath = $s3DirPath . $request->file('datasheet')->getClientOriginalName();
            if (Flysystem::has($s3FilePath)) {
                Flysystem::delete($s3FilePath);
            }
            Flysystem::put($s3FilePath, fopen($request->file('datasheet')->getRealPath(), "r"));
			$asset->setMeta(['datasheet' => $s3FilePath]);
        }
        
        $asset->save();
        
        $type_mappings = Asset::$type_mappings;
        Audit::log(Auth::id(), ucfirst(Asset::ASSET), 'Add New Asset : '.$asset->name,
            ['id' => $asset->id, 'manufacturer' => $asset->manufacturer,
                'model' => $asset->model, 'asset_type' => $type_mappings[$asset->asset_type_id]]);
        $url = URL::route('assets.list');
        Flash::success(trans('assets/general.page.store.msg'));

        $url =  URL::route( "assets.edit", array(Asset::$type_mappings_view[$request->asset_type_id] ,$asset->id));
        return redirect()->to($url);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type,$id)
    {
        $asset = Asset::find($id);
        $type_mappings = Asset::$type_mappings;
        $type_mappings_view = Asset::$type_mappings_view;
        $type_id = array_keys($type_mappings_view,$type);
        $manufacturers = Manufacturer::where('asset_type_id', $type_id)->lists('name', 'id');
        $mappings_view = $type;
        $type_name = $type_mappings[$type_id['0']];
        $is_update = true;
        $file_url = $this->getDataSheetFileURL($asset->getMeta('datasheet'));
        
        
        $page_title = trans('assets/general.page.edit.title',['type_name'=>$type_name]);
        $page_description = trans('assets/general.page.edit.description',['type_name'=>$type_name]);
        
        return view('assets.view', compact('page_title', 'page_description','type_mappings','type', 'manufacturers',
            'type_name','asset','asset_data', 'is_update','mappings_view','type_mappings_view', 'file_url','type_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AssetRequest $request, $id)
    {
	    
        $asset = Asset::find($id);
        
        $asset->update($request->all());
        
        $asset_metas = collect($request->except($asset->getFillable()))->filter(function ($item) {
            return !(empty($item) && ($item !== '0') && ($item !== 0));
        });
        
     	$asset->setMeta($asset_metas->except('_token')->toArray());
     	
     	
     	if ($request->file('datasheet')) {
            $s3DirPath = 'assets/' . Asset::$type_mappings_view[$request->asset_type_id] . '/' . $asset->id . '/';
            $s3FilePath = $s3DirPath . $request->file('datasheet')->getClientOriginalName();
            if (Flysystem::has($s3FilePath)) {
                Flysystem::delete($s3FilePath);
            }
            Flysystem::put($s3FilePath, fopen($request->file('datasheet')->getRealPath(), "r"));
			$asset->setMeta(['datasheet' => $s3FilePath]);
        }
        
		$asset->save();
		 
        $type_mappings = Asset::$type_mappings;
        Audit::log(Auth::id(), ucfirst(Asset::ASSET), 'Update Asset : '.$asset->name,
            ['id' => $asset->id, 'manufacturer' => $asset->manufacturer,
                'model' => $asset->model, 'asset_type' => $type_mappings[$asset->asset_type_id]]);
        
        Flash::success(trans('assets/general.page.update.msg'));
        $url =  URL::route( "assets.edit", array(Asset::$type_mappings_view[$request->asset_type_id] ,$id));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asset = Asset::find($id);
        Audit::log(Auth::id(), ucfirst(Asset::ASSET), 'Destroy Asset : '.$asset->name);
        Asset::destroy($id);
        Flash::success(trans('assets/general.page.destroy.msg'));
        return redirect()->route('assets.list');
    }

    public function dataTable()
    {
	    
        return Datatables::of(Asset::query())
            ->addcolumn('asset_type',function($data){
                return Asset::$type_mappings[$data->asset_type_id];
            })
            ->addcolumn('manufacturer',function($data){
                return $data->manufacturer()->first() ? $data->manufacturer()->first()->name : '';
            })
            ->addColumn('action', function($data) {
               return '<a href="'.URL::route( "assets.edit", array(Asset::$type_mappings_view[$data->asset_type_id] ,$data->id )).
               '"><i class="fa fa-pencil-square-o"></i></a> <a data-toggle="modal" data-target="#modal_dialog" href="'.
               URL::route( "assets.confirm-delete", array( $data->id )).'"><i class="fa fa-trash-o deletable"></i></a>';

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
        $asset = Asset::find($id);
        $modal_title = trans('assets/dialog.delete-confirm.title');
        if ($asset) {
            $modal_route = route('assets.delete', array('id' => $asset->id));
            $modal_body = trans('assets/dialog.delete-confirm.body');
        }
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));
    }

    public function getDataSheetFileURL($file_path)
    {
        if (empty($file_path)) {
            return null;
        }
        $bucket = config('flysystem.connections.awss3.bucket');

        $s3Client = Flysystem::getAdapter()->getClient();
        $cmd = $s3Client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $file_path
        ]);

        $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

        // Get the actual presigned-url
        $presignedUrl = (string) $request->getUri();
        return $presignedUrl;
    }
}
