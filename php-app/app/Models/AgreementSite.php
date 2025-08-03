<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AgreementSite extends Model
{
    protected $table = 'agreement_site';
    
    public $timestamps = false;
    
    protected $fillable = ['agreement_id','site_id'];
}
