<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Mail;
use App\Models\Maillog;
use Auth;

class SQSTest extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    
    /**
     * Execute the job.
     * 
     * @return void
     */
    public function handle()
    {
        sleep(100);
        $subject = "Hi, this is triggered by Amazon SQS";
        $message = "This job was executed with AWS SQS service";
        
        Mail::raw($message, function ($m) use ($subject) {
            $m->from(env('INFO_EMAIL'));
            $m->to(env('QUEUE_RECEIVER_EMAIL'), env('QUEUE_RECEIVER_NAME'))
                    ->subject($subject);
        });
    }
}
