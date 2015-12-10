<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Event;
use Log;
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        /*
        $events->listen('event.name', function ($foo, $bar) {
        
        });
        $events->listen('event.*', function (array $data) {
                
        });
        Event::listen('event.*',function(){
    
        });
        */
        /* just before sending mail messages*/
        /*$events->listen('mailer.sending',function($message){
                Log::info('send a mail');
        });*/
    }
}
