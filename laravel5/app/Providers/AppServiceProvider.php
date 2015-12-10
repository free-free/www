<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Queue;
use Log;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //listen raw SQL operation event
        DB::listen(function($sql,$binding,$time){

        });
         /*
            The Queue::after method allows you to register a callback to be executed 
            when a queued job executes successfully. This callback is a great opportunity 
            to perform additional logging, queue a subsequent job, or increment statistics for a dashboard.
            For example, we may attach a callback to this event from the AppServiceProvider that is included with Laravel:
        */
        Queue::after(function ($connection, $job, $data) {
                Log::info("send a email at".time().':'.$connection.'--'.json_encode($job).'---'.json_encode($data));
        });
        Queue::failing(function($connection,$job,$data){
                Log::error('jobs:'.$job.' failed!');;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
