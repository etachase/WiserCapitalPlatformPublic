<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class ProjectUser extends Model
{ 
	
    protected $fillable = ['user_id', 'site_id'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function site()
    {
        return $this->belongsTo('App\Models\Site');
    }    
}
