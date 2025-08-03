<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class RemovePreviewableFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove-previewable-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove Previewable File';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dir = public_path('jstree/previewableFile');
        if (!file_exists($dir) && !is_dir($dir)) {
            dd('No file exist in this directory');   
        } 
        $files = File::allFiles($dir);
        foreach ($files as $file) {
            if (strtotime('-2 minutes') >= filemtime($file)) {
                unlink($file);
            }
        }
        dd('Unlinked all the files from directory');   
    }
}
