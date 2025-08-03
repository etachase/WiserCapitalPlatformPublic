<?php

use Illuminate\Database\Seeder;

class SolarInstallersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('solar_installers')->delete();
        
        \DB::table('solar_installers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Solar City',
            'phone' => '(888) 765-2489',
                'website' => 'http://www.solarcity.com',
                'business_location' => '',
                'type_of_license' => '',
                'license_number' => '',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
        ));
        
        
    }
}
