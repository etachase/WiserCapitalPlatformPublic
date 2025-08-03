<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'guest-only',
                'display_name' => 'Guest only access',
                'description' => 'Only guest users can access these.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'open-to-all',
                'display_name' => 'Open to all',
            'description' => 'Everyone can access these, even unauthenticated (guest) users.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'basic-authenticated',
                'display_name' => 'Basic authenticated',
                'description' => 'Basic permission after being authenticated.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'manage-menus',
                'display_name' => 'Manage menus',
                'description' => 'Allows a user to manage the site menus.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'manage-users',
                'display_name' => 'Manage users',
                'description' => 'Allows a user to manage the site users.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'manage-roles',
                'display_name' => 'Manage roles',
                'description' => 'Allows a user to manage the site roles.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'manage-permissions',
                'display_name' => 'Manage permissions',
                'description' => 'Allows a user to manage the site permissions.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'manage-routes',
                'display_name' => 'Manage routes',
                'description' => 'Allows a user to manage the site routes.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'manage-modules',
                'display_name' => 'Manage modules',
                'description' => 'Allows a user to manage the site modules.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'audit-log-view',
                'display_name' => 'View audit log',
                'description' => 'Allows a user to view the audit log.',
                'created_at' => '2016-05-19 23:53:53',
                'updated_at' => '2016-05-19 23:53:53',
                'enabled' => 1,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'audit-log-replay',
                'display_name' => 'Replay audit log item',
                'description' => 'Allows a user to replay items from the audit log.',
                'created_at' => '2016-05-19 23:53:54',
                'updated_at' => '2016-05-19 23:53:54',
                'enabled' => 1,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'audit-log-purge',
                'display_name' => 'Purge audit log',
                'description' => 'Allows a user to purge old items from the audit log.',
                'created_at' => '2016-05-19 23:53:54',
                'updated_at' => '2016-05-19 23:53:54',
                'enabled' => 1,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'admin-settings',
                'display_name' => 'Administer site settings',
                'description' => 'Allows a user to change site settings.',
                'created_at' => '2016-05-19 23:53:54',
                'updated_at' => '2016-05-19 23:53:54',
                'enabled' => 1,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'test-level-success',
                'display_name' => 'Test level success',
                'description' => 'Testing level success',
                'created_at' => '2016-05-19 23:54:03',
                'updated_at' => '2016-05-19 23:54:03',
                'enabled' => 1,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'test-level-info',
                'display_name' => 'Test level info',
                'description' => 'Testing level info',
                'created_at' => '2016-05-19 23:54:03',
                'updated_at' => '2016-05-19 23:54:03',
                'enabled' => 1,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'test-level-warning',
                'display_name' => 'Test level warning',
                'description' => 'Testing level warning',
                'created_at' => '2016-05-19 23:54:03',
                'updated_at' => '2016-05-19 23:54:03',
                'enabled' => 1,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'test-level-error',
                'display_name' => 'Test level error',
                'description' => 'Testing level error',
                'created_at' => '2016-05-19 23:54:03',
                'updated_at' => '2016-05-19 23:54:03',
                'enabled' => 1,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'faust!GET',
                'display_name' => 'faust!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\FaustController@index',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => '/!GET',
                'display_name' => '/!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HomeController@index',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'home!GET',
                'display_name' => 'home!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HomeController@index',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'welcome!GET',
                'display_name' => 'welcome!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HomeController@welcome',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'dashboard!GET',
                'display_name' => 'dashboard!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\DashboardController@index',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'admin/users/enableSelected!POST',
                'display_name' => 'admin/users/enableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@enableSelected',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'admin/users/disableSelected!POST',
                'display_name' => 'admin/users/disableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@disableSelected',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'admin/users/search!GET',
                'display_name' => 'admin/users/search!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@searchByName',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'admin/users/list!GET',
                'display_name' => 'admin/users/list!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@listByPage',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'admin/users/getInfo!POST',
                'display_name' => 'admin/users/getInfo!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@getInfo',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'admin/users!POST',
                'display_name' => 'admin/users!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@store',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'admin/users!GET',
                'display_name' => 'admin/users!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@index',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'admin/users/create!GET',
                'display_name' => 'admin/users/create!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@create',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'admin/users/{userId}!GET',
                'display_name' => 'admin/users/{userId}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@show',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'admin/users/{userId}!PATCH',
                'display_name' => 'admin/users/{userId}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@update',
                'created_at' => '2016-06-09 07:09:13',
                'updated_at' => '2016-06-09 07:09:13',
                'enabled' => 0,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'admin/users/{userId}!PUT',
                'display_name' => 'admin/users/{userId}!PUT',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@update',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'admin/users/{userId}!DELETE',
                'display_name' => 'admin/users/{userId}!DELETE',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@destroy',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'admin/users/{userId}/edit!GET',
                'display_name' => 'admin/users/{userId}/edit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@edit',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'admin/users/{userId}/confirm-delete!GET',
                'display_name' => 'admin/users/{userId}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@getModalDelete',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'admin/users/{userId}/delete!GET',
                'display_name' => 'admin/users/{userId}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@destroy',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'admin/users/{userId}/enable!GET',
                'display_name' => 'admin/users/{userId}/enable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@enable',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'admin/users/{userId}/disable!GET',
                'display_name' => 'admin/users/{userId}/disable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@disable',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'admin/users/{userId}/replayEdit!GET',
                'display_name' => 'admin/users/{userId}/replayEdit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\UsersController@replayEdit',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'admin/roles/enableSelected!POST',
                'display_name' => 'admin/roles/enableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@enableSelected',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'admin/roles/disableSelected!POST',
                'display_name' => 'admin/roles/disableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@disableSelected',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'admin/roles/search!GET',
                'display_name' => 'admin/roles/search!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@searchByName',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'admin/roles/getInfo!POST',
                'display_name' => 'admin/roles/getInfo!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@getInfo',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'admin/roles!POST',
                'display_name' => 'admin/roles!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@store',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'admin/roles!GET',
                'display_name' => 'admin/roles!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@index',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'admin/roles/create!GET',
                'display_name' => 'admin/roles/create!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@create',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'admin/roles/{roleId}!GET',
                'display_name' => 'admin/roles/{roleId}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@show',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'admin/roles/{roleId}!PATCH',
                'display_name' => 'admin/roles/{roleId}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@update',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'admin/roles/{roleId}!PUT',
                'display_name' => 'admin/roles/{roleId}!PUT',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@update',
                'created_at' => '2016-06-09 07:09:14',
                'updated_at' => '2016-06-09 07:09:14',
                'enabled' => 0,
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'admin/roles/{roleId}!DELETE',
                'display_name' => 'admin/roles/{roleId}!DELETE',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@destroy',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'admin/roles/{roleId}/edit!GET',
                'display_name' => 'admin/roles/{roleId}/edit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@edit',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'admin/roles/{roleId}/confirm-delete!GET',
                'display_name' => 'admin/roles/{roleId}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@getModalDelete',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'admin/roles/{roleId}/delete!GET',
                'display_name' => 'admin/roles/{roleId}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@destroy',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'admin/roles/{roleId}/enable!GET',
                'display_name' => 'admin/roles/{roleId}/enable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@enable',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'admin/roles/{roleId}/disable!GET',
                'display_name' => 'admin/roles/{roleId}/disable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RolesController@disable',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'admin/menus!POST',
                'display_name' => 'admin/menus!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\MenusController@save',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'admin/menus!GET',
                'display_name' => 'admin/menus!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\MenusController@index',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'admin/menus/getData/{menuId}!GET',
                'display_name' => 'admin/menus/getData/{menuId}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\MenusController@getData',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'admin/menus/{menuId}/confirm-delete!GET',
                'display_name' => 'admin/menus/{menuId}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\MenusController@getModalDelete',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'admin/menus/{menuId}/delete!GET',
                'display_name' => 'admin/menus/{menuId}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\MenusController@destroy',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'admin/modules!GET',
                'display_name' => 'admin/modules!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@index',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'admin/modules/{slug}/initialize!GET',
                'display_name' => 'admin/modules/{slug}/initialize!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@initialize',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'admin/modules/{slug}/uninitialize!GET',
                'display_name' => 'admin/modules/{slug}/uninitialize!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@uninitialize',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'admin/modules/{slug}/enable!GET',
                'display_name' => 'admin/modules/{slug}/enable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@enable',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'admin/modules/{slug}/disable!GET',
                'display_name' => 'admin/modules/{slug}/disable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@disable',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'admin/modules/enableSelected!POST',
                'display_name' => 'admin/modules/enableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@enableSelected',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'admin/modules/disableSelected!POST',
                'display_name' => 'admin/modules/disableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@disableSelected',
                'created_at' => '2016-06-09 07:09:15',
                'updated_at' => '2016-06-09 07:09:15',
                'enabled' => 0,
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'admin/modules/optimize!GET',
                'display_name' => 'admin/modules/optimize!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\ModulesController@optimize',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'admin/permissions/generate!GET',
                'display_name' => 'admin/permissions/generate!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@generate',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'admin/permissions/enableSelected!POST',
                'display_name' => 'admin/permissions/enableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@enableSelected',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'admin/permissions/disableSelected!POST',
                'display_name' => 'admin/permissions/disableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@disableSelected',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'admin/permissions!POST',
                'display_name' => 'admin/permissions!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@store',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'admin/permissions!GET',
                'display_name' => 'admin/permissions!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@index',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'admin/permissions/create!GET',
                'display_name' => 'admin/permissions/create!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@create',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'admin/permissions/{permissionId}!GET',
                'display_name' => 'admin/permissions/{permissionId}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@show',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'admin/permissions/{permissionId}!PATCH',
                'display_name' => 'admin/permissions/{permissionId}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@update',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'admin/permissions/{permissionId}!PUT',
                'display_name' => 'admin/permissions/{permissionId}!PUT',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@update',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'admin/permissions/{permissionId}!DELETE',
                'display_name' => 'admin/permissions/{permissionId}!DELETE',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@destroy',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'admin/permissions/{permissionId}/edit!GET',
                'display_name' => 'admin/permissions/{permissionId}/edit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@edit',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'admin/permissions/{permissionId}/confirm-delete!GET',
                'display_name' => 'admin/permissions/{permissionId}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@getModalDelete',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'admin/permissions/{permissionId}/delete!GET',
                'display_name' => 'admin/permissions/{permissionId}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@destroy',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'admin/permissions/{permissionId}/enable!GET',
                'display_name' => 'admin/permissions/{permissionId}/enable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@enable',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'admin/permissions/{permissionId}/disable!GET',
                'display_name' => 'admin/permissions/{permissionId}/disable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\PermissionsController@disable',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'admin/routes/load!GET',
                'display_name' => 'admin/routes/load!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@load',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'admin/routes/enableSelected!POST',
                'display_name' => 'admin/routes/enableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@enableSelected',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'admin/routes/disableSelected!POST',
                'display_name' => 'admin/routes/disableSelected!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@disableSelected',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'admin/routes/savePerms!POST',
                'display_name' => 'admin/routes/savePerms!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@savePerms',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'admin/routes/search!GET',
                'display_name' => 'admin/routes/search!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@searchByName',
                'created_at' => '2016-06-09 07:09:16',
                'updated_at' => '2016-06-09 07:09:16',
                'enabled' => 0,
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'admin/routes/getInfo!POST',
                'display_name' => 'admin/routes/getInfo!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@getInfo',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'admin/routes!POST',
                'display_name' => 'admin/routes!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@store',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'admin/routes!GET',
                'display_name' => 'admin/routes!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@index',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'admin/routes/create!GET',
                'display_name' => 'admin/routes/create!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@create',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'admin/routes/{routeId}!GET',
                'display_name' => 'admin/routes/{routeId}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@show',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'admin/routes/{routeId}!PATCH',
                'display_name' => 'admin/routes/{routeId}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@update',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'admin/routes/{routeId}!PUT',
                'display_name' => 'admin/routes/{routeId}!PUT',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@update',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'admin/routes/{routeId}!DELETE',
                'display_name' => 'admin/routes/{routeId}!DELETE',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@destroy',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'admin/routes/{routeId}/edit!GET',
                'display_name' => 'admin/routes/{routeId}/edit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@edit',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'admin/routes/{routeId}/confirm-delete!GET',
                'display_name' => 'admin/routes/{routeId}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@getModalDelete',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'admin/routes/{routeId}/delete!GET',
                'display_name' => 'admin/routes/{routeId}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@destroy',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'admin/routes/{routeId}/enable!GET',
                'display_name' => 'admin/routes/{routeId}/enable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@enable',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'admin/routes/{routeId}/disable!GET',
                'display_name' => 'admin/routes/{routeId}/disable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\RoutesController@disable',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'admin/audit!GET',
                'display_name' => 'admin/audit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AuditsController@index',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'admin/audit/purge!GET',
                'display_name' => 'admin/audit/purge!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AuditsController@purge',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'admin/audit/{auditId}/replay!GET',
                'display_name' => 'admin/audit/{auditId}/replay!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AuditsController@replay',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'admin/audit/{auditId}/show!GET',
                'display_name' => 'admin/audit/{auditId}/show!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AuditsController@show',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'admin/settings!GET',
                'display_name' => 'admin/settings!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_flash_warning',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'test-acl/home!GET',
                'display_name' => 'test-acl/home!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_home',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'test-acl/no-perm!GET',
                'display_name' => 'test-acl/no-perm!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_no_perm',
                'created_at' => '2016-06-09 07:09:17',
                'updated_at' => '2016-06-09 07:09:17',
                'enabled' => 0,
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'test-acl/basic-authenticated!GET',
                'display_name' => 'test-acl/basic-authenticated!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_basic_authenticated',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'test-acl/guest-only!GET',
                'display_name' => 'test-acl/guest-only!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_guest_only',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'test-acl/open-to-all!GET',
                'display_name' => 'test-acl/open-to-all!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_open_to_all',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'test-acl/admins!GET',
                'display_name' => 'test-acl/admins!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_admins',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'test-acl/power-users!GET',
                'display_name' => 'test-acl/power-users!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_power_users',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'test-flash/home!GET',
                'display_name' => 'test-flash/home!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_flash_home',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'test-flash/success!GET',
                'display_name' => 'test-flash/success!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_flash_success',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'test-flash/info!GET',
                'display_name' => 'test-flash/info!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_flash_info',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'test-flash/warning!GET',
                'display_name' => 'test-flash/warning!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_flash_warning',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'test-flash/error!GET',
                'display_name' => 'test-flash/error!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_flash_error',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'test-menus/home!GET',
                'display_name' => 'test-menus/home!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestMenusController@test_menu_home',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'test-menus/one!GET',
                'display_name' => 'test-menus/one!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestMenusController@test_menu_one',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'test-menus/two!GET',
                'display_name' => 'test-menus/two!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestMenusController@test_menu_two',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'test-menus/two-a!GET',
                'display_name' => 'test-menus/two-a!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestMenusController@test_menu_two_a',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'test-menus/two-b!GET',
                'display_name' => 'test-menus/two-b!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestMenusController@test_menu_two_b',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'test-menus/three!GET',
                'display_name' => 'test-menus/three!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestMenusController@test_menu_three',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'rapyd-ajax/{hash}!GET',
                'display_name' => 'rapyd-ajax/{hash}!GET',
                'description' => 'Auto-generated from route: \\Zofe\\Rapyd\\Controllers\\AjaxController@getRemote',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'test-acl/do-not-pre-load!GET',
                'display_name' => 'test-acl/do-not-pre-load!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\TestController@test_acl_do_not_load',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'hf/{id}/dataroom!GET',
                'display_name' => 'hf/{id}/dataroom!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@dataRoom',
                'created_at' => '2016-06-09 07:09:18',
                'updated_at' => '2016-06-09 07:09:18',
                'enabled' => 0,
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'hf/dataTable!GET',
                'display_name' => 'hf/dataTable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@dataTable',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'hf!GET',
                'display_name' => 'hf!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@index',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'hf/create!GET',
                'display_name' => 'hf/create!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@create',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'hf!POST',
                'display_name' => 'hf!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@store',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'hf/{hf}!GET',
                'display_name' => 'hf/{hf}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@show',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'hf/{hf}/edit!GET',
                'display_name' => 'hf/{hf}/edit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@edit',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'hf/{hf}!PUT',
                'display_name' => 'hf/{hf}!PUT',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@update',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'hf/{hf}!PATCH',
                'display_name' => 'hf/{hf}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@update',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'hf/{hf}!DELETE',
                'display_name' => 'hf/{hf}!DELETE',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@destroy',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'si/dataTable!GET',
                'display_name' => 'si/dataTable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@dataTable',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'si!GET',
                'display_name' => 'si!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@index',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'si/create!GET',
                'display_name' => 'si/create!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@create',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'si!POST',
                'display_name' => 'si!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@store',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'si/{si}!GET',
                'display_name' => 'si/{si}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@show',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'si/{si}/edit!GET',
                'display_name' => 'si/{si}/edit!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@edit',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'si/{si}!PUT',
                'display_name' => 'si/{si}!PUT',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@update',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'si/{si}!PATCH',
                'display_name' => 'si/{si}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@update',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'si/{si}!DELETE',
                'display_name' => 'si/{si}!DELETE',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\SIController@destroy',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'script!GET',
                'display_name' => 'script!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HomeController@script',
                'created_at' => '2016-06-09 07:09:19',
                'updated_at' => '2016-06-09 07:09:19',
                'enabled' => 0,
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'about/privacy!GET',
                'display_name' => 'about/privacy!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AboutController@privacy',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            148 => 
            array (
                'id' => 149,
                'name' => 'admin/companies!GET',
                'display_name' => 'admin/companies!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@index',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            149 => 
            array (
                'id' => 150,
                'name' => 'admin/companies/datatable!GET',
                'display_name' => 'admin/companies/datatable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@dataTable',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            150 => 
            array (
                'id' => 151,
                'name' => 'admin/companies/create!GET',
                'display_name' => 'admin/companies/create!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@create',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            151 => 
            array (
                'id' => 152,
                'name' => 'admin/companies!POST',
                'display_name' => 'admin/companies!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@store',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            152 => 
            array (
                'id' => 153,
                'name' => 'admin/companies/edit/{id}!GET',
                'display_name' => 'admin/companies/edit/{id}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@edit',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            153 => 
            array (
                'id' => 154,
                'name' => 'admin/companies/{id}!PATCH',
                'display_name' => 'admin/companies/{id}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@update',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            154 => 
            array (
                'id' => 155,
                'name' => 'admin/companies/{id}/confirm-delete!GET',
                'display_name' => 'admin/companies/{id}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@getModalDelete',
                'created_at' => '2016-07-20 20:45:50',
                'updated_at' => '2016-07-20 20:45:50',
                'enabled' => 0,
            ),
            155 => 
            array (
                'id' => 156,
                'name' => 'admin/companies/{id}/delete!GET',
                'display_name' => 'admin/companies/{id}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\CompanyController@destroy',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            156 => 
            array (
                'id' => 157,
                'name' => 'hf/{id}/confirm-delete!GET',
                'display_name' => 'hf/{id}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@getModalDelete',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            157 => 
            array (
                'id' => 158,
                'name' => 'hf/{id}/delete!GET',
                'display_name' => 'hf/{id}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@destroy',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            158 => 
            array (
                'id' => 159,
                'name' => 'hf/{id}/dataroom/download/{document}/{type?}!GET',
                'display_name' => 'hf/{id}/dataroom/download/{document}/{type?}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@download',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            159 => 
            array (
                'id' => 160,
                'name' => 'hf/facility-file-download!GET',
                'display_name' => 'hf/facility-file-download!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@facilityFileDownload',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            160 => 
            array (
                'id' => 161,
                'name' => 'hf/{id}/dataroom-files!GET',
                'display_name' => 'hf/{id}/dataroom-files!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@dataRoomFiles',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            161 => 
            array (
                'id' => 162,
                'name' => 'hf/{id}/upload-files!POST',
                'display_name' => 'hf/{id}/upload-files!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@uploadFiles',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            162 => 
            array (
                'id' => 163,
                'name' => 'hf/{id}/wsar-score!GET',
                'display_name' => 'hf/{id}/wsar-score!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@WSARScore',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            163 => 
            array (
                'id' => 164,
                'name' => 'hf/{id}/facility-profile!GET',
                'display_name' => 'hf/{id}/facility-profile!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@facilityProfile',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            164 => 
            array (
                'id' => 165,
                'name' => 'hf/{id}/preliminary-proposal!GET',
                'display_name' => 'hf/{id}/preliminary-proposal!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@preliminaryProposal',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            165 => 
            array (
                'id' => 166,
                'name' => 'hf/{id}/preliminary-assessment!GET',
                'display_name' => 'hf/{id}/preliminary-assessment!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\HFController@preliminaryAssessment',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            166 => 
            array (
                'id' => 167,
                'name' => 'globals/assets!GET',
                'display_name' => 'globals/assets!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@index',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            167 => 
            array (
                'id' => 168,
                'name' => 'globals/assets/datatable!GET',
                'display_name' => 'globals/assets/datatable!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@dataTable',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            168 => 
            array (
                'id' => 169,
                'name' => 'globals/assets/{type}/add!GET',
                'display_name' => 'globals/assets/{type}/add!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@create',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            169 => 
            array (
                'id' => 170,
                'name' => 'globals/assets/{type}/edit/{id}!GET',
                'display_name' => 'globals/assets/{type}/edit/{id}!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@edit',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            170 => 
            array (
                'id' => 171,
                'name' => 'globals/assets!POST',
                'display_name' => 'globals/assets!POST',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@store',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            171 => 
            array (
                'id' => 172,
                'name' => 'globals/assets/{id}!PATCH',
                'display_name' => 'globals/assets/{id}!PATCH',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@update',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            172 => 
            array (
                'id' => 173,
                'name' => 'globals/assets/{id}/confirm-delete!GET',
                'display_name' => 'globals/assets/{id}/confirm-delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@getModalDelete',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            173 => 
            array (
                'id' => 174,
                'name' => 'globals/assets/{id}/delete!GET',
                'display_name' => 'globals/assets/{id}/delete!GET',
                'description' => 'Auto-generated from route: App\\Http\\Controllers\\AssetController@destroy',
                'created_at' => '2016-07-20 20:45:51',
                'updated_at' => '2016-07-20 20:45:51',
                'enabled' => 0,
            ),
            174 => 
            array (
                'id' => 175,
                'name' => 'Host Facility Permissions',
                'display_name' => 'Host Facility Permissions',
                'description' => 'Host Facility Permissions',
                'created_at' => '2016-07-20 20:46:18',
                'updated_at' => '2016-07-20 20:46:18',
                'enabled' => 1,
            ),
            175 => 
            array (
                'id' => 187,
                'name' => 'admin/solar-installers!GET',
                'display_name' => 'admin/solar-installers!GET',
                'description' => 'Auto-generated from route: App\Http\Controllers\SolarInstallerController@index',
                'created_at' => '2016-08-16 08:05:03',
                'updated_at' => '2016-08-16 08:05:03',
                'enabled' => 1,
            ),
        ));
        
        
    }
}
