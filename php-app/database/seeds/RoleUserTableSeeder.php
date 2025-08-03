<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_user')->delete();
        
        \DB::table('role_user')->insert(array (
            0 => 
            array (
                'user_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'user_id' => 20,
                'role_id' => 1,
            ),
            2 => 
            array (
                'user_id' => 22,
                'role_id' => 1,
            ),
            3 => 
            array (
                'user_id' => 23,
                'role_id' => 1,
            ),
            4 => 
            array (
                'user_id' => 24,
                'role_id' => 1,
            ),
            5 => 
            array (
                'user_id' => 25,
                'role_id' => 1,
            ),
            6 => 
            array (
                'user_id' => 26,
                'role_id' => 1,
            ),
            7 => 
            array (
                'user_id' => 27,
                'role_id' => 1,
            ),
            8 => 
            array (
                'user_id' => 28,
                'role_id' => 1,
            ),
            9 => 
            array (
                'user_id' => 1,
                'role_id' => 2,
            ),
            10 => 
            array (
                'user_id' => 18,
                'role_id' => 2,
            ),
            11 => 
            array (
                'user_id' => 19,
                'role_id' => 2,
            ),
            12 => 
            array (
                'user_id' => 20,
                'role_id' => 2,
            ),
            13 => 
            array (
                'user_id' => 22,
                'role_id' => 2,
            ),
            14 => 
            array (
                'user_id' => 23,
                'role_id' => 2,
            ),
            15 => 
            array (
                'user_id' => 24,
                'role_id' => 2,
            ),
            16 => 
            array (
                'user_id' => 25,
                'role_id' => 2,
            ),
            17 => 
            array (
                'user_id' => 26,
                'role_id' => 2,
            ),
            18 => 
            array (
                'user_id' => 27,
                'role_id' => 2,
            ),
            19 => 
            array (
                'user_id' => 28,
                'role_id' => 2,
            ),
            20 => 
            array (
                'user_id' => 29,
                'role_id' => 2,
            ),
            21 => 
            array (
                'user_id' => 30,
                'role_id' => 2,
            ),
            22 => 
            array (
                'user_id' => 18,
                'role_id' => 14,
            ),
            23 => 
            array (
                'user_id' => 19,
                'role_id' => 15,
            ),
            24 => 
            array (
                'user_id' => 29,
                'role_id' => 15,
            ),
            25 => 
            array (
                'user_id' => 30,
                'role_id' => 16,
            ),
        ));
        
        
    }
}
