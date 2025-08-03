<?php

use Illuminate\Database\Seeder;

class SolarInstallersMetaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('solar_installers_meta')->delete();
        
        \DB::table('solar_installers_meta')->insert(array (
            0 => 
            array (
                'id' => 1,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'business_add1',
                'value' => '3055 Clearview Way',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            1 => 
            array (
                'id' => 2,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'business_add2',
                'value' => '',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            2 => 
            array (
                'id' => 3,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'business_city',
                'value' => 'San Mateo',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            3 => 
            array (
                'id' => 4,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'postal_code',
                'value' => '94402',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            4 => 
            array (
                'id' => 5,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'past_two_years_financials_audited',
                'value' => '',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            5 => 
            array (
                'id' => 6,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'commercial_projects_installed',
                'value' => '15000',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            6 => 
            array (
                'id' => 7,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'commercial_kw_installed',
                'value' => '100000',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            7 => 
            array (
                'id' => 8,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'minimum_workers_comp_maximum_policy_limit',
                'value' => '100000',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            8 => 
            array (
                'id' => 9,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'workers_comp_carrier',
                'value' => 'ADP',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            9 => 
            array (
                'id' => 10,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'general_liability_maximum_policy_limit',
                'value' => '200000',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            10 => 
            array (
                'id' => 11,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'general_liability_carrier',
                'value' => 'ADP',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
            11 => 
            array (
                'id' => 12,
                'solar_installer_id' => 1,
                'type' => 'string',
                'key' => 'bonding_capability',
                'value' => '1',
                'created_at' => '2016-07-28 20:01:36',
                'updated_at' => '2016-07-28 20:01:36',
            ),
        ));
        
        
    }
}
