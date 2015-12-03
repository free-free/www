<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Crypt;
class DBController extends Controller
{
   public function select (){
        $users=DB::select('select * from laravel_user where id=:id',['id'=>1]);
        return response($users,200);
   }
   public function insert(){
        DB::insert('insert laravel_user(user_name,email) values(:name,:email)',['name'=>'hh','email'=>'hduai@31.com']);
   }
   public function update(){
        DB::update('update laravel_user set user_name=:name where id=:id',['name'=>'shabi','id'=>2]);

   }
   public function delete(){
        DB::delete('delete from laravel_user where id>:id',['id'=>12]);
        //DB::statement('drop table laravel_user');
        /*
        start transaction
        DB::transaction(function () {
                DB::table('users')->update(['votes' => 1]);
                DB::table('posts')->delete();
        });
        */
        /*
            using multiple connections,
            $users = DB::connection('foo')->select(...);
        */
   } 


   /*
    laravel query builder
   */
    public function queryBuilder(){

       //$user=DB::table('user')->get();
       /*$users=DB::table('user')->where('id','>',3)->first();
       $name=$users->user_name;*/
       //$email=DB::table('user')->where('id','>',2)->value('email');
       /*$back='';
       DB::table('user')->chunk(2,function($users) use (&$back) {
            foreach ($users as $key => $value) {
                $back.='id:'.$value->id;
                $back.='name:'.$value->user_name;
                $back.='email:'.$value->email.'<br/>';
            }
       });*/
      //$column_list=DB::table('user')->lists('user_name');
      //$maxid=DB::table('user')->max('id');
      //$total_user=DB::table('user')->count();
      //$back=DB::table('user')->select('user_name as name','email')->get();
      //$back=DB::table('user')->distinct()->get();
      /*$back=DB::table('user')
              ->select(DB::raw('count(*) as total,id'))
              ->where('id','>',2)
              ->groupBy('id')
              ->get();
      */
      /*$back = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
      */
      /*$back = DB::table('users')
            ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
            ->get();
      */
      /*
        $first = DB::table('users')
            ->whereNull('first_name');
        $users = DB::table('users')
            ->whereNull('last_name')
            ->union($first)
            ->get();
      */
      /*
        $users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->whereBetween('votes', [1, 100])
                    ->whereNotBetween('votes', [1, 100])
                    ->whereIn('id', [1, 2, 3])
                    ->whereNotIn('id', [1, 2, 3])
                    ->whereNull('updated_at')
                    ->whereNotNull('updated_at')
                    ->get();
        DB::table('users')
            ->where('name', '=', 'John')
            ->orWhere(function ($query) {
                $query->where('votes', '>', 100)
                      ->where('title', '<>', 'Admin');
            })
            ->get();====select * from users where name = 'John' or (votes > 100 and title <> 'Admin')
        
        DB::table('users')
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                      ->from('orders')
                      ->whereRaw('orders.user_id = users.id');
            })
            ->get();
          select * from users
          where exists (
                    select 1 from orders where orders.user_id = users.id
          )
      */
      /*
        $users = DB::table('users')
                ->orderBy('name', 'desc')
                ->get();
        $users = DB::table('users')
                ->groupBy('account_id')
                ->having('account_id', '>', 100)
                ->get();
        $users = DB::table('orders')
                ->select('department', DB::raw('SUM(price) as total_sales'))
                ->groupBy('department')
                ->havingRaw('SUM(price) > 2500')
                ->get();
        $users = DB::table('users')->skip(10)->take(5)->get();
      */
      /*
          DB::table('users')->insert([
               ['email' => 'taylor@example.com', 'votes' => 0],
               ['email' => 'dayle@example.com', 'votes' => 0]
          ]);
          $id = DB::table('users')->insertGetId(
              ['email' => 'john@example.com', 'votes' => 0]
          );
          DB::table('users')
            ->where('id', 1)
            ->update(['votes' => 1]);
          DB::table('users')->where('votes', '<', 100)->delete();
          DB::table('users')->truncate();

      */
        abort(404);
      $back='huangbiao526114';
      $back=Crypt::encrypt($back);
      $back=Crypt::decrypt($back);
      return response($back,200);
    }
}
