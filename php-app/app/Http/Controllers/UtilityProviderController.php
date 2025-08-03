<?php namespace App\Http\Controllers;

use App\Models\UtilityProvider;
use Illuminate\Http\Request;
use App\Support\Dropdown;
use App\Models\ZipCode;
use App\Models\ZipCodeUtilityProvider;
use DB;

class UtilityProviderController extends Controller 
{   
    /**
     * Function is to get utility providers
     * 
     * @param \App\Http\Controllers\Request $request
     * @return type
     */
    public function index(Request $request)
    {
        $zipcode = $request->get('zipcode');
        $utility_providers = [];
        $id = '';
        if ($zipcode && ($zipcode != 'undefined')) {
            $zipcode = ZipCode::findOrCreateWithZip($zipcode);
            $id      = $zipcode ? $zipcode->id : '';
        }
        if ($id) {
            $utility_providers = ZipCodeUtilityProvider::select(DB::raw('DISTINCT name'), 'utility_provider_id AS id',  
                                    'is_green_button')->leftJoin('utility_providers', 
                                    'utility_providers.id', '=', 'zip_code_utility_providers.utility_provider_id')
                                    ->where('zip_code_id', '=', $id)
                                    ->whereNotNull('name')
                                    ->groupBy('utility_provider_id')
                                    ->orderBy('name')->get()
                                    ->toArray();
        }
        array_push($utility_providers, ['id' => Dropdown::NONE, 'name' => Dropdown::NON_LISTED_TEXT]);
        
        return response()->json($utility_providers);
    }
    
    /**
     * Function to get the utility provider of specific id
     * 
     * @param type $id  
     * @param Request $request
     * @return type
     */
    public function show($id, Request $request)
    {
        return response()->json(UtilityProvider::find($id));
    }
}