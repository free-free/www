<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\SendReminderEmail;
use Mail;
class QueueController extends Controller
{

    public function sendRemindEmail(Request $request){
        //Illuminate\Foundation\Bus\DispatchesJobs dispatch() method
        //Illuminate\Bus\Queueable; onQueue() method,delay() method;


       //$this->dispatch(new SendReminderEmail);

        //specific a queue for jobsand delay the execution of a queued job.
        //onQueue(),delay() method provided by Queueable trait
        $jobs=(new SendReminderEmail())->onQueue('emails');//->delay(1);
        $this->dispatch($jobs);
        /*Mail::queue('emails.reminder',['name'=>'163'],function($m){
            $m->to('18281573692@163.com','163')->subject('hello 163');
        });*/
        return response('ok');
        //map HTTP request variables into jobs
        //method provided by DispatchJobs trait
        //the third argument used to fill any constructor parameters that are not available on the request:
        // $this->dispatchFrom('App\Jobs\ProcessOrder', $request,['id'=>12]);
    }    
}
