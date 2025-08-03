<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $fillable = [
        'asset_type_id', 
        'name' , 
        'publicity_traded', 
        'equity', 
        'yearly_sales_trend', 
        'business_length'
    ];
    const MANUFACTURER = 'Manufacturer';
    
}
