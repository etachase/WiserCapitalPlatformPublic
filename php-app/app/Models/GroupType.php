<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupType extends Model
{
    protected $fillable = ['group_id' , 'type_id'];
    protected $table = "group_type";
    public $timestamps = false;

}
