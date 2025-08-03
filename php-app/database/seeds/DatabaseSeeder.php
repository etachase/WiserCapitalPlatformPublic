<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ProductionSeeder');

        if( App::environment() === 'development' )
        {
            $this->call('DevelopmentSeeder');
            $this->call('UsersTableSeeder');
			$this->call('MenusTableSeeder');
			$this->call('RolesTableSeeder');
			$this->call('PermissionsTableSeeder');
			$this->call('PermissionUserTableSeeder');
			$this->call('PermissionRoleTableSeeder');
			$this->call('RoleUserTableSeeder');
            $this->call('RoutesTableSeeder');
            $this->call('GlobalsTableSeeder');
			$this->call('SolarInstallersTableSeeder');
			$this->call('SolarInstallersMetaTableSeeder');
			$this->call('AgreementsTableSeeder');
			$this->call('MetasTableSeeder');
			$this->call('UtilityProvidersTableSeeder');
        $this->call('AssetsTableSeeder');
        $this->call('AssetsMetaTableSeeder');
    }

        Model::reguard();
    }
}
