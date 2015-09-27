<?php

define('ROOT',__DIR__);
require_once("./common/functions.php");
require_once('./config.php');
if(empty($_GET)){
	$_GET['c']=$config['DEFAULT_CONTROLLER'];
	$_GET['a']=$config['DEFAULT_C_ACTION'];
}
$_GET['c']=add_slashes($_GET['c']);
$_GET['a']=add_slashes($_GET['a']);
C($_GET['c'],$_GET['a']);






?>