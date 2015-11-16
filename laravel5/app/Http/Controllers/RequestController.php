<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getParamFromUrl(Request $request,$id){
            return 'id is :'.$id;
    }
    public function url(Request $request){
            if($request->is('request/url')){
                return  'path: '.$request->path().'<br/>url: '.
                $request->url().'<br/>is Method:'.
                $request->isMethod('get').'<br/> Method: '.
                $request->Method();
            }
    }
    public function inputValue(Request $request){
            $return='';
            if($request->has('name')){
                $return.='name: '.$request->input('name').'<br/>';
            }
            if($request->has('age')){
                $return.='age: '.$request->input('age').'<br/>';
            }
            //$return=$request->all(); get input value

            return $return;
            //redirect('form')->withInput();
            //redirect('form')->withInput($request->input('name'));
    }
    public function session(Request $request){
            $request->flash(); //save all input data as form of session
            $request->flashOnly('name');//save only name of input value as form session;
            $request->flashExcept('age');//save all but age of input value as form session;
            $request->old('name');//pull input data out of session

    }
    public function cookie(Request $request){
            $request->cookie('name');//get cookie value from request
            cookie('name','value',$expireTime);//gloal cookie helper for app to create a cookie
            $response=new Illuminate\Http\Response;//create a response instance 
            $response->withCookie(cookie('name','value'));//attach a cookie to a response instanc;
    }
    public function file(Request $request){
            $request->hasFile('myfile');////checking if the file is present 
            $request->file('myfile')->isValid();///verify  there were no problems uploading the file:
            $request->file('myfile')->move($destPath,$fileName);//move and save temp file 
    }
}
