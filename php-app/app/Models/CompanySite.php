<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySite extends Model
{
    protected $fillable = ['company_id' , 'site_id'];
    protected $table = "company_site";
    public $timestamps = false;
    
}
