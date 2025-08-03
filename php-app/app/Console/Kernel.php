<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\DataroomRemapping::class,
        \App\Console\Commands\AgreementPosition::class,
        \App\Console\Commands\AgreementRemapping::class,
        \App\Console\Commands\ManufacturerMapping::class,
        \App\Console\Commands\RemovePreviewableFile::class,
        \App\Console\Commands\SiteAgreementRemapping::class,
        \App\Console\Commands\UtilityProviderZipMapping::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();
        $schedule->command('remove-previewable-file')
                 ->everyMinute();
    }
}
