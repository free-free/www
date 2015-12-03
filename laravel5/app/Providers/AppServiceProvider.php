<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
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
