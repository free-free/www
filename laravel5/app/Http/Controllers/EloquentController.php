<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Eloquent as Elo;
use App\Phone ;

class EloquentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function get(){
         $return='';

        /*$users=Elo::all();*/

        /*$users=Elo::where('id','>',1)->orderBy('id','asc')->take(2)->get();
        foreach ($users as $user) {
            $return.='id:'.$user->id."<br/>";
            $return.= 'name:'.$user->user_name.'<br/>';
            $return.='email:'.$user->email.'<br/>';
        }
     
        */


        Elo::chunk(1,function($users) use(&$return ){
            foreach ($users as $user) {
                $return.='id:'.$user->id."<br/>";
                $return.= 'name:'.$user->user_name.'<br/>';
                $return.='email:'.$user->email.'<br/>';     
            }
        });


        /*
        $user=Elo::find(1);
        $user=Elo::where('id','>',1)->first();
        $user=Elo::findOrFail(5);
        $user=Elo::where('id','>',4)->firstOrFail();
        $return.=$user;
        */
        
        /*
        $count=Elo::count();
        $return.=$count;
        $max=Elo::max('id');
        $return.=$max;
        */
        return  response($return,200);
    }

    public function insert(Request $request){
        $return='';
        //method1:
             
        $tb=new Elo;
        if($request->has('uname')){
            $tb->user_name=$request->input('uname');
        }else{
            $return='error';
        }
        if($request->has('email')){
            $tb->email=$request->input('email');
            $tb->create_time=time();
            $return=(string)$tb->save();

        }else{
            $return ='error';
        }
        
        //method2:
        /*return=(string)Elo::create(['user_name'=>"hello 10",'email'=>'21ygfes@132.com']);*/
        return response($return,200);
        //method3:
        /*
        Elo::firstOrCreate(['user_name'=>'huangiao']);
        //
        $tb=Elo::firstOrNew(['user_name'=>'fefe']);
        $tb->save();

        */
    }

    public function update(){
        $return='';
        //method 1:
        /*$tb=Elo::find(5);
        $tb->user_name='fesfs';
        $tb->email='19912323@173.com';
        $return=(string)$tb->save();
        */

        //method2:
        $return=Elo::where('id','=',5)
            ->update(['user_name'=>'I am Five','email'=>'1733167321@qq.com']);

        return response($return,200);
    }
    public function delete($id){
        $return ='';

        //method1 :
        /*$tb=Elo::find($id);
        $return=(string)$tb->delete();*/


        //method2: Deleting An Existing Model By Primary Key
        /*$return=(string)Elo::destroy($id);
        $return=(string)Elo::destroy([1,22,3]);
        */

        //method3:Deleting Models By Query
        $return=(string)Elo::where('id','>',$id)->delete();
        response($return,200);
    }

    public function scope($id=0){
        $return='';
       /* $users=Elo::Hot()->get();
        foreach ($users as  $user) {
            $return.='user id:'.$user->id.'<br/>';
            $return.='user name:'.$user->user_name.'<br/>';
            $return.='user mail:'.$user->email.'<br/>';
        }*/

        $users=Elo::Cold($id)->get();
        foreach ($users as  $user) {
            $return.='user id:'.$user->id.'<br/>';
            $return.='user name:'.$user->user_name.'<br/>';
            $return.='user mail:'.$user->email.'<br/>';
        }
        return response($return,200);
    }
    public function oneToOne($id=1){
        $return='';
        /*$p=Elo::find($id)->phone;
        $return.='id:'.$p->id.'<br/>';
        $return.='phone_number'.$p->number.'<br/>';*/
        $user=Phone::find($id)->user;
        $return.='user id:'.$user->id."<br/>";
        $return.='user name:'.$user->user_name.'<br/>';
        $return.='user email:'.$user->email.'<br/>';
        return response($return,200);
    }
    public function oneToMany($id=1){
        $return='';
        /*$ps=Elo::find($id)->phones;
        foreach ($ps as $key => $p) {
            $return.='phone id:'.$p->id.'<br/>';
            $return.='phone uid:'.$p->user_id.'<br/>';
            $return.='phone number'.$p->number.'<br/>';
        }*/
        $user=Phone::find($id)->users;
        $return.='user id:'.$user->id."<br/>";
        $return.='user name:'.$user->user_name.'<br/>';
        $return.='user email:'.$user->email.'<br/>';
        return response($return,200);
    }
    public function toJson(){
        $return='';
        $return.=Elo::all()->toJson();
        return response($return,200);
    }
}
