<?php
require_once('../libs/Smarty.class.php');
$sm=new Smarty();
$sm->left_delimiter='{';
$sm->right_delimiter='}';
$sm->template_dir='../template/';
$sm->compile_dir='../compile/';
$sm->cache_dir='../cache/';
$sm->caching=false;
$sm->cache_lifetime=0;



$sm->assign('value','hello world');
$sm->assign('time',time());
$sm->assign('num',123);
function printa($arr){
	print_r($arr);
}
$sm->registerPlugin('function','printf','printa');
$data=array(array('name'=>'huangbiao','age'=>18),array('name'=>'xiaoming','age'=>19));
$sm->assign('data',$data);
$sm->display('index.html');









?>
