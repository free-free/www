<?php
function C($c_name,$c_method='index'){
	require_once(ROOT.'/libs/controller/'.ucwords($c_name).'Controller.class.php');
	eval('$obj=new '.ucwords($c_name).'Controller();$obj->'.$c_method.'();');
	return $obj;
}

function M($m_name){
	require_once(ROOT.'/libs/model/'.ucwords($m_name).'Model.class.php');
	eval('$obj=new '.ucwords($m_name).'Model();');
	return $obj;
}

function V($v_name){
	require_once(ROOT.'/libs/view/'.ucwords($v_name).'View.class.php');
	eval('$obj=new '.ucwords($v_name).'View();');
	return $obj;
}

function add_slashes($str){
	return !get_magic_quotes_gpc()?addslashes($str):$str;
}








?>