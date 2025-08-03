<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Agreement;
use App\Models\AgreementFile;
use Flysystem;

class AgreementRemapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agreement-remapping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remap all the files in agreement for multi uploading';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach(Agreement::all() as $agreement) {
            if (!$agreement->doc_title) {
                continue;
            }
            $fileName  = $agreement->doc_title;
            $fileArray = explode('.', $fileName);
            $sqsName   = md5(uniqid(rand(), true)) . '.' . end($fileArray);
            $s3FilePath = Agreement::AGREEMENTS . '/' . $agreement->doc_title;
            if (!Flysystem::has($s3FilePath)) {
                $agreement->doc_title = '';
                $agreement->save();
                continue;
            }
            $agreementFile = AgreementFile::create([
                'agreement_id' => $agreement->id,
                'name'         => $fileArray[0],
                'file_name'    => $agreement->doc_title,
                'sqs_file_name'=> $sqsName,
            ]);
            Flysystem::put(Agreement::AGREEMENTS . '/'. $sqsName, Flysystem::read($s3FilePath), [
                'Metadata' => [
                    'name' => $fileName,
                    'key'  => $agreement->key . '_' . $agreementFile->id
                ],
            ]);
            Flysystem::delete($s3FilePath);
            $agreement->doc_title = '';
            $agreement->save();
        }
        dd('Agreement remapped successfully');
    }
}
