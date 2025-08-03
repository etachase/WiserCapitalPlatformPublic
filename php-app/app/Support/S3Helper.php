<?php

namespace App\Support;
use Flysystem;

class S3Helper {
    
    const ROOT = 'root';
    
    /**
     * @description function will return the all uploaded files
     * @param array $metas 
     * @return type
     */
    
    public function getAllUploadedFiles($metas, $fileFields = 'hf.file_fields'){
        $bucket = config('flysystem.connections.awss3.bucket');

        $s3Client = Flysystem::getAdapter()->getClient();
        $uploaded_files = [];
        
        $fileFieldsMapping = config('constants.hf.file_fields_mapping');
        
        foreach (config('constants.' . $fileFields) as $fieldName => $value) {
            $dr_dir = !empty($fileFieldsMapping[$fieldName]) ? ''
                            : 'facility_information';
            $dr_id  = empty($fileFieldsMapping[$fieldName]) ? $fieldName  
                            : $fileFieldsMapping[$fieldName]['file_name'];
            $key    = ($dr_dir ? ($dr_dir. '_') : '' ). $dr_id;
            if (empty($metas['meta_'. $fieldName]) && empty($metas[$key])) {
                continue;
            }
            if (empty($metas[$key]) && !empty($metas['meta_'. $fieldName])) {
                $cmd = $s3Client->getCommand('GetObject', [
                    'Bucket' => $bucket,
                    'Key' => $metas['meta_'. $fieldName]['file_path']
                ]);

                $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

                // Get the actual presigned-url
                $presignedUrl = (string) $request->getUri();
                $uploaded_files[$fieldName] = $presignedUrl;
                continue;
            }
            foreach ($metas[$key] as $fileName => $file) {
                $cmd = $s3Client->getCommand('GetObject', [
                    'Bucket' => $bucket,
                    'Key' => $file['filePath']
                ]);

                $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

                // Get the actual presigned-url
                $presignedUrl = (string) $request->getUri();
                $uploaded_files[$key. '_' . $fileName] = $presignedUrl;
            }
        }
        return $uploaded_files;
    }
    /**
     * @description function will return the all uploaded files
     * @param array $metas 
     * @return type
     */
    
    public function getAllDataRoomUploadedFiles($metas, $fileFields = 'hf.data-room.parent_file_fields_mapping')
    {
        $s3Client = Flysystem::getAdapter()->getClient();
        $uploaded_files = [];
        
        foreach (config('constants.' . $fileFields) as $fileKey => $parentKey) {
            if (empty($metas[$fileKey])) 
                continue;
            
            foreach ($metas[$fileKey] as $name => $file) {
                $cmd = $s3Client->getCommand('GetObject', [
                    'Bucket' => config('flysystem.connections.awss3.bucket'),
                    'Key'    => $file['filePath']
                ]);

                $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
                $parentArray = explode("&", $parentKey);
                $parent = count($parentArray) > 1 ? implode('.', $parentArray) : 'root.' . $parentArray[0];
                $parentOriginalName = config('constants.hf.data-room.'. $parent . '.name');
                $fileOriginalName   = config('constants.hf.data-room.'. $parentArray[count($parentArray) - 1] . '.' . $fileKey . '.name');
                
                $filePathArray = explode('/', $file['filePath']);
                $filePath = $filePathArray[0]. '-All-Files/'. ((count($parentArray) > 1) 
                                ? ucwords(str_replace("_", " ", $parentArray[0])) . '/' : '' ). $parentOriginalName .
                                '/' . $fileOriginalName . '/'. $name;
                
                // Get the actual presigned-url
                $uploaded_files[$filePath] = (string) $request->getUri();
            }
        }
        return $uploaded_files;
    }
    
    public function getS3FileUrl($filepath)
    {
        $bucket = config('flysystem.connections.awss3.bucket');
        $s3Client = Flysystem::getAdapter()->getClient();
        $cmd = $s3Client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $filepath
        ]);

        $request = $s3Client->createPresignedRequest($cmd, '+20 minutes');
        
        // Get the actual presigned-url
        $presignedUrl = (string) $request->getUri();
        return $presignedUrl;
    }
}
