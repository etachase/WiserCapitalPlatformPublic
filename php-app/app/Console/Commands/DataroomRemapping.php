<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Site;
use Flysystem;

class DataroomRemapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dataroom-remapping {site}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remap all the files in data room as per new structure';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $site = Site::find($this->argument('site'));
        
        if (!$site) {
            dd('Project doesn\'t exist');
        }
        $structure = config('constants.hf.data-room.old_file_fields_mapping');
        
        $keys  = array_keys($structure);
        $metas = $site->getMeta($keys)->toArray();

        foreach ($metas as $oldKey => $meta) {
            $newKey = $structure[$oldKey];
            foreach($meta as $fileName => $filePath) {
                if (!Flysystem::has($filePath)) {
                    continue;
                }
                
                $fileArray  = explode('.', $fileName);
                $s3FilePath = $site->id ."/data-room/" . md5(uniqid(rand(), true)) . '.' . end($fileArray);

                // put uploaded file on amazon server
                Flysystem::put($s3FilePath, Flysystem::read($filePath), [
                    'Metadata' => [
                        'name' => $fileName,
                        'key'  => $newKey
                    ],
                ]);

                // set amazon path on site meta
                $files = $site->getMeta($newKey) ? $site->getMeta($newKey) : [];
                $site->setMeta([$newKey => array_merge($files, [
                    $fileName => [
                        'filePath'  => $s3FilePath,
                        'timeStamp' => ''
                    ]
                ])]);
                Flysystem::delete($filePath);
            }
            $site->unsetMeta($oldKey);
            $site->save();
        }
        dd('DataRoom remapped successfully');
    }
}
