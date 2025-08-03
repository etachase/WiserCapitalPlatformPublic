<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GlobalInput;
use phpDocumentor\Reflection\Types\Self_;
use Yajra\Datatables\Datatables;
use Flash;
use URL;
use Flysystem;
use App\Repositories\AuditRepository as Audit;
use Auth;
use App\Support\Dropdown;

class GlobalInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = trans('inputs/general.page.index.title');
        $page_description = trans('inputs/general.page.index.description');
        $inputs = GlobalInput::paginate(25);

        return view('inputs.index', compact('page_title', 'page_description','inputs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = trans('inputs/general.page.create.title');
        $page_description = trans('inputs/general.page.create.description');
        return view('inputs.view', compact('page_title', 'page_description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $requestdata = $request->all();
        $input = GlobalInput::create($requestdata);
        Audit::log(Auth::id(), ucfirst(GlobalInput::GLOBAL_INPUT), 'Add New Global Input : '.$input->name,
            ['description' => $input->description]);
        $url = URL::route('inputs.list');
        Flash::success(trans('inputs/general.page.store.msg'));
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
        $input = GlobalInput::find($id);
        $page_title = trans('inputs/general.page.edit.title');
        $page_description = trans('inputs/general.page.edit.description');
        $is_update = true;
        return view('inputs.view', compact('page_title', 'page_description','input', 'is_update'));
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
        $this->validate($request, [
            'name' => 'required'
        ]);
        $input = GlobalInput::find($id);
        $requestdata = $request->all();
        $input->update($requestdata);
        Audit::log(Auth::id(), ucfirst(GlobalInput::GLOBAL_INPUT), 'Update Global Input : '.$input->name,
            ['description' => $input->description]);

        $url = URL::route('inputs.list');
        Flash::success(trans('inputs/general.page.update.msg'));
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
        $data = GlobalInput::find($id);
        if(!$data->is_lock){
            Audit::log(Auth::id(), ucfirst(GlobalInput::GLOBAL_INPUT), 'Destroy Global Input : '.$data->name);
            GlobalInput::destroy($id);
            Flash::success(trans('inputs/general.page.destroy.msg'));
            return redirect()->route('inputs.list');
        }
        Flash::error(trans('inputs/general.page.destroy.errmsg'));
        return redirect()->route('inputs.list');
    }

    public function dataTable()
    {
        return Datatables::of(GlobalInput::all())
            ->addColumn('action', function($data) {
               return '<a href="'.URL::route( "inputs.edit", array($data->id) ).
               '"><i class="fa fa-pencil-square-o"></i></a>'.(($data->is_lock == 0)? ' <a data-toggle="modal" data-target="#modal_dialog" href="'.
               URL::route( "inputs.confirm-delete", array( $data->id )).'"><i class="fa fa-trash-o deletable"></i></a>': ' <i class="fa fa-lock"></i>');

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
        $input = GlobalInput::find($id);
        $modal_title = trans('inputs/dialog.delete-confirm.title');
        if ($input) {
            $modal_route = route('inputs.delete', array('id' => $input->id));
            $modal_body = trans('inputs/dialog.delete-confirm.body');
        }
        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));
    }
    /**
     * Get global Input
     *
     * @param   string $value
     * @return  json
     */
    public function getGlobalInput($value, GlobalInput $globalInput)
    {
        $srec_mapping = Dropdown::$srec_mapping;
        $years = [];
        for($i = 1; $i <= 10; $i++) {
            $input = $globalInput->getInputByName($srec_mapping[$value] . $i);
            $years[$i] = $input ? $input->low : 0;
        }
        
        return response()->json(['years' => $years]);
    }

}
