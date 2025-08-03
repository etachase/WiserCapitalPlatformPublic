<?php

use Illuminate\Database\Seeder;

class AgreementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('agreements')->delete();
        
        \DB::table('agreements')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'agreements_57b20ef56f4e9',
                'name' => 'Letter of Intent',
                'doc_title' => 'LOI_Default.docx',
                'is_enabled' => '1',
                'created_at' => '2016-08-15 18:50:29',
                'updated_at' => '2016-08-15 18:50:29',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'agreements_57b20f0417c15',
                'name' => 'Off-Take Agreement',
                'doc_title' => 'CA_PPA_Default.docx',
                'is_enabled' => '1',
                'created_at' => '2016-08-15 18:50:44',
                'updated_at' => '2016-08-15 18:50:44',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'agreements_57b20f15581f2',
                'name' => 'Site Control Lease',
                'doc_title' => 'General_SiteLease_Default.docx',
                'is_enabled' => '1',
                'created_at' => '2016-08-15 18:51:01',
                'updated_at' => '2016-08-15 18:54:05',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'agreements_57b20f286b98e',
                'name' => 'EPC Agreement',
                'doc_title' => 'SolarConstructionContract_Default.docx',
                'is_enabled' => '1',
                'created_at' => '2016-08-15 18:51:20',
                'updated_at' => '2016-08-15 18:51:20',
            ),
        ));
        
        
    }
}
