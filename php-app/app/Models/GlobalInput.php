<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalInput extends Model
{
    protected $fillable = ['name' , 'description', 'low', 'high'];
    protected $table = 'globals';
    
    const GLOBAL_INPUT = 'Global Input';
    
    public function getInputByName($name) 
    {
        return $this->query()->where('name', $name)->first();
    }
}
