<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*$schedule->command('inspire')
                 ->hourly();*/
        $schedule->call(function(){
            DB::table('rg')->insert(['name'=>'huangbiao']);
        })->hourly();
       /* $schedule->call(function(){
                DB::table('user')->insert(['name'=>'hunagbiao']);
        })->hourly();
        //operating system commands
        $schedule->exec('ls -al')->daily();
        $schedule->exec('ls -alh')->monthly()->when(function(){
            return true;
        });
        //Preventing Task Overlaps
        //scheduled tasks will be run even if the previous 
        //instance of the task is still running. To prevent this, you may use the withoutOverlapping method:
        $schedule->command('emails:send')->hourly()->withouOverlapping();

        //Task output
        $schedule->command('email:send')->hourly()->sendOutputTo($filepath);
        $schedule->command('email:send')->monthly()->appendOutputTo($filepath);
        

        //Task Hooks
        //Using the before and after methods, 
        //you may specify code to be executed before and after the scheduled task is complete:
        $schedule->command('email:send')->dailyAt('12:00')->before(function(){
            //some code
        })->after(function(){
           //some code 
        });


        //Pingind URLs
        //Using the pingBefore and thenPing methods, 
        //the scheduler can automatically ping a given URL before or after a task is complete.
        //This method is useful for notifying an external service, 
        //such as Laravel Envoyer, that your scheduled task is commencing or complete:

        $schedule->command('email:send')->at('12:32')->pingBefore($url)->thenPing($url);

        */
        /*constraints
            ->cron('* * * * * *');  Run the task on a custom Cron schedule
            ->everyMinute();    Run the task every minute
            ->everyFiveMinutes();   Run the task every five minutes
            ->everyTenMinutes();    Run the task every ten minutes
            ->everyThirtyMinutes();     Run the task every thirty minutes
            ->hourly();     Run the task every hour
            ->daily();  Run the task every day at midnight
            ->dailyAt('13:00');     Run the task every day at 13:00
            ->twiceDaily(1, 13);    Run the task daily at 1:00 & 13:00
            ->weekly();     Run the task every week
            ->monthly();    Run the task every month
            ->yearly();     Run the task every year
            ->weekdays();   Limit the task to weekdays
            ->sundays();    Limit the task to Sunday
            ->mondays();    Limit the task to Monday
            ->tuesdays();   Limit the task to Tuesday
            ->wednesdays();     Limit the task to Wednesday
            ->thursdays();  Limit the task to Thursday
            ->fridays();    Limit the task to Friday
            ->saturdays();  Limit the task to Saturday
            ->when(Closure);    Limit the task based on a truth test
        */
    }
}
