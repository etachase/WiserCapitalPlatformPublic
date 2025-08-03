<?php

use Illuminate\Database\Seeder;

class PermissionUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_user')->delete();
        
        \DB::table('permission_user')->insert(array (
            0 => 
            array (
                'permission_id' => 2,
                'user_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 3,
                'user_id' => 1,
            ),
            2 => 
            array (
                'permission_id' => 2,
                'user_id' => 18,
            ),
            3 => 
            array (
                'permission_id' => 3,
                'user_id' => 18,
            ),
            4 => 
            array (
                'permission_id' => 2,
                'user_id' => 19,
            ),
            5 => 
            array (
                'permission_id' => 3,
                'user_id' => 19,
            ),
            6 => 
            array (
                'permission_id' => 2,
                'user_id' => 20,
            ),
            7 => 
            array (
                'permission_id' => 3,
                'user_id' => 20,
            ),
            8 => 
            array (
                'permission_id' => 2,
                'user_id' => 22,
            ),
            9 => 
            array (
                'permission_id' => 3,
                'user_id' => 22,
            ),
            10 => 
            array (
                'permission_id' => 2,
                'user_id' => 23,
            ),
            11 => 
            array (
                'permission_id' => 3,
                'user_id' => 23,
            ),
            12 => 
            array (
                'permission_id' => 2,
                'user_id' => 24,
            ),
            13 => 
            array (
                'permission_id' => 3,
                'user_id' => 24,
            ),
            14 => 
            array (
                'permission_id' => 2,
                'user_id' => 25,
            ),
            15 => 
            array (
                'permission_id' => 3,
                'user_id' => 25,
            ),
            16 => 
            array (
                'permission_id' => 2,
                'user_id' => 26,
            ),
            17 => 
            array (
                'permission_id' => 3,
                'user_id' => 26,
            ),
            18 => 
            array (
                'permission_id' => 2,
                'user_id' => 27,
            ),
            19 => 
            array (
                'permission_id' => 3,
                'user_id' => 27,
            ),
            20 => 
            array (
                'permission_id' => 2,
                'user_id' => 28,
            ),
            21 => 
            array (
                'permission_id' => 3,
                'user_id' => 28,
            ),
            22 => 
            array (
                'permission_id' => 2,
                'user_id' => 29,
            ),
            23 => 
            array (
                'permission_id' => 3,
                'user_id' => 29,
            ),
        ));
        
        
    }
}
