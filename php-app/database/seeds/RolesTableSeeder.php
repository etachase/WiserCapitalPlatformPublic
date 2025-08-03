<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admins',
                'display_name' => 'Administrators',
                'description' => 'Administrators have no restrictions',
                'created_at' => '2016-05-19 23:53:58',
                'updated_at' => '2016-05-19 23:53:58',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'users',
                'display_name' => 'Users',
                'description' => 'All authenticated users',
                'created_at' => '2016-05-19 23:53:58',
                'updated_at' => '2016-05-19 23:53:58',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'menu-managers',
                'display_name' => 'Menu managers',
                'description' => 'Menu managers are granted all permissions to the Admin|Menus section.',
                'created_at' => '2016-05-19 23:53:58',
                'updated_at' => '2016-05-19 23:53:58',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'user-managers',
                'display_name' => 'User managers',
                'description' => 'User managers are granted all permissions to the Admin|Users section.',
                'created_at' => '2016-05-19 23:53:58',
                'updated_at' => '2016-05-19 23:53:58',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'module-managers',
                'display_name' => 'Module managers',
                'description' => 'Module managers are granted all permissions to the Admin|Modules section.',
                'created_at' => '2016-05-19 23:53:58',
                'updated_at' => '2016-05-19 23:53:58',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'role-managers',
                'display_name' => 'Role managers',
                'description' => 'Role managers are granted all permissions to the Admin|Roles section.',
                'created_at' => '2016-05-19 23:53:59',
                'updated_at' => '2016-05-19 23:53:59',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'audit-viewers',
                'display_name' => 'Audit viewers',
                'description' => 'Users allowed to view the audit log.',
                'created_at' => '2016-05-19 23:53:59',
                'updated_at' => '2016-05-19 23:53:59',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'audit-replayers',
                'display_name' => 'Audit replayers',
                'description' => 'Users allowed to replay items from the audit log.',
                'created_at' => '2016-05-19 23:53:59',
                'updated_at' => '2016-05-19 23:53:59',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'audit-purgers',
                'display_name' => 'Audit purgers',
                'description' => 'Users allowed to purge old items from the audit log.',
                'created_at' => '2016-05-19 23:53:59',
                'updated_at' => '2016-05-19 23:53:59',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'flash-success-viewer',
                'display_name' => 'Flash success viewer',
                'description' => 'Can see the success flash test page.',
                'created_at' => '2016-05-19 23:54:03',
                'updated_at' => '2016-05-19 23:54:03',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'flash-info-viewer',
                'display_name' => 'Flash info viewer',
                'description' => 'Can see the info flash test page.',
                'created_at' => '2016-05-19 23:54:03',
                'updated_at' => '2016-05-19 23:54:03',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'flash-warning-viewer',
                'display_name' => 'Flash warning viewer',
                'description' => 'Can see the warning flash test page.',
                'created_at' => '2016-05-19 23:54:03',
                'updated_at' => '2016-05-19 23:54:03',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'flash-error-viewer',
                'display_name' => 'Flash error viewer',
                'description' => 'Can see the error flash test page.',
                'created_at' => '2016-05-19 23:54:04',
                'updated_at' => '2016-05-19 23:54:04',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Investors',
                'display_name' => 'Investors',
                'description' => '',
                'created_at' => '2016-06-23 16:28:43',
                'updated_at' => '2016-06-23 16:28:43',
                'enabled' => 1,
                'resync_on_login' => 0,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Host Facilities',
                'display_name' => 'Host Facilities',
                'description' => '',
                'created_at' => '2016-06-23 16:29:00',
                'updated_at' => '2016-06-23 16:33:43',
                'enabled' => 1,
                'resync_on_login' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'solar-installer',
                'display_name' => 'Solar Installer',
                'description' => '',
                'created_at' => '2016-07-28 09:15:05',
                'updated_at' => '2016-07-28 19:55:14',
                'enabled' => 1,
                'resync_on_login' => 1,
            ),
        ));
        
        
    }
}
