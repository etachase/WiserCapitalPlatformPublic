<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait as EntrustUserTrait;
use App\Models\Role;
use App\Traits\UserHasPermissionsTrait;
use Auth;
use Config;
use Sroutier\EloquentLDAP\Contracts\EloquentLDAPUserInterface;
use Kodeine\Metable\Metable;
use Session;
use App\Models\Company;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Metable;
    use EntrustUserTrait, UserHasPermissionsTrait {
        EntrustUserTrait::hasRole as entrustUserTraitHasRole;
        UserHasPermissionsTrait::can insteadof EntrustUserTrait;
        UserHasPermissionsTrait::boot insteadof EntrustUserTrait;
    }
    
    const LISTVIEW = 'list';
    const GRIDVIEW = 'grid';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $metaTable = 'users_meta';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'username', 'email', 'password', 'auth_type', 'enabled', 'company_id','is_debug'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The accessor to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name'];

    /**
     * Eloquent hook to HasMany relationship between User and Audit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function audits()
    {
        return $this->hasMany('App\Models\Audit');
    }
    /**
     * Eloquent hook to HasOne relationship between User and Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    /**
     * Alias to eloquent many-to-many relation's sync() method.
     *
     * @param array $attributes
     */
    private function assignMembership(array $attributes = [])
    {
        if (array_key_exists('role', $attributes) && ($attributes['role'])) {
            $this->roles()->sync($attributes['role']);
        } else {
            $this->roles()->sync([]);
        }
    }

    /**
     * Alias to eloquent many-to-many relation's sync() method.
     *
     * @param array $attributes
     */
    private function assignPermission(array $attributes = [])
    {
        if (array_key_exists('perms', $attributes) && ($attributes['perms'])) {
            $this->permissions()->sync($attributes['perms']);
        } else {
            $this->permissions()->sync([]);
        }
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * @return string
     */
    public function getFullNameAndUsernameAttribute()
    {
        return "$this->first_name $this->last_name ($this->username)";
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return bool
     */
    public function isRoot()
    {
        // Protect the root user from edits.
        if ('root' == $this->username) {
            return true;
        }
        // Otherwise
        return false;
    }

    /**
     * @return bool
     */
    public function isDeletable()
    {
        // Protect the root user from deletion.
        if ('root' == $this->username) {
            return false;
        }
        // Prevent user from deleting his own account.
        if ( Auth::check() && (Auth::user()->id == $this->id) ) {
            return false;
        }
        // Otherwise
        return true;
    }

    /**
     * @return bool
     */
    public function canBeDisabled()
    {
        // Protect the root user from being disabled.
        if ('root' == $this->username) {
            return false;
        }
        // Prevent user from disabling his own account.
        if ( Auth::check() && (Auth::user()->id == $this->id) ) {
            return false;
        }
        // Otherwise
        return true;
    }

    /**
     *
     * Force the user to have the given role.
     *
     * @param $roleName
     */
    public function forceRole($roleName)
    {
        // If the user is not a member to the given role,
        if (null == $this->roles()->where('name', $roleName)->first()) {
            // Load the given role and attach it to the user.
            $roleToForce = Role::where('name', $roleName)->first();
            $this->roles()->attach($roleToForce->id);
        }
    }

    /**
     * Code copy of EntrustUserTrait::hasRole(...) with the one addition to,
     * optionally, check if a role is enabled before returning true.
     *
     * @param $name
     * @param bool $requireAll
     * @return bool
     */
    public function hasRole($name, $requireAll = false, $mustBeEnabled = true)
    {
        if (is_array($name)) {
            foreach ($name as $roleName) {
                $hasRole = $this->hasRole($roleName);

                if ($hasRole && !$requireAll) {
                    return true;
                } elseif (!$hasRole && $requireAll) {
                    return false;
                }
            }

            // If we've made it this far and $requireAll is FALSE, then NONE of the roles were found
            // If we've made it this far and $requireAll is TRUE, then ALL of the roles were found.
            // Return the value of $requireAll;
            return $requireAll;
        } else {
            foreach ($this->roles as $role) {
                if ($role->name == $name) {
                    if ( $mustBeEnabled ) {
                        if ($role->enabled) {
                            return true;
                        } else {
                            return false;
                        }
                    } else {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * Overwrite Model::create(...) to save group membership if included,
     * or clear it if not. Also force membership to group 'users'.
     *
     * @param array $attributes
     * @return User
     */
    public static function create(array $attributes = []) {

        // If the auth_type is not explicitly set by the call function or module,
        // set it to the internal value.
        if (!array_key_exists('auth_type', $attributes) || ("" == ($attributes['auth_type'])) ) {
            $attributes['auth_type'] = Config::get('eloquent-ldap.label_internal');
        }

        // Call original create method from parent
        $user = parent::create($attributes);

        // Assign membership(s)
        $user->assignMembership($attributes);
        // Assign permission(s)
        $user->assignPermission($attributes);
        // Force membership to group 'users'
        $user->forceRole('users');

        return $user;
    }

    /**
     * Overwrite Model::update(...) to save group membership if included,
     * or clear it if not. Also force membership to group 'users'.
     *
     * @param array $attributes
     * @return void
     */
    public function update(array $attributes = []) {

        if ( array_key_exists('first_name', $attributes) ) {
            $this->first_name = $attributes['first_name'];
        }
        if ( array_key_exists('last_name', $attributes) ) {
            $this->last_name = $attributes['last_name'];
        }
        if ( array_key_exists('username', $attributes) ) {
            $this->username = $attributes['username'];
        }
        if ( array_key_exists('email', $attributes) ) {
            $this->email = $attributes['email'];
        }
        if( array_key_exists('password', $attributes) ) {
            $this->password = $attributes['password'];
        }
        if( array_key_exists('enabled', $attributes) ) {
            $this->enabled = $attributes['enabled'];
        }
        if( array_key_exists('company_id', $attributes) ) {
            $this->company_id = $attributes['company_id'];
        }
        $this->save();

        // Assign membership(s)
        $this->assignMembership($attributes);
        // Assign permission(s)
        $this->assignPermission($attributes);
        // Force membership to group 'users'
        $this->forceRole('users');
    }

    /**
     * Implements the 'isMemberOf(...)' as required by Eloquent-LDAP by using
     * the hasRole method and ignoring the enable state of the role.
     *
     * @param $name
     * @return bool
     */
    public function isMemberOf($name) {
        return $this->hasRole($name, false, false);
    }

    /**
     * Implements the 'membershipList()' method as required by Eloquent-LDAP.
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function membershipList() {
        return $this->roles();
    }

    /**
     * Returns the validation rules required to create a User.
     *
     * @return array
     */
    public static function getCreateValidationRules() {
        return array( 'email'             => 'required|unique:users',
                      'first_name'        => 'required',
                      'last_name'         => 'required',
                    );
    }

    /**
     * Returns the validation rules required to update a User.
     *
     * @return array
     */
    public static function getUpdateValidationRules($id) {
        return array( 'email'             => 'required|unique:users,email,' . $id,
                      'first_name'        => 'required',
                      'last_name'         => 'required',
                    );
    }
   
    /**
     * Returns array of role names
     */
    public function getRolesList() {
        $roles = [];
        
            foreach ($this->roles as $value) {
                $roles[] = $value->name;
            }
            
        return $roles;
    }
    
    /**
     * Returns the application role type of the user. 
     * Application roles -> SI, HF, Investor
     */
    public function getAppRoleName() { 
        $roles = $this->getRolesList();
        
        // Loading the correct profile view according to roles defined 
        return current(array_intersect(array_keys(Company::$type_mappings), $roles));
    }
    
    public function debug(){
        return $this->is_debug == 1;
    }
    
    public function getCompanyName()
    {
	    if($company = Company::find($this->company_id));
	    {
		    if(isset($company->name) && !empty($company->name))
		    {
			    return $company->name;
		    }
	    }
	    return false;
	}
    
    
    public function portfolios() //belongsToMany hasManyThrough
    {
        return $this->belongsToMany('App\Models\Portfolio')->withPivot('portfolio_id', 'user_id')->withTimestamps(); 
        //return $this->hasManyThrough('App\Models\Portfolio', 'App\Models\PortfolioUser', 'portfolio_id', 'user_id', 'id');
    }
    
    

}
