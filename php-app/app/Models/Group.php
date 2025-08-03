<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Group extends Model
{
    protected $fillable = ['name' , 'is_shared'];


    public static $type_mappings = [
        "1" => "Investor",
        "2" => "Solar Integrator"
    ];
    public static function getTypes($gid){
        return DB::table('group_type')->where('group_id',$gid)->lists('type_id');
    }

}
