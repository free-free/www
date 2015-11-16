<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ViewController extends Controller
{
	/*
		view files are saved in resources/views	
		视图可以被嵌套保存在resoureces/views目录的子目录中，
		"."号被用来引用嵌套的视图。例如，可以通过下面语句引用resoureces/views/admin/profile.php这个视图：
				return view('admin.profile', $data);
    */	


   public function basicView(){
   	/*
		you can use view helper function
		当不带参数的view辅助方法被调用时，
		会返回一个Illuminate\Contracts\View\Factory实例，
		通过这个实例你可以调用视图工厂（View Factory）的所有方法。
   	*/
		/*1. make a view instance*/
		//view()->exists('responseview');//check if view file exists or nt
		/*if(view()->exists('responseview')){ 
			return view('responseview',['name'=>'huangbiao']);
		}*/


		/*2. pass a parameter into view file*/
		/*view('responseview',['name'=>'hello']);*/
		/*return view('responseview')->with('name','blade');*/

		/*3. share  data with other views
			有时候，你可能需要共享一份数据给所有的视图，
			你应该使用视图工厂（View Factory）的share方法。
			通常，我们在服务提供者的boot方法中调用share方法来完成注册。
			如果需要同时共享多份数据，你可以将所有对share方法的调用放在一个
			服务提供者中（AppServiceProvider或者其他），或者单独的为每个需要共享的数据建立一个服务提供者。
		*/

   		/*4. view component
			视图组件是视图被渲染时被调用的闭包或者类方法。
			你可以通过视图组件将某些数据跟视图绑定到一起，
			这样数据就会在视图被渲染的时候自动加载。
			视图组件可以帮助你将这一功能的实现逻辑组织到同一个地方。
   		*/


		/*5. view creator
			视图创建者（View creators）跟视图组件几乎完全一样，
			不同的是视图创建者是在视图实例化之后立即执行，
			而视图组件在视图被渲染的时候才会执行。注册一个视图创建者可以使用creator方法：
		*/

   }
   public function blade(){
   		return view('child');
   }
   
}
