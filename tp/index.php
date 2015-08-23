<?php


/*class  index {
	public function  __construct(){
		echo 'you are calling index controller<br/>';
	}
	public function index(){
		echo 'you are calling index method';
	}
}

$module=$_GET['m']?$_GET['m']:'index';
$action=$_GET['a']?$_GET['a']:'index';

$obj=new $module();
$obj->$action();*/

define("APP_DEBUG",true);
define("APP_NAME",'Application');
define("APP_PATH",'./Application/');
require("./ThinkPHP/ThinkPHP.php");


