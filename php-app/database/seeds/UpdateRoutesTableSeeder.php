<?php

use Illuminate\Database\Seeder;

class UpdateRoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('routes')->insert(array (
            0 => 
            array (
                'name' => 'hf.facility-file-preview',
                'method' => 'GET',
                'path' => 'hf/facility-file-preview',
                'action_name' => 'App\\Http\\Controllers\\DocumentController@facilityFilePreview',
                'permission_id' => 175,
                'created_at' => '2016-07-20 20:45:26',
                'updated_at' => '2016-07-20 20:45:26',
                'enabled' => 1,
            ),
            1 => 
            array (
                'name' => 'hf.get-search-project',
                'method' => 'GET',
                'path' => '/api/hf',
                'action_name' => 'App\\Http\\Controllers\\HFController@getProject',
                'permission_id' => 175,
                'created_at' => '2016-07-20 20:45:26',
                'updated_at' => '2016-07-20 20:45:26',
                'enabled' => 1,
            ),
            2 => 
            array (
                'name' => 'global.input.get',
                'method' => 'GET',
                'path' => '/api/global/{value}/input',
                'action_name' => 'App\\Http\\Controllers\\GlobalInputController@getGlobalInput',
                'permission_id' => 175,
                'created_at' => '2016-07-20 20:45:26',
                'updated_at' => '2016-07-20 20:45:26',
                'enabled' => 1,
            ),
            3 => 
            array (
                'name' => 'hf.get-files',
                'method' => 'GET',
                'path' => 'api/hf/{id}/get/files',
                'action_name' => 'App\\Http\\Controllers\\DocumentController@getFolderFiles',
                'permission_id' => 175,
                'created_at' => '2016-07-20 20:45:26',
                'updated_at' => '2016-07-20 20:45:26',
                'enabled' => 1,
            ),
        ));
        
        
    }
}
