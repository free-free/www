<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
class SendReminderEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        //
        $mailer->send('emails.reminder',['name'=>'john'],function($message){
            $message->to('19941222hb@gmail.com','shabi')->subject('hello john');
        });
        if($this->attempts()>4){
            $this->delete();
        }
    }
    /**
     * Handle a job failure.
     *
     * @return void
     */
    public function failed()
    {
        // Called when the job is failing...
    }

}
