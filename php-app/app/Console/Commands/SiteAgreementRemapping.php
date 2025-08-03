<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Agreement;
use App\Models\Site;
use Flysystem;

class SiteAgreementRemapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site-agreement-remapping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remap all the files in agreement related to site for multi uploading';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $agreements = Agreement::all();
        foreach(Site::all() as $site) {
            foreach($agreements as $agreement) {
                $agreement_file = $site->getMeta($agreement->key);
                if (!$agreement_file || ($agreement_file && !is_array($agreement_file))) {
                    continue;
                }
                $fileName  = $agreement_file['filename'];
                $fileArray = explode('.', $fileName);
                
                $agreementFile = $agreement->files()->first();
                
                if (!$agreementFile || !Flysystem::has($agreement_file['filepath'])) {
                    $site->unsetMeta($agreement->key);
                    $site->save();
                    continue;
                }
                $agreement_key = $agreement->key . '_' . $agreementFile->id;
                $s3FilePath    = $site->id ."/". Agreement::AGREEMENTS. '/'. $agreement_key. 
                                    "/" . md5(uniqid(rand(), true)) . '.' . end($fileArray);
                Flysystem::put($s3FilePath, Flysystem::read($agreement_file['filepath']), [
                    'Metadata' => [
                        'name' => $fileName,
                        'key'  => $agreement_key
                    ],
                ]);
                Flysystem::delete($agreement_file['filepath']);
                $site->setMeta($agreement_key, [
                    'filename' => $fileName,
                    'filepath' => $s3FilePath
                ]);
                $site->unsetMeta($agreement->key);
                $site->save();
            }
            
        }
        dd('Project agreements remapped successfully');
    }
}
