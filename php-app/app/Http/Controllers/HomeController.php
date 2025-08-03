<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Support\Dropdown;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;
use App\Repositories\RouteRepository as Route;
use App\Repositories\PermissionRepository as Permission;
use Auth;
use AWS;
use Storage;


class HomeController extends Controller
{
    /**
     * @var Route
     */
    private $route;

    /**
     * @var Permission
     */
    private $permission;

    /**
     * @param Route $route
     * @param Permission $permission
     */
    public function __construct(Route $route, Permission $permission)
    {
        $this->route = $route;
        $this->permission = $permission;
    }

    public function index()
    {
        $homeRouteName = 'welcome';

        try {

            if ($user) {
                $homeCandidateName = config('app.home_route');
                $homeRoute = $this->route->findBy('name', $homeCandidateName);
                $homePerm = $homeRoute->permission;
                if ($user->can($homePerm->name)) {
                    $homeRouteName = $homeCandidateName;
                }
            }
        }
        catch (\Exception $ex) {

        }
        return \Redirect::route($homeRouteName);
    }

    public function welcome()
    {
       	
       
       /*
        $routeName = 'hf.index';
        $hfRoute   = $this->route->findBy('name', $routeName);
        $hfPerm    = $hfRoute->permission;
   
        if ($user && $user->can($hfPerm->name)) { 
            return \Redirect::route($routeName);
        }
        
		if ($user->hasRole('I')) { 
        	$routeName  = 'investor.index';
            return \Redirect::route('hf.index');
        }
        
           $page_title = "Welcome";
		   $page_description = "This is the welcome page";
		   return view('welcome', compact('page_title', 'page_description'));
        
        */
		
		$user      = Auth::user();
		
        if ($user && $user->hasRole('Investors')) { 
     
            return \Redirect::route('investor.index');
        }
        else
        {
	        return \Redirect::route('hf.index');
        }
        
        
        
        
     
    }

    /*public function store(Request $request){
        dd($request->all());
    }*/

	public function script()
	{
		$s3 = AWS::createClient('s3');
		
		$objects = $s3->getIterator('ListObjects', array(
		    "Bucket" => env('AWS_S3_BUCKET'),
		    "Prefix" => ""
		)); 
		
		foreach ($objects as $object) {
    echo $object['Key'] . "<br>";
}
		

		//$directories = Storage::allFiles('10664');
		//dd($directories);
					
		
	}
}
