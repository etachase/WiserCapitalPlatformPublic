<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupType;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use URL;
use Flash;
use DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = trans('admin/groups/general.page.index.title');
        $page_description = trans('admin/groups/general.page.index.description');
        $groups = Group::paginate(25);
        return view('admin.groups.index', compact('page_title', 'page_description','groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = trans('admin/groups/general.page.create.title');
        $page_description = trans('admin/groups/general.page.create.description');
        $type_mappings = Group::$type_mappings;
        $group = new Group();
        return view('admin.groups.create', compact('page_title', 'page_description','type_mappings','group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestdata = $request->all();
        $group = Group::create($requestdata);

        foreach ($request->type as $type){
            GroupType::create([
                'group_id' => $group->id,
                'type_id' => $type
            ]);
        }
        $url = URL::route('groups.list');
        Flash::success(trans('admin/groups/general.page.store.msg'));

        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);
        //$groupType = DB::table('group_type')->where('group_id',$id)->lists('type_id');
        $groupType = Group::getTypes($id);
        //$groupType = GroupType::select('type_id')->where('group_id',$id)->get()->toArray();
        $page_title = trans('admin/groups/general.page.edit.title');
        $page_description = trans('admin/groups/general.page.edit.description');
        $type_mappings = Group::$type_mappings;
        $is_update = true;
        return view('admin.groups.create', compact('page_title', 'page_description','type_mappings','is_update','group','groupType'));
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
        $group = Group::find($id);
        $requestdata = $request->all();
        $requestdata['is_shared'] = ($request->is_shared)? 1: 0;
        $group->update($requestdata);
        GroupType::where('group_id',$id)->delete();
        foreach ($request->type as $type){
            GroupType::create([
                'group_id' => $id,
                'type_id' => $type
            ]);
        }
        $url = URL::route('groups.list');
        Flash::success(trans('admin/groups/general.page.update.msg'));

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
        Group::destroy($id);
        GroupType::where('group_id',$id)->delete();
        Flash::success(trans('admin/groups/general.page.destroy.msg'));
        return redirect()->route('groups.list');
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
        $asset = Group::find($id);
        $modal_title = trans('admin/groups/dialog.delete-confirm.title');
        if ($asset) {
            $modal_route = route('groups.delete', array('id' => $asset->id));
            $modal_body = trans('admin/groups/dialog.delete-confirm.body');
        }
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));
    }
    public function dataTable()
    {
        return Datatables::of(Group::all())
            ->addcolumn('is_shared',function($data){
                return ($data->is_shared==1)? 'Yes': 'No';
            })
            ->addColumn('action', function($data) {
                return '<a href="'.URL::route( "groups.edit", array($data->id )).
                '"><i class="fa fa-pencil-square-o"></i></a> <a data-toggle="modal" data-target="#modal_dialog" href="'.
                URL::route( "groups.confirm-delete", array( $data->id )).'"><i class="fa fa-trash-o deletable"></i></a>';

            })->make(true);
    }
}
