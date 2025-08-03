<?php

use Illuminate\Database\Seeder;

class DeveloperRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 17,
                'name' => 'developer',
                'display_name' => 'Developer',
                'description' => 'Same as Solar Installer',
                'created_at' => '2017-07-04 06:00:00',
                'updated_at' => '2017-07-04 06:00:00',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
        ));
        
        
    }
}
