<?php

namespace Home\Controller;
use   Think\Controller;


class EmptyController extends Controller{
	 public function index(){
	 	$this->controllerName(CONTROLLER_NAME);
	 	echo 'id:'.I('id');
	 }
	 public function controllerName($name){
	 	echo 'controller name :'.$name;
	 }
	 public function _empty($name){
	 		echo 'action name :'.$name;
	 }
}





?>