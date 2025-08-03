<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Flysystem;
use Illuminate\Http\Request;

class SolarInstaller extends Model
{
    use \Kodeine\Metable\Metable;
    
    const SOLAR_INSTALLER = 'Solar Installer';    
    protected $fillable = ['name', 'entity_type', 'phone', 'website', 'address','address2','city', 'state', 'zip_code', 'type_of_license', 'license_number'];

    public function scopeGetList($query) {
        return $query->orderBy('name')
            ->lists('name', 'id');
    }
    
    public static function getTotalKWInstalled($id) {
        // TODO Calculating the total kw installed for SI from projects 
        return 2500;
    }
    /**
     * Function to validate files
     * 
     * @param Request $request
     */
    public function validateMultiFiles(Request $request) 
    {
        $rules = [];
        foreach (config('constants.profile.solar_multi_file_fields') as $key => $rule) {
            if (!$request->$key) {
                continue;
            }
            foreach ($request->$key as $index => $file) {
                $rules[$key. '.'. $index] = $rule;
            }
        }
        return $rules;
    }
    
    /**
     * Function to delete and add files
     * 
     * @param Request $request
     * @param type $id
     */
    public function deleteAndAddFiles(Request $request, $id) 
    {
        $solarInstaller = self::find($id);
        if (!$solarInstaller) {
            return '';
        }
        
        $fileFields = config('constants.profile.solar_file_fields');
        $multiFileFields = config('constants.profile.solar_multi_file_fields');
        
        /*
         * check for deleted files
         * Right now we are just removing from our meta
         */
        foreach ($fileFields as $fieldName => $value) 
        {
            if ($request->has('delete_' . $fieldName)) 
            {
                $solarInstaller->unsetMeta('meta_' . $fieldName);
            }
        }
        /*
         * check for deleted multi files
         * Right now we are just removing from our meta
         */
        foreach ($multiFileFields as $fieldName => $value) 
        {
            $field = 'delete_' . $fieldName;
            if (!$request->has($field)) 
            {
                continue;
            }
            foreach ($request->$field as $file) {
                $metaKey = 'meta_' . $fieldName;
                $files  = $solarInstaller->getMeta($metaKey) ? $solarInstaller->getMeta($metaKey) : [];
                $filePath = $files[$file];
                Flysystem::has($filePath) ? Flysystem::delete($filePath) : '';
                unset($files[$file]);
                count($files) ? $solarInstaller->setMeta([ $metaKey => $files ]) 
                        : $solarInstaller->unsetMeta($metaKey);
            }
        }
        
        $fileData = [];
        
        foreach ($fileFields as $fieldName => $value) {
            
            if ($request->hasFile($fieldName))
            {
                $s3DirPath = 'si/'. $solarInstaller->id . '/' . $fieldName . '/' ;
                $s3FilePath = $s3DirPath . $request->file($fieldName)->getClientOriginalName();
                
                if (Flysystem::has($s3DirPath)) 
                {
                    Flysystem::deleteDir($s3DirPath);
                }
                
                Flysystem::put($s3FilePath, fopen($request->file($fieldName)->getRealPath(), "r"));

                $fileData['meta_' . $fieldName] = [
                    'file_path' => $s3FilePath,
                    'filename' => $request->file($fieldName)->getClientOriginalName(),
                ];
            }
            
        }
        
        foreach ($multiFileFields as $fieldName => $value) {
            
            if (!$request->$fieldName)
            {
                continue;
            }
            $s3DirPath = 'si/'. $solarInstaller->id . '/' . $fieldName . '/' ;
            $metaKey   = 'meta_' . $fieldName;
            foreach ($request->$fieldName as $file) {
                if (!$file) 
                {
                    continue;
                }
                
                $s3FilePath = $s3DirPath . $file->getClientOriginalName();

                // check and remove folder and file on amazon server
                Flysystem::has($s3FilePath) ? Flysystem::delete($s3FilePath) : '';
                $files = $solarInstaller->getMeta($metaKey) ? $solarInstaller->getMeta($metaKey) : [];

                // put uploaded file on amazon server
                Flysystem::put($s3FilePath, fopen($file->getRealPath(), "r"));

                // set amazon path on site meta
                $solarInstaller->setMeta([ $metaKey => array_merge($files, [
                    $file->getClientOriginalName() => $s3FilePath
                ])]);
            }
            
        }
        
        
        
        /* Now add new files to meta */
        if (!empty($fileData)) {
            $solarInstaller->setMeta($fileData);
        }
        $solarInstaller->save();
        return $solarInstaller;
    }
}
