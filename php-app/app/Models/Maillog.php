<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maillog extends Model
{
    protected $fillable = [ 'user_id', 'route', 'email', 'subject', 'message'];
    public $timestamps = false;
}
