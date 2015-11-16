<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo',function(){
	return 'foo';
});

Route::match(['post','get'],'/foo',function(){
	return 'post or get foo';
});

Route::any('/foo',function(){
	return 'foo any';
});

Route::get('/createurl',function(){
	return url('createurl');
});

/*router parameter*/
/*Route::get('user/{id}/{name?}',function($id,$name='hb'){
	return 'User id '.$id.'<br/>User name:'.$name;
});*/
/*router parameters regular express check*/
Route::get('database/{name}/{id}',function($name,$id){
	return 'Database Name:'.$name."<br/> Database id:".$id;
})->where(['name'=>'[a-zA-Z]+','id'=>'[0-9]+']);
/*named route*/
Route::get('user/{id}/profile',['as'=>'profile',function($id){
	return "user {$id}'s  profile<br/>";
}]);
Route::get('route',function(){
	return route('profile',['id'=>'14']);
});
//using route's name to for function ===>route('profile',['id'=>1]); 



/* Route groups
oute groups allow you to share route attributes, 
such as middleware or namespaces, 
across a large number of routes without needing to
define those attributes on each individual route. Shared attributes 
are specified in an array format as the first parameter to the Route::group method.
*/


/* 1.Route groups & middleware
 To assign middleware to all routes within a group,
you may use the middleware key in the group attribute array. 
Middleware will be executed in the order you define this array:*/
Route::group(['middleware'=>'auth'],function(){
	Route::get('login',function(){
			return 'admin login';
	});
	Route::get('editprofile',function(){
			return 'edit admin profile';
	});
});
/* 2.Route groups & namespaces
Another common use-case for route groups is assigning the same PHP
namespace to a group of controllers. You may use the namespace parameter 
in your group attribute array to specify the namespace for all controllers
 within the group:
*/
Route::group(['namespace' => 'Admin'], function()
{
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::group(['namespace' => 'User'], function()
    {
        // Controllers Within The "App\Http\Controllers\Admin\User" Namespace
    });
});


/*3.Route groups & Route prefix
The prefix group array attribute may be used to prefix each route in
 the group with a given URI. For example, you may want to prefix all 
 route URIs within the group with admin:
*/
Route::group(['prefix' => 'admin'], function () {
    Route::get('/users', function ()    {
        // Matches The "/admin/users" URL
        return 'admin/users';
    });
});

/**
*
*  Illuminate/Http/Request  instances 
*/
Route::get('/request/getpfu/{id}','RequestController@getParamFromUrl');
Route::get('request/url','RequestController@url');
Route::get('request/inputvalue','RequestController@inputValue');
Route::get('request/cookie','RequestController@cookie');
Route::get('request/session','RequestController@session');
Route::get('request/file','RequestController@file');
/**
 *
 * Illuminate\Http\Response instance
 *
 */
Route::get('response/br','ResponseController@basicResponse');
Route::get('response/otr','ResponseController@otherTypeResponse');
Route::get('response/redirect','ResponseController@redirect');
/**
 *
 * Illuminate\Contract\View\Factory
 *
 */
Route::get('view/bv','ViewController@basicView');
Route::get('view/blade','ViewController@blade');
/**
 *
 * Illuminate\Database\Eloquent\Model
 *
 */
Route::get('eloquent/index','EloquentController@index');
Route::get('eloquent/get','EloquentController@get');
Route::get('eloquent/insert','EloquentController@insert');
Route::get('eloquent/update','EloquentController@update');
Route::get('eloquent/delete/{id}','EloquentController@delete');
Route::get('eloquent/scope/{id?}','EloquentController@scope');
Route::get('eloquent/onetoone/{id}','EloquentController@oneToOne');
Route::get('eloquent/onetomany/{id}','EloquentController@oneToMany');
Route::get('eloquent/tojson','EloquentController@toJson');

/**
 *
 * Authentication routes
 *using laravel default auth/AuthController to authenticates users
 */
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('authlogin',['middleware'=>'auth',function(){
	return 'hello';
}]);

/**
 *
 * 
 *  self define AuthController to authenticates users;
 */
