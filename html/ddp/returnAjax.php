<?php

/* datapick*/
/*if(isset($_POST)&&!empty($_POST['verbscode'])){
	$back=array(
		'code'=>'',
		'msg'=>'',
		'data'=>array()
		);
	$verbs=$_POST['verbscode'];
	switch ($verbs) {
		case '1':
			$back['code']=200;
			$back['msg']='clear data';
			break;
		case '2':
			$back['code']=200;
			$back['msg']='save data';
			break;
		case '3':
			$back['code']=200;
			$back['msg']='update data';
			break;
		default:
			# code...
			break;
	}
	echo json_encode($back);
}
*/

/*dataquery*/
if(isset($_POST)&&!empty($_POST)){
	echo json_encode([
		'code'=>200,
		'msg'=>'good',
		'data'=>$_POST
		]);
}

?>