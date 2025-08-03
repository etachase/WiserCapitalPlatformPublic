<?php namespace App\Http\Controllers;

use App\Models\ProjectUser;
use App\Models\Site;
use Illuminate\Http\Request;
use Auth;
use Flash;
use Yajra\Datatables\Datatables;
use URL;

class ProjectUserController extends Controller {

    /**
     * @var ProjectUser
     */
    protected $project_user;
    /**
     * @var Site
     */
    protected $site;

    /**
     * @param ProjectUser $project_user
     * @param Site $site
     */
    public function __construct(ProjectUser $project_user, Site $site)
    {
        $this->project_user = $project_user;
        $this->site         = $site;
    }
    
    public function index($id, Request $request) 
    {
        
        $page_title = 'LIST OF ALL PROJECT USERS';
        $page_description = '';
        
        return view('hf.project_user_list', compact('id', 'page_title', 'page_description'));
    }
    
    public function dataTable($id)
    {
        $project = ProjectUser::leftJoin('users AS u', 'project_users.user_id', '=', 'u.id')
                    ->select('u.first_name', 'u.last_name', 'project_users.id', 'project_users.site_id')
                        ->whereNotNull('u.id')->where('site_id', $id)->get();
        
        return Datatables::of($project)
            ->addColumn('name',function ($data){
                return ucwords($data->first_name . ' ' . $data->last_name);
            })
            ->addColumn('action', function($data) {
                return "<a href=". URL::route( "hf.project-user.delete", array('id' => $data->site_id, 'project_id' => $data->id )) . 
                        "><i class='fa fa-trash-o deletable'> </i></a>";

            })->make(true);
    }

    /**
     * Store favorite project of user
     * 
     * @param type $id
     * @param \App\Http\Controllers\Request $request
     * @return type
     */
    public function storeProjectUser($id, Request $request)
    {        
        if ($request->get('users')) {
            $users = explode(',', $request->get('users'));
            foreach ($users as $user_id) {
                $this->project_user->create([
                    'site_id' => $id,
                    'user_id' => $user_id
                ]);
            }
        }

        Flash::success('Assign Project to Selected Users');
        return back();
    }
    
    public function destroy($id, $project_id, Request $request)
    {
        $project = ProjectUser::find($project_id);
        $project->delete();
        Flash::success('User delete successfully');
        return back();
    }

}