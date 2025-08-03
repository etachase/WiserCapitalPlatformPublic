<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    protected $fillable = ['zip_code'];
    
    public static function findOrCreateWithZip($zip)
    {
        $zipCode = static::where('zip_code', $zip)->first();
        if (!$zipCode) {
            $zipCode = self::create(['zip_code' => $zip]);
        }
        return $zipCode;
    }
}
