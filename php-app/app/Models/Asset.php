<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;


class Asset extends Model
{
    use Metable;
    protected $metaTable = 'assets_meta';
    protected $fillable = ['asset_type_id', 'name' , 'manufacturer_id', 'model'];
    
    const ASSET = 'Asset';
    
    public $timestamps = false;
    const TYPE_INVERTER        	= 2;
    const TYPE_MODULE          	= 5;
    //const TYPE_BATTERY         	= 3;
    //const TYPE_MONITORING      	= 6;
    const TYPE_RACKING        	= 4;
    //const TYPE_TRACKING 	= 7;
    public $unserializedData = [];


    public static $type_mappings = [
        self::TYPE_INVERTER => "Inverter",
        self::TYPE_MODULE => "Module",
        //self::TYPE_BATTERY => "Battery",
        //self::TYPE_MONITORING => "Monitoring",
        self::TYPE_RACKING => "Racking",
        //self::TYPE_TRACKING => "Tracking"

    ];
    public static $type_mappings_view = [
        self::TYPE_INVERTER => "inverter",
        self::TYPE_MODULE => "module",
        //self::TYPE_BATTERY => "battery",
        //self::TYPE_MONITORING => "monitoring",
        self::TYPE_RACKING => "racking",
        //self::TYPE_TRACKING => "tracking"
    ];

    public function scopeGetListByAssetTypeId($query, $id) {
        return $query->where('asset_type_id', $id)
                     ->orderBy('name')
                     ->lists('name', 'id');
    }
    
    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer');
    }
    
}
