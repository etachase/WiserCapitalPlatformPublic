<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Kodeine\Metable\Metable;

class Company extends Model
{
	use Metable;
    
    protected $metaTable = 'companies_meta';
    
    const COMPANY = 'Company';
    
    protected $fillable = ['name' , 'is_shared','type'];
    
    public static $type_mappings = [
        Role::TYPE_INVESTOR => "Investor",
        Role::TYPE_SOLAR_INTEGRATOR => "Solar Integrator",
        Role::TYPE_HOST_FACILITIES => "Host Facilities"
    ];
    
    public function sites() {
        return $this->belongsToMany('App\Models\Site','company_site','company_id','site_id');
    }
    
    /**
     * Returns the company is shared or not.
     *
     * @return boolean
     */
    public static function isShared($id) {
        $shared = Company::select('is_shared')->find($id);
        return $shared->is_shared;
    }

    /**
     * Returns the List of Companies(Name and Id).
     *
     * @return array
     */
    public static function getCompanyList() {
        return Company::lists('name', 'id');
    }
}
