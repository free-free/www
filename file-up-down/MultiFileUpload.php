<?php
require_once "./common.php";
require_once "MultiFileUploadFunc.php";
if(isset($_FILES)&&!empty($_FILES)){
	$files_info=getFileFormatInfo($_FILES);
	$path=array(
		'jpg'=>'./data/image/jpg',
		'jpeg'=>'./data/image/jpeg',
		'gif'=>'./data/image/gif',
		'png'=>'./data/image/png'
		);
	$error_info=array();
	foreach ($files_info as $key => $value) {
		$error_info=saveUploadFile($value,$path);
		if($error_info['code']!=0){
			echo $value['name'].'=>';
			echo json_encode($error_info);
			echo '<br/>';
		}
	}
}

?>