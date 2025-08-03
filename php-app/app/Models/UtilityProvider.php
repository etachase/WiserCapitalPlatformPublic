<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class UtilityProvider extends Model
{ 
    protected $fillable = ['name', 'is_green_button'];
    
    public static function findOrCreateWithUtilityProvider($utility_provider)
    {
        $utilityProvider = static::where('name', $utility_provider)->first();
        if (!$utilityProvider) {
            $utilityProvider = self::create(['name' => $utility_provider]);
        }
        return $utilityProvider;
    }
}
