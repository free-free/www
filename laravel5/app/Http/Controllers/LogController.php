<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Log;
class LogController extends Controller
{

    public function log()
    {
        /*
        Log::emergency($error);
        Log::alert($error);
        Log::critical($error);
        Log::error($error);
        Log::warning($error);
        Log::notice($error);
        Log::info($error);
        Log::debug($error);
        */
        Log::info('HELLO,HOW ARE YOU?');
        Log::error('Something wrong,do you know?');
        Log::info('User failed to login.', ['id' =>12]);
        return response('HELLO,HOW ARE YOU?');
    }
}
