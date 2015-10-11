<?php
namespace Home\Controller;
use Think\Controller;
class RouterController extends Controller{
	public function index($id=''){
		echo 'This is Router Controller';
		echo '<br/>'.$id;
		echo '<br/>'.I('get.controller');
		echo '<br/>'.I('get.method');
		/*

			the thinkphp's router works under the condition of 
			'URL_ROUTER_ON' =>true be setting. 
		*/
	}
}






?>