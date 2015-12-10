<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
class LocaleController extends Controller
{
    public  function localeSet($set){
        App::setLocale($set);
        return redirect('/');
    }
    public function localeGet(){
        //$return=trans('messages.welcom');
        App::setLocale('en');
        $return=trans('messages.back',['name'=>'huangbiao']);
        return  response($return);
    }
}
