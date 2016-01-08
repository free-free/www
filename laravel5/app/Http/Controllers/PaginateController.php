<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Eloquent as Elo;
class PaginateController extends Controller
{
    public function create()
    {
        /* the instance of Illuminate\Pagination\LengthAwarePaginator*/
        $users=DB::table('user')->paginate(1);
        //$users=Elo::paginate(1);

        /*A simple paginator,only display previous page and next page
         the instance of  Illuminate\Pagination\Paginator
        */
        //$users=DB::table('user')->simplePaginate(1);

        /*customizing url*/
        //$users->setPath('page');

        /*Appending Query String To Pagination Links*/
        //you just using $users->appends(['name'=>'huango'])->render() in your blade view

        /*Appending fragment to Pagination Links*/
        //you just need using $users->fragment('hello')->render() in your view
        $page=$users->appends(['name'=>'huangbioa'])->fragment('hello')->render();
        return view('paginate',['users'=>$users,'page'=>$page]);
    }
}
