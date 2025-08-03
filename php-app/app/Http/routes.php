<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// Authentication routes...
Route::get( 'auth/login',               ['as' => 'login',                   'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',               ['as' => 'loginPost',               'uses' => 'Auth\AuthController@postLogin']);
Route::get( 'auth/logout',              ['as' => 'logout',                  'uses' => 'Auth\AuthController@getLogout']);
// Registration routes...
Route::get( 'auth/register',            ['as' => 'register',                'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',            ['as' => 'registerPost',            'uses' => 'Auth\AuthController@postRegister']);
Route::post('auth/register/terms',      ['as' => 'terms',                   'uses' => 'Auth\AuthController@getTerms']);
// Password reset link request routes...
Route::get( 'password/email',           ['as' => 'recover_password',        'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email',           ['as' => 'recover_passwordPost',    'uses' => 'Auth\PasswordController@postEmail']);
// Password reset routes...
Route::get( 'password/reset/{token}',   ['as' => 'reset_password',          'uses' => 'Auth\PasswordController@getReset']);
Route::post('password/reset',           ['as' => 'reset_passwordPost',      'uses' => 'Auth\PasswordController@postReset']);
// Registration terms
Route::get( 'faust',                    ['as' => 'faust',                   'uses' => 'FaustController@index']);
// Application routes...
Route::get( '/',       ['as' => 'backslash',   'uses' => 'Auth\AuthController@getLogin']);
Route::get( 'home',    ['as' => 'home',        'uses' => 'HomeController@index']);
Route::get( 'welcome', ['as' => 'welcome',     'uses' => 'HomeController@welcome']);
Route::patch( 'profile/update', ['as' => 'profile.update',     'uses' => 'ProfileController@update']);
Route::post('api/profile/photo', ['as' => 'profile.photo', 'uses' => 'ProfileController@uploadProfilephoto']);
Route::post('api/wiser/contact',['as' => 'wiser.contact', 'uses' => 'ProfileController@contactWiser']);
Route::get( 'profile/edit', ['as' => 'profile.edit',     'uses' => 'ProfileController@edit']);
Route::get( 'profile', ['as' => 'profile.index',     'uses' => 'ProfileController@index']);
Route::get( 'solar-installer-profile/{id}', ['as' => 'profile.show',     'uses' => 'ProfileController@show']);
Route::get( '/business-profile/edit', ['as' => 'business_profile.edit',     'uses' => 'ProfileController@businessEdit']);
Route::get( '/business-profile/skip', ['as' => 'business_profile.skip',     'uses' => 'ProfileController@skip']);
Route::patch( '/business-profile/update', ['as' => 'business_profile.update',     'uses' => 'ProfileController@businessUpdate']);
//Public pages routes
Route::get('/about/privacy', [ 'uses' => 'AboutController@privacy', 'as' => 'about.privacy']);
#Route::post('welcomecompany', ['as' => 'welcomecompany.store', 'uses' => 'CompanyController@store']);
// Routes in this group must be authorized.
Route::group(['middleware' => 'authorize'], function () {
    Route::post('check-login-status', 'LoginController@checkLoginStatus');
    
    // Application routes...
    Route::get( 'dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
    
    Route::get('investor-script', ['as' => 'script.list', 'uses' => 'ScriptController@index']);
        
    // amazon sqs test
    Route::get('sqs-test', ['as' => 'sqs-test', 'uses' => 'SQSTestController@index']);
    
    // Site administration section
    Route::group(['prefix' => 'admin'], function () {
        
        // solar installer routes
        Route::post(   'solar-installers',                 ['as' => 'admin.solar-installers.store',          'uses' => 'SolarInstallerController@store']);
        Route::get(   'solar-installers',                  ['as' => 'admin.solar-installers.index',          'uses' => 'SolarInstallerController@index']);
        Route::get(   'solar-installers/create',           ['as' => 'admin.solar-installers.create',         'uses' => 'SolarInstallerController@create']);
        Route::get(   'solar-installers/{id}/projects',    ['as' => 'admin.solar-installers.show',           'uses' => 'HFController@index']);
        Route::patch( 'solar-installers/{id}',             ['as' => 'admin.solar-installers.patch',          'uses' => 'SolarInstallerController@update']);
        Route::put(   'solar-installers/{id}',             ['as' => 'admin.solar-installers.update',         'uses' => 'SolarInstallerController@update']);
        Route::get('solar-installers/{id}/edit',           ['as' => 'admin.solar-installers.edit',           'uses' => 'SolarInstallerController@edit']);
        Route::get('solar-installers/{id}/confirm-delete', ['as' => 'admin.solar-installers.confirm-delete', 'uses' => 'SolarInstallerController@getModalDelete']);
        Route::get('solar-installers/{id}/delete',         ['as' => 'admin.solar-installers.delete',         'uses' => 'SolarInstallerController@destroy']);

        // Agreement routes
        Route::get('agreements/datatable', ['as' => 'admin.agreements.datatable', 'uses' => 'AgreementController@dataTable']);
        Route::post(   'agreements',                   ['as' => 'admin.agreements.store',           'uses' => 'AgreementController@store']);
        Route::get(   'agreements',                    ['as' => 'admin.agreements.index',           'uses' => 'AgreementController@index']);
        Route::get(   'agreements/create',             ['as' => 'admin.agreements.create',          'uses' => 'AgreementController@create']);
        Route::post(   'agreements/create',             ['as' => 'admin.agreements.createPost',     'uses' => 'AgreementController@create']);
        Route::get(   'agreements/{id}',               ['as' => 'admin.agreements.show',            'uses' => 'AgreementController@show']);
        Route::patch( 'agreements/{id}',               ['as' => 'admin.agreements.patch',           'uses' => 'AgreementController@update']);
        Route::put(   'agreements/{id}',               ['as' => 'admin.agreements.update',          'uses' => 'AgreementController@update']);
        Route::get('agreements/{id}/edit',             ['as' => 'admin.agreements.edit',            'uses' => 'AgreementController@edit']);
        Route::get('agreements/{id}/confirm-delete',   ['as' => 'admin.agreements.confirm-delete',  'uses' => 'AgreementController@getModalDelete']);
        Route::get('agreements/{id}/delete',           ['as' => 'admin.agreements.delete',          'uses' => 'AgreementController@destroy']);
        
        //agreement file routes
        Route::get(   'agreement-files/{id}/create',             ['as' => 'admin.agreement-file.create',          'uses' => 'AgreementFileController@create']);
        Route::post(   'agreement-files',             ['as' => 'admin.agreement-file.store',     'uses' => 'AgreementFileController@store']);
        Route::get(   'agreement-files/{id}',               ['as' => 'admin.agreement-file.show',            'uses' => 'AgreementFileController@show']);
        Route::patch( 'agreement-files/{id}',               ['as' => 'admin.agreement-file.patch',           'uses' => 'AgreementFileController@update']);
        Route::put(   'agreement-files/{id}',               ['as' => 'admin.agreement-file.update',          'uses' => 'AgreementFileController@update']);
        Route::get('agreement-files/{id}/edit',             ['as' => 'admin.agreement-file.edit',            'uses' => 'AgreementFileController@edit']);
        Route::get('agreement-files/{id}/download',             ['as' => 'admin.agreement-file.download',    'uses' => 'AgreementFileController@getDownloadableLink']);
        Route::get('agreement-files/{id}/confirm-delete', ['as' => 'admin.agreement-file.confirm-delete', 'uses' => 'AgreementFileController@getModalDelete']);
        Route::get('agreement-files/{id}/delete', ['as' => 'admin.agreement-file.delete', 'uses' => 'AgreementFileController@destroy']);
        Route::get(  'agreement-files/{id}/enabledAll',     ['as' => 'admin.agreement-files.enable-all', 'uses' => 'AgreementFileController@enableAll']);
        Route::get(  'agreement-files/{id}/disabledAll',    ['as' => 'admin.agreement-files.disable-all','uses' => 'AgreementFileController@disableAll']);
        Route::get(   'agreement-files/{id}/enable',        ['as' => 'admin.agreement-files.enable',          'uses' => 'AgreementFileController@enable']);
        Route::get(   'agreement-files/{id}/disable',       ['as' => 'admin.agreement-files.disable',         'uses' => 'AgreementFileController@disable']);
        
        //user routes
        Route::post(  'users/enableSelected',          ['as' => 'admin.users.enable-selected',  'uses' => 'UsersController@enableSelected']);
        Route::post(  'users/disableSelected',         ['as' => 'admin.users.disable-selected', 'uses' => 'UsersController@disableSelected']);
        Route::get(   'users/search',                  ['as' => 'admin.users.search',           'uses' => 'UsersController@searchByName']);
        Route::get(   'users/list',                    ['as' => 'admin.users.list',             'uses' => 'UsersController@listByPage']);
        Route::post(  'users/getInfo',                 ['as' => 'admin.users.get-info',         'uses' => 'UsersController@getInfo']);
        Route::post(  'users',                         ['as' => 'admin.users.store',            'uses' => 'UsersController@store']);
        Route::get(   'users',                         ['as' => 'admin.users.index',            'uses' => 'UsersController@index']);
        Route::get(   'users/create',                  ['as' => 'admin.users.create',           'uses' => 'UsersController@create']);
        Route::get(   'users/{userId}',                ['as' => 'admin.users.show',             'uses' => 'UsersController@show']);
        Route::patch( 'users/{userId}',                ['as' => 'admin.users.patch',            'uses' => 'UsersController@update']);
        Route::put(   'users/{userId}',                ['as' => 'admin.users.update',           'uses' => 'UsersController@update']);
        Route::delete('users/{userId}',                ['as' => 'admin.users.destroy',          'uses' => 'UsersController@destroy']);
        Route::get(   'users/{userId}/edit',           ['as' => 'admin.users.edit',             'uses' => 'UsersController@edit']);
        Route::get(   'users/{userId}/confirm-delete', ['as' => 'admin.users.confirm-delete',   'uses' => 'UsersController@getModalDelete']);
        Route::get(   'users/{userId}/delete',         ['as' => 'admin.users.delete',           'uses' => 'UsersController@destroy']);
        Route::get(   'users/{userId}/enable',         ['as' => 'admin.users.enable',           'uses' => 'UsersController@enable']);
        Route::get(   'users/{userId}/disable',        ['as' => 'admin.users.disable',          'uses' => 'UsersController@disable']);
        Route::get(   'users/{userId}/replayEdit',     ['as' => 'admin.users.replay-edit',      'uses' => 'UsersController@replayEdit']);
        Route::get(   'users/{userId}/masquerade',     ['as' => 'admin.users.masquerade',      'uses' => 'UsersController@masquerade']);
        
        // Role routes
        Route::post(  'roles/enableSelected',          ['as' => 'admin.roles.enable-selected',  'uses' => 'RolesController@enableSelected']);
        Route::post(  'roles/disableSelected',         ['as' => 'admin.roles.disable-selected', 'uses' => 'RolesController@disableSelected']);
        Route::get(   'roles/search',                  ['as' => 'admin.roles.search',           'uses' => 'RolesController@searchByName']);
        Route::post(  'roles/getInfo',                 ['as' => 'admin.roles.get-info',         'uses' => 'RolesController@getInfo']);
        Route::post(  'roles',                         ['as' => 'admin.roles.store',            'uses' => 'RolesController@store']);
        Route::get(   'roles',                         ['as' => 'admin.roles.index',            'uses' => 'RolesController@index']);
        Route::get(   'roles/create',                  ['as' => 'admin.roles.create',           'uses' => 'RolesController@create']);
        Route::get(   'roles/{roleId}',                ['as' => 'admin.roles.show',             'uses' => 'RolesController@show']);
        Route::patch( 'roles/{roleId}',                ['as' => 'admin.roles.patch',            'uses' => 'RolesController@update']);
        Route::put(   'roles/{roleId}',                ['as' => 'admin.roles.update',           'uses' => 'RolesController@update']);
        Route::delete('roles/{roleId}',                ['as' => 'admin.roles.destroy',          'uses' => 'RolesController@destroy']);
        Route::get(   'roles/{roleId}/edit',           ['as' => 'admin.roles.edit',             'uses' => 'RolesController@edit']);
        Route::get(   'roles/{roleId}/confirm-delete', ['as' => 'admin.roles.confirm-delete',   'uses' => 'RolesController@getModalDelete']);
        Route::get(   'roles/{roleId}/delete',         ['as' => 'admin.roles.delete',           'uses' => 'RolesController@destroy']);
        Route::get(   'roles/{roleId}/enable',         ['as' => 'admin.roles.enable',           'uses' => 'RolesController@enable']);
        Route::get(   'roles/{roleId}/disable',        ['as' => 'admin.roles.disable',          'uses' => 'RolesController@disable']);
        // Menu routes
        Route::post(  'menus',                         ['as' => 'admin.menus.save',             'uses' => 'MenusController@save']);
        Route::get(   'menus',                         ['as' => 'admin.menus.index',            'uses' => 'MenusController@index']);
        Route::get(   'menus/getData/{menuId}',        ['as' => 'admin.menus.get-data',         'uses' => 'MenusController@getData']);
        Route::get(   'menus/{menuId}/confirm-delete', ['as' => 'admin.menus.confirm-delete',   'uses' => 'MenusController@getModalDelete']);
        Route::get(   'menus/{menuId}/delete',         ['as' => 'admin.menus.delete',           'uses' => 'MenusController@destroy']);
        // Modules routes
        Route::get(   'modules',                               ['as' => 'admin.modules.index',            'uses' => 'ModulesController@index']);
        Route::get(   'modules/{slug}/initialize',             ['as' => 'admin.modules.initialize',       'uses' => 'ModulesController@initialize']);
        Route::get(   'modules/{slug}/uninitialize',           ['as' => 'admin.modules.uninitialize',     'uses' => 'ModulesController@uninitialize']);
        Route::get(   'modules/{slug}/enable',                 ['as' => 'admin.modules.enable',           'uses' => 'ModulesController@enable']);
        Route::get(   'modules/{slug}/disable',                ['as' => 'admin.modules.disable',          'uses' => 'ModulesController@disable']);
        Route::post(  'modules/enableSelected',                ['as' => 'admin.modules.enable-selected',  'uses' => 'ModulesController@enableSelected']);
        Route::post(  'modules/disableSelected',               ['as' => 'admin.modules.disable-selected', 'uses' => 'ModulesController@disableSelected']);
        Route::get(   'modules/optimize',                      ['as' => 'admin.modules.optimize',         'uses' => 'ModulesController@optimize']);
        // Permission routes
        Route::get(   'permissions/generate',                      ['as' => 'admin.permissions.generate',         'uses' => 'PermissionsController@generate']);
        Route::post(  'permissions/enableSelected',                ['as' => 'admin.permissions.enable-selected',  'uses' => 'PermissionsController@enableSelected']);
        Route::post(  'permissions/disableSelected',               ['as' => 'admin.permissions.disable-selected', 'uses' => 'PermissionsController@disableSelected']);
        Route::post(  'permissions',                               ['as' => 'admin.permissions.store',            'uses' => 'PermissionsController@store']);
        Route::get(   'permissions',                               ['as' => 'admin.permissions.index',            'uses' => 'PermissionsController@index']);
        Route::get(   'permissions/create',                        ['as' => 'admin.permissions.create',           'uses' => 'PermissionsController@create']);
        Route::get(   'permissions/{permissionId}',                ['as' => 'admin.permissions.show',             'uses' => 'PermissionsController@show']);
        Route::patch( 'permissions/{permissionId}',                ['as' => 'admin.permissions.patch',            'uses' => 'PermissionsController@update']);
        Route::put(   'permissions/{permissionId}',                ['as' => 'admin.permissions.update',           'uses' => 'PermissionsController@update']);
        Route::delete('permissions/{permissionId}',                ['as' => 'admin.permissions.destroy',          'uses' => 'PermissionsController@destroy']);
        Route::get(   'permissions/{permissionId}/edit',           ['as' => 'admin.permissions.edit',             'uses' => 'PermissionsController@edit']);
        Route::get(   'permissions/{permissionId}/confirm-delete', ['as' => 'admin.permissions.confirm-delete',   'uses' => 'PermissionsController@getModalDelete']);
        Route::get(   'permissions/{permissionId}/delete',         ['as' => 'admin.permissions.delete',           'uses' => 'PermissionsController@destroy']);
        Route::get(   'permissions/{permissionId}/enable',         ['as' => 'admin.permissions.enable',           'uses' => 'PermissionsController@enable']);
        Route::get(   'permissions/{permissionId}/disable',        ['as' => 'admin.permissions.disable',          'uses' => 'PermissionsController@disable']);
        // Route routes
        Route::get(   'routes/load',                     ['as' => 'admin.routes.load',             'uses' => 'RoutesController@load']);
        Route::post(  'routes/enableSelected',           ['as' => 'admin.routes.enable-selected',  'uses' => 'RoutesController@enableSelected']);
        Route::post(  'routes/disableSelected',          ['as' => 'admin.routes.disable-selected', 'uses' => 'RoutesController@disableSelected']);
        Route::post(  'routes/savePerms',                ['as' => 'admin.routes.save-perms',       'uses' => 'RoutesController@savePerms']);
        Route::get(   'routes/search',                   ['as' => 'admin.routes.search',           'uses' => 'RoutesController@searchByName']);
        Route::post(  'routes/getInfo',                  ['as' => 'admin.routes.get-info',         'uses' => 'RoutesController@getInfo']);
        Route::post(  'routes',                          ['as' => 'admin.routes.store',            'uses' => 'RoutesController@store']);
        Route::get(   'routes',                          ['as' => 'admin.routes.index',            'uses' => 'RoutesController@index']);
        Route::get(   'routes/create',                   ['as' => 'admin.routes.create',           'uses' => 'RoutesController@create']);
        Route::get(   'routes/{routeId}',                ['as' => 'admin.routes.show',             'uses' => 'RoutesController@show']);
        Route::patch( 'routes/{routeId}',                ['as' => 'admin.routes.patch',            'uses' => 'RoutesController@update']);
        Route::put(   'routes/{routeId}',                ['as' => 'admin.routes.update',           'uses' => 'RoutesController@update']);
        Route::delete('routes/{routeId}',                ['as' => 'admin.routes.destroy',          'uses' => 'RoutesController@destroy']);
        Route::get(   'routes/{routeId}/edit',           ['as' => 'admin.routes.edit',             'uses' => 'RoutesController@edit']);
        Route::get(   'routes/{routeId}/confirm-delete', ['as' => 'admin.routes.confirm-delete',   'uses' => 'RoutesController@getModalDelete']);
        Route::get(   'routes/{routeId}/delete',         ['as' => 'admin.routes.delete',           'uses' => 'RoutesController@destroy']);
        Route::get(   'routes/{routeId}/enable',         ['as' => 'admin.routes.enable',           'uses' => 'RoutesController@enable']);
        Route::get(   'routes/{routeId}/disable',        ['as' => 'admin.routes.disable',          'uses' => 'RoutesController@disable']);
        // Audit routes
        Route::get( 'audit',                           ['as' => 'admin.audit.index',             'uses' => 'AuditsController@index']);
        Route::get( 'audit/purge',                     ['as' => 'admin.audit.purge',             'uses' => 'AuditsController@purge']);
        Route::get( 'audit/{auditId}/replay',          ['as' => 'admin.audit.replay',            'uses' => 'AuditsController@replay']);
        Route::get( 'audit/{auditId}/show',            ['as' => 'admin.audit.show',              'uses' => 'AuditsController@show']);
        // Settings routes
        // TODO: Implements settings
        Route::get('settings',                         ['as' => 'admin.settings.index',          'uses' => 'TestController@test_flash_warning']);
        
        // WSAR tooltip meta
        Route::get('tooltips',                         ['as' => 'admin.tooltip.index',          'uses' => 'MetaController@Tooltip']);
        // Groups routes
        Route::get('companies', ['as' => 'companies.list', 'uses' => 'CompanyController@index']);
        Route::get('companies/datatable', ['as' => 'companies.datatable', 'uses' => 'CompanyController@dataTable']);
        Route::get('companies/create', ['as' => 'companies.create', 'uses' => 'CompanyController@create']);
        Route::post('companies', ['as' => 'companies.store', 'uses' => 'CompanyController@store']);
        Route::get('companies/edit/{id}', ['as' => 'companies.edit', 'uses' => 'CompanyController@edit']);
        Route::patch('companies/{id}', ['as' => 'companies.update', 'uses' => 'CompanyController@update']);
        Route::get('companies/{id}/confirm-delete', ['as' => 'companies.confirm-delete',   'uses' => 'CompanyController@getModalDelete']);
        Route::get('companies/{id}/download-agreement', ['as' => 'companies.download-agreement',   'uses' => 'CompanyController@downloadAgreement']);
        Route::get('companies/{id}/delete', ['as' => 'companies.delete', 'uses' => 'CompanyController@destroy']);
    }); // End of ADMIN group
    
    Route::post('api/admin/tooltips', ['as' => 'admin.tooltip.update', 'uses' => 'MetaController@updateTooltip']);
    Route::get('api/users', ['as' => 'api.users.index', 'uses' => 'UsersController@apiIndex']);
        
    
    // TODO: Remove this before release...
    if ($this->app->environment('development')) {
        // TEST-ACL routes
        Route::group(['prefix' => 'test-acl'], function () {
            Route::get('home',                  ['as' => 'test-acl.home',                'uses' => 'TestController@test_acl_home']);
            Route::get('do-not-pre-load',       ['as' => 'test-acl.do-not-pre-load',     'uses' => 'TestController@test_acl_do_not_load']);
            Route::get('no-perm',               ['as' => 'test-acl.no-perm',             'uses' => 'TestController@test_acl_no_perm']);
            Route::get('basic-authenticated',   ['as' => 'test-acl.basic-authenticated', 'uses' => 'TestController@test_acl_basic_authenticated']);
            Route::get('guest-only',            ['as' => 'test-acl.guest-only',          'uses' => 'TestController@test_acl_guest_only']);
            Route::get('open-to-all',           ['as' => 'test-acl.open-to-all',         'uses' => 'TestController@test_acl_open_to_all']);
            Route::get('admins',                ['as' => 'test-acl.admins',              'uses' => 'TestController@test_acl_admins']);
            Route::get('power-users',           ['as' => 'test-acl.power-users',         'uses' => 'TestController@test_acl_power_users']);
        }); // End of TEST-ACL group
        // TEST-FLASH routes
        Route::group(['prefix' => 'test-flash'], function () {
            Route::get('home',    ['as' => 'test-flash.home',     'uses' => 'TestController@test_flash_home']);
            Route::get('success', ['as' => 'test-flash.success',  'uses' => 'TestController@test_flash_success']);
            Route::get('info',    ['as' => 'test-flash.info',     'uses' => 'TestController@test_flash_info']);
            Route::get('warning', ['as' => 'test-flash.warning',  'uses' => 'TestController@test_flash_warning']);
            Route::get('error',   ['as' => 'test-flash.error',    'uses' => 'TestController@test_flash_error']);
        }); // End of TEST-FLASH group
        // TEST-MENU routes
        Route::group(['prefix' => 'test-menus'], function () {
            Route::get('home',     ['as' => 'test-menus.home',  'uses' => 'TestMenusController@test_menu_home']);
            Route::get('one',      ['as' => 'test-menus.one',   'uses' => 'TestMenusController@test_menu_one']);
            Route::get('two',      ['as' => 'test-menus.two',   'uses' => 'TestMenusController@test_menu_two']);
            Route::get('two-a',    ['as' => 'test-menus.two-a', 'uses' => 'TestMenusController@test_menu_two_a']);
            Route::get('two-b',    ['as' => 'test-menus.two-b', 'uses' => 'TestMenusController@test_menu_two_b']);
            Route::get('three',    ['as' => 'test-menus.three', 'uses' => 'TestMenusController@test_menu_three']);
        }); // End of TEST-MENU group
    } // End of if DEV environment
    require __DIR__.'/rapyd.php';
    
    // save user preffered project list view
    Route::post('user/project/list/view', ['as' => 'user.project.list.view', 
                'uses' => 'UsersController@updateProjectListView']);
    
    // get user favorite project list
    Route::get('user/favorite/projects', ['as' => 'user.favorite.projects', 
                'uses' => 'UserFavoriteController@getUserFavoriteProject']);
    
    // delete and confirm delete user favorite project
    Route::get('user/favorite/projects/{id}/confirm-delete', 
            ['as' => 'user.favorite.projects.confirm-delete',   
                'uses' => 'UserFavoriteController@getUnfavoriteProjectModal']);
    Route::get('user/favorite/projects/{id}/delete', 
            ['as' => 'user.favorite.projects.delete',   
                'uses' => 'UserFavoriteController@destroyUserFavoriteProject']);

    Route::get('hf/{id}/create', ['as' => 'hf.create',   'uses' => 'HFController@create']);
    Route::resource('hf', 'HFController', ['only' => ['index', 'create', 'store']]);
    
    
    Route::resource('portfolio', 'PortfolioController', ['only' => ['index', 'create', 'store']]);
    Route::get('portfolio/{id}/delete', ['as' => 'portfolio.delete', 'uses' => 'PortfolioController@destroy']);
    
    
    Route::get('portfolio/{id}/confirm-delete', ['as' => 'portfolio.confirm-delete',   'uses' => 'PortfolioController@getModalDelete']);
    
    Route::resource('investor', 'InvestorController', ['only' => ['index']]);
    Route::get('investor/datatable', ['as' => 'investor.datatable', 'uses' => 'InvestorController@dataTable']);
    Route::get('investor/datatablePortfolio', ['as' => 'investor.datatable-portfolio', 'uses' => 'InvestorController@dataTablePortfolio']);
    
    
    Route::resource('utility_providers', 'UtilityProviderController');
    
    Route::get('hf/{solar_installer_id}/datatable', ['as' => 'hf.datatable', 'uses' => 'HFController@dataTable']);
    Route::get('hf/datagrid', ['as' => 'hf.datagrid', 'uses' => 'HFController@dataGrid']);
    
    
    Route::get('hf/confirm-create', ['as' => 'hf.confirm-create',   'uses' => 'HFController@getModalCreate']);
     
    Route::post('hf/create', ['as' => 'hf.create', 'uses' => 'HFController@create']);
    Route::get('hf/facility-file-download',['as'=>'hf.facility-file-download','uses'=>'DocumentController@facilityFileDownload']);
    Route::get('hf/facility-file-preview',['as'=>'hf.facility-file-preview','uses'=>'DocumentController@facilityFilePreview']);
    Route::get('hf/get-utility-schedule', ['as' => 'hf.get-utility-schedule', 'uses' =>  'HFController@getUtilitySchedule']);
    Route::get('/api/hf', ['as' => 'hf.get-search-project', 'uses' =>  'HFController@getProject']);
    Route::get('/api/global/{value}/input', ['as' => 'global.input.get', 'uses' =>  'GlobalInputController@getGlobalInput']);
    
    Route::group(['middleware' => 'hf'], function () {
	Route::resource('hf', 'HFController', ['except' => ['index', 'create', 'store']]);
	
        Route::get('hf/{id}/confirm-delete', ['as' => 'hf.confirm-delete',   'uses' => 'HFController@getModalDelete']);
        Route::post('hf/{id}/investor/send-message', ['as' => 'hf.investor.send-message',   'uses' => 'DocumentController@sendMessageInvestor']);
        Route::post('hf/{id}/asset/mail', ['as' => 'hf.asset-mail',   'uses' => 'HFController@assetRequest']);
        Route::get('hf/{id}/full-download', ['as' => 'hf.full-download',   'uses' => 'DocumentController@fullDownload']);
        Route::get('hf/{id}/delete', ['as' => 'hf.delete', 'uses' => 'HFController@destroy']);
        Route::get('hf/{id}/dataroom', ['as' => 'hf.dataroom', 'uses' => 'DocumentController@dataRoom']);
        Route::get('hf/{id}/green-button', ['as' => 'hf.green-button', 'uses' => 'HFController@getGreenButton']);

	Route::get('hf/{id}/map', ['as' => 'hf.map', 'uses' => 'HFController@map']);
	Route::post('hf/{id}/map/store', ['as' => 'hf.store-map', 'uses' => 'HFController@storeMap']);
	Route::post('hf/{id}/update-meta', ['as' => 'hf.update-meta', 'uses' => 'ResultController@updateSiteMeta']);
	Route::get('hf/{id}/map/edit', ['as' => 'hf.map-edit', 'uses' => 'HFController@editMap']);
	Route::get('hf/{id}/project-user', ['as' => 'hf.project-user', 'uses' => 'ProjectUserController@index']);
	Route::get('hf/{id}/project-user-datatable', ['as' => 'hf.project-user.datatable', 'uses' => 'ProjectUserController@datatable']);
	Route::get('hf/{id}/project-user/{project_id}/delete', ['as' => 'hf.project-user.delete', 'uses' => 'ProjectUserController@destroy']);
	
        Route::get('hf/{id}/dataroom/download/{key}/{type?}/{portfolio?}', ['as' => 'hf.download-document', 'uses' => 'DocumentController@download']);
        Route::get('hf/{id}/agreement/{agreement_id}/{type}', ['as' => 'hf.show-hide-agreement', 'uses' => 'DocumentController@showHideAgreement']);
        Route::get('hf/{id}/dataroom-files', ['as' => 'hf.dataroom-files', 'uses' => 'DocumentController@dataRoomFiles']);
        Route::post('api/hf/{id}/upload-files', ['as' => 'hf.upload-files', 'uses' => 'DocumentController@uploadFiles']);
        Route::get('api/hf/{id}/get/files', ['as' => 'hf.get-files', 'uses' => 'DocumentController@getFolderFiles']);
        Route::delete('hf/{id}/delete-file', ['as' => 'hf.delete-file', 'uses' => 'DocumentController@deleteFile']);
        Route::post('api/hf/{id}/change-agreement-status', ['as' => 'hf.change-agreement-status', 'uses' => 'DocumentController@changeAgreementStatus']);
	Route::post('api/hf/{id}/change-site-status', ['as' => 'hf.change-site-status', 'uses' => 'HFController@changeSiteStatus']);
	Route::get('hf/{id}/wsar-score', ['as' => 'hf.wsar-score', 'uses' => 'HFController@WSARScore']);
	Route::get('hf/{id}/facility-profile', ['as' => 'hf.facility-profile', 'uses' => 'HFController@facilityProfile']);
	Route::post('hf/{id}/download-proposal', ['as' => 'hf.download-proposal', 'uses' => 'ResultController@downloadProposal']);
	Route::get('hf/{id}/download-excel', ['as' => 'hf.download-excel', 'uses' => 'ResultController@downloadExcel']);
	Route::get('hf/{id}/results', ['as' => 'hf.results', 'uses' => 'ResultController@results']);
	
	Route::get('hf/{id}/ppa', ['as' => 'hf.ppa', 'uses' => 'HFController@calculatePPA']);

        Route::get('hf/{id}/confirm-assessment',   ['as' => 'hf.confirm-assessment',  'uses' => 'ResultController@confirmAssessment']);

        Route::post('hf/{id}/results',   ['as' => 'hf.submit-assessment',  'uses' => 'ResultController@submitAssessment']);
        
	Route::get('hf/{id}/preliminary-assessment', ['as' => 'hf.preliminary-assessment', 'uses' => 'HFController@preliminaryAssessment']);
        
        // store user favorite project
        Route::post('user/favorite/projects/{id}',  ['as' => 'user.favorite.projects.store',  'uses' => 'UserFavoriteController@storeUserFavoriteProject']);
		Route::post('project/{id}/users', ['as' => 'project.user.store','uses' => 'ProjectUserController@storeProjectUser']);
		
    });
        Route::get('si/dataTable', ['as' => 'si.datatable', 'uses' => 'SIController@dataTable']); 
	Route::resource('si', 'SIController');
	Route::get( 'script', ['as' => 'script',     'uses' => 'ScriptController@index']);
    // Globals Routes
    Route::group(['middleware' => 'asset'], function () {
        Route::group(['prefix' => 'globals'], function () {
            Route::get('assets', ['as' => 'assets.list', 'uses' => 'AssetController@index']);
            Route::get('assets/datatable', ['as' => 'assets.datatable', 'uses' => 'AssetController@dataTable']);
            Route::get('assets/{type}/add', ['as' => 'assets.add', 'uses' => 'AssetController@create']);
            Route::get('assets/{type}/edit/{id}', ['as' => 'assets.edit', 'uses' => 'AssetController@edit']);
            Route::post('assets', ['as' => 'assets.store', 'uses' => 'AssetController@store']);
            Route::patch('assets/{id}', ['as' => 'assets.update', 'uses' => 'AssetController@update']);
            Route::get('assets/{id}/confirm-delete', ['as' => 'assets.confirm-delete',   'uses' => 'AssetController@getModalDelete']);
            Route::get('assets/{id}/delete', ['as' => 'assets.delete', 'uses' => 'AssetController@destroy']);
        });
    });
    Route::group(['prefix' => 'globals'], function () {
        Route::get('manufacturers', ['as' => 'manufacturers.list', 'uses' => 'ManufacturerController@index']);
        Route::get('manufacturers/datatable', ['as' => 'manufacturers.datatable', 'uses' => 'ManufacturerController@dataTable']);
        Route::get('manufacturers/add', ['as' => 'manufacturers.add', 'uses' => 'ManufacturerController@create']);
        Route::post('manufacturers', ['as' => 'manufacturers.store', 'uses' => 'ManufacturerController@store']);
        Route::patch('manufacturers/{id}', ['as' => 'manufacturers.update', 'uses' => 'ManufacturerController@update']);
        Route::get('manufacturers/{id}/edit', ['as' => 'manufacturers.edit', 'uses' => 'ManufacturerController@edit']);
        Route::get('manufacturers/{id}/confirm-delete', ['as' => 'manufacturers.confirm-delete',   'uses' => 'ManufacturerController@getModalDelete']);
        Route::get('manufacturers/{id}/delete', ['as' => 'manufacturers.delete', 'uses' => 'ManufacturerController@destroy']);

        Route::get('inputs', ['as' => 'inputs.list', 'uses' => 'GlobalInputController@index']);
        Route::get('inputs/datatable', ['as' => 'inputs.datatable', 'uses' => 'GlobalInputController@dataTable']);
        Route::get('inputs/add', ['as' => 'inputs.add', 'uses' => 'GlobalInputController@create']);
        Route::get('inputs/edit/{id}', ['as' => 'inputs.edit', 'uses' => 'GlobalInputController@edit']);
        Route::post('inputs', ['as' => 'inputs.store', 'uses' => 'GlobalInputController@store']);
        Route::patch('inputs/{id}', ['as' => 'inputs.update', 'uses' => 'GlobalInputController@update']);
        Route::get('inputs/{id}/confirm-delete', ['as' => 'inputs.confirm-delete',   'uses' => 'GlobalInputController@getModalDelete']);
        Route::get('inputs/{id}/delete', ['as' => 'inputs.delete', 'uses' => 'GlobalInputController@destroy']);
    });
	
}); // end of AUTHORIZE middleware group


Route::get('/refresh-csrf', 'LoginController@getToken');

	
	
	
	
