<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events\SomeEvent;
use Event;

class EventController extends Controller
{
    public function fireEvent(){
        Event::fire(new SomeEvent);
        //event(new SomeEvent);
        return response('OK',200);
    }
}
