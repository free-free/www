<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
class SessionController extends Controller
{



    public function session_get(Request $request){
            //$request->session()->get('key');
            /*there is no session exists ,second argument will be return */
            //$request->session()->get('key','defautl value');
            /*$request->session()->get('ket',function(){
                return 'value';
            })*/


            /*use PHP global session() function retrive or store session value
            //retrive value
            $back=session('key');
            //store value
            session(['key'=>"value"]);
            */

             /*$back=$request->session()->all();*/

            /*
            determine if an item exists in session
            $request->session()->has('key');            
            */
            $back=$request->session()->get('name');
            $back.=strlen($back);
            return response($back);
    }
    public function session_store(Request $request){

        /*    $request->session()->put('name',Crypt::encrypt('huangbiao'));*/
        
         /*   //Retrieving And Deleting An Item
            $back=$request->session()->pull('name');
        */

        /*
            //Deleting Items From The Session
            $reqeust->session()->forget('key');
            $request->session()->flush();//delete all session data
        */
        
          /*  //Regenerating The Session ID
            if($request->session()->regenerate()){
                $back='yes';
            }else{
                $back='failed';
            }
         */
        /*
             //Sometimes you may wish to store items 
             //in the session only for the next request. You may do so using the flash method
             $request->session()->flash('status', 'Task was successful!');
        */
            return response($back);
    }
}
