<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

class StorageController extends Controller
{
    public function puts(Request $request){
        if($request->has('dk')){
            Storage::disk($request->input('dk'))->put('file.txt','yes');
        }else{
            Storage::put('file.txt','yes');
        }
        
        return response('OK');
    }
    public function gets(Request $request){
        $content=Storage::get('file.txt');
        return response($content,200);

    }
    public function has(){
        $content='';
        if(Storage::has('fil.txt')){
            $content='yes,file exists';
        }else{
            $content="no,file not exists";
        }
        return response($content,200);
    }
    public function property(){
        $size=0;
        $lastModified='';
        if(Storage::has('file.txt')){
            $size=Storage::size('file.txt');
            $lastModified=Storage::lastModified('file.txt');
        }
        return response('size: '.$size.'<br/>'.'lastm: '.$lastModified,200);
    }
    public function  cpAndMv(){
        Storage::copy('file.txt','last.txt');
        Storage::move('file.txt','last2.txt');
        return response('OK',200);
    }
    public function addTofile(){
        Storage::append('last.txt','hello last');
        Storage::prepend('last2.txt','hello last2');
        return response("Ok,",200);
    }
    public function delete(){
        /*Storage::delete('last.txt');*/
        Storage::delete(['last.txt','last2.txt']);
        return response('OK Done',200);
    }
    public function other(){
        //$content=$directories = Storage::directories('./');
        // Recursive...
       $content= Storage::allDirectories('/app');
       //Storage::makeDirectory($directory);
       //Storage::deleteDirectory($directory);
        return response($content);

    }
}