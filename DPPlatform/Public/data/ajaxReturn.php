<?php

$return=array();
if(!empty($_POST)){
	$return=array(
		'msg'=>'',
		'code'=>400,
		'data'=>array(
			array('name'=>$_POST['q_type'],'address'=>$_POST['q_text']),
			array('name'=>'Xiaoming','address'=>'GuangDong')
			)
		);
	echo json_encode($return);
}else{
	$return=array(
		'msg'=>'there is no query',
		'code'=>401,
		'data'=>''
		);
	echo json_encode($return);
}










?>