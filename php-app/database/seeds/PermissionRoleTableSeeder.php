<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 3,
                'role_id' => 2,
            ),
            1 => 
            array (
                'permission_id' => 4,
                'role_id' => 3,
            ),
            2 => 
            array (
                'permission_id' => 5,
                'role_id' => 4,
            ),
            3 => 
            array (
                'permission_id' => 9,
                'role_id' => 5,
            ),
            4 => 
            array (
                'permission_id' => 6,
                'role_id' => 6,
            ),
            5 => 
            array (
                'permission_id' => 10,
                'role_id' => 7,
            ),
            6 => 
            array (
                'permission_id' => 11,
                'role_id' => 8,
            ),
            7 => 
            array (
                'permission_id' => 12,
                'role_id' => 9,
            ),
            8 => 
            array (
                'permission_id' => 14,
                'role_id' => 10,
            ),
            9 => 
            array (
                'permission_id' => 14,
                'role_id' => 11,
            ),
            10 => 
            array (
                'permission_id' => 15,
                'role_id' => 11,
            ),
            11 => 
            array (
                'permission_id' => 14,
                'role_id' => 12,
            ),
            12 => 
            array (
                'permission_id' => 15,
                'role_id' => 12,
            ),
            13 => 
            array (
                'permission_id' => 16,
                'role_id' => 12,
            ),
            14 => 
            array (
                'permission_id' => 14,
                'role_id' => 13,
            ),
            15 => 
            array (
                'permission_id' => 15,
                'role_id' => 13,
            ),
            16 => 
            array (
                'permission_id' => 16,
                'role_id' => 13,
            ),
            17 => 
            array (
                'permission_id' => 17,
                'role_id' => 13,
            ),
            18 => 
            array (
                'permission_id' => 3,
                'role_id' => 14,
            ),
            19 => 
            array (
                'permission_id' => 3,
                'role_id' => 15,
            ),
            20 => 
            array (
                'permission_id' => 175,
                'role_id' => 15,
            ),
            21 => 
            array (
                'permission_id' => 3,
                'role_id' => 16,
            ),
            22 => 
            array (
                'permission_id' => 175,
                'role_id' => 16,
            ),
        ));
        
        
    }
}
