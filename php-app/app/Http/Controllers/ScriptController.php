<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Excel;
use App\Models\Asset;
use DB;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                
       /*
       DB::table('assets_meta')->truncate();
	   DB::table('assets')->truncate();
	   
	   
        Excel::load(storage_path('files/csv/'). 'inverters.csv', function ($reader) {
            foreach ($reader->toArray() as $reader)
            {
	           	$asset = new Asset;
				
				$asset->name 			= $reader['name'];
				$asset->asset_type_id 	= intval($reader['asset_type_id']);
				$asset->manufacturer 	= $reader['manufacturer'];
				$asset->model 			= $reader['model'];
				
				if( $reader['micro_yesno'] == "Yes")
				{
					$asset->setMeta('micro', 1);
				}
				elseif( $reader['micro_yesno'] == "No")
				{
					$asset->setMeta('micro', 0);
				}
				
				
				$asset->setMeta('voltage', intval($reader['voltage']));
				$asset->setMeta('warranty_years', intval($reader['warranty_years']));
				$asset->save();
				
            }
           
        });
        
        
      
        Excel::load(storage_path('files/csv/'). 'panels.csv', function ($reader) {
            foreach ($reader->toArray() as $reader)
            {
	           
	           	$asset = new Asset;
				
				$asset->name 			= $reader['name'];
				$asset->asset_type_id 	= intval($reader['asset_type_id']);
				$asset->manufacturer 	= $reader['manufacturer'];
				$asset->model 			= $reader['model'];
				
				$asset->setMeta('cell_type', $reader['cell_type']);
				$asset->setMeta('power_wattage', $reader['power_wattage']);
				$asset->setMeta('power_output_tolerance', $reader['power_output_tolerance']);
				$asset->setMeta('connector_type', $reader['connector_type']);
				$asset->setMeta('power_output_warranty', $reader['warranty_type']);
				$asset->setMeta('warranty_phase_1_years', $reader['phase_1_years']);
				$asset->setMeta('warranty_phase_1_percent', $reader['phase_1_percent']);
				$asset->setMeta('warranty_phase_2_years', $reader['phase_2_years']);
				$asset->setMeta('warranty_phase_2_percent', $reader['phase_2_percent']);
				$asset->setMeta('width_in', $reader['width_in']);
				$asset->setMeta('depth_in', $reader['depth_in']);
				$asset->setMeta('length_in', $reader['length_in']);
				$asset->setMeta('weight_lbs', $reader['weight_lbs']);
				$asset->save();
            }
           
        });
        
       DB::table('assets_meta')->whereNull('value')->delete();
        */
        
    }
}
