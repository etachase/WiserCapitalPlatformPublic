<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Agreement;
use Flysystem;

class AgreementPosition extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set-agreement-position';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set the position of all agreements';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (Agreement::all() as $agreement) {
            $agreement->position = $agreement->id - 1;
            $agreement->save();
        }
        dd('Set position of agreements successfully');
    }
}
