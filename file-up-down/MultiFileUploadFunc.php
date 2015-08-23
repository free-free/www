<?php

require_once "./common.php";
/*
 *
 *@param  array $files
 *return array $files_info
 *
 */
function getFileFormatInfo($files){
	$files_info=array();
	$i=0;
	foreach ($files as $k1 => $v1) {
		if(is_string($v1['name'])){
			$files_info[$i]=$v1;
			$i++;
		}elseif(is_array($v1['name'])){
			foreach ($v1 as $k2 => $v2) {
				$files_info[$i]['name']=$v1['name'][$i];
				$files_info[$i]['type']=$v1['type'][$i];
				$files_info[$i]['tmp_name']=$v1['tmp_name'][$i];
				$files_info[$i]['error']=$v1['error'][$i];
				$files_info[$i]['size']=$v1['size'][$i]; 
				$i++;
			}
		}
	}
	return $files_info;
}
/*
*@param array $file
*@param array $path
*@param int $max_size=1024*10
*@param booleam $imagecheck=true
*return array 
*/
function saveUploadFile($file,$path,$maxsize=1024*1024,$imagecheck=true){
	$file_info=$file;
	$file_path=$path;
	$file_max_size=$maxsize;
	$image_check_enable=$imagecheck;

	/*file type*/
	$file_allow_type=array_keys($file_path);
	/*file extension*/
	$file_ext=common_getFileExt($file_info['name']);
	/*image check type*/
	$image_check_type=array(
		'gif',
		'png',
		'jpg',
		'jpeg'
		);
	/*error code*/
	$error_code=0;
	/*error information array*/
	$error_info=array(
		0=>'Upload successfully',
		1=>'The numbers of file  you uploaded is too many',
		2=>'The size of your file is too large',
		3=>'Only a little part of your file be uploaded',
		4=>'Not select your file',
		6=>'Can\'t find tmp directory',
		7=>'Write file failed',
		8=>'The uploading process be distured by PHP extension',
		9=>'The size of your file is beyond administor defined maxsize',
		10=>'The type of your file is not allowed',
		11=>'Please use http to upload file',
		12=>'Not Really image',
		13=>'Can\'t create file save directory',
		14=>'Moving tmp file failed'
		);
	if($file_info['error']==0){

		if($file_info['size']>$file_max_size){
			$error_code=9;
			return array(
				'code'=>$error_code,
				'msg'=>$error_info[$error_code],
				'data'=>''
				);
		}
		if(!in_array($file_ext, $file_allow_type)){
			$error_code=10;
			return array(
				'code'=>$error_code,
				'msg'=>$error_info[$error_code],
				'data'=>''
				);
		}
		if(!is_uploaded_file($file_info['tmp_name'])){
			$error_code=11;
			return array(
				'code'=>$error_code,
				'msg'=>$error_info[$error_code],
				'data'=>''
				);
		}
		if($image_check_enable){
			if(!getimagesize($file_info['tmp_name'])){
				$error_code=12;
				return array(
					'code'=>$error_code,
					'msg'=>$error_info[$error_code],
					'data'=>''
					);
			}
		}
		if(!file_exists($file_path[$file_ext])){
			if(!mkdir($file_path[$file_ext],0775,true)){
				$error_code=13;
				return array(
					'code'=>$error_code,
					'msg'=>$error_info[$error_code],
					'data'=>''
					);
			}
		}
		$file_save_path=$file_path[$file_ext].'/'.common_createUniqueName().'.'.$file_ext;
		if(!@move_uploaded_file($file_info['tmp_name'],$file_save_path)){
			$error_code=14;
			return array(
				'code'=>$error_code,
				'msg'=>$error_info[$error_code],
				'data'=>''
				);
		}else{
			return array(
				'code'=>$error_code,
				'msg'=>$error_info[$error_code],
				'data'=>''
				);
		}
	}else{
		$error_code=$file_info['error'];
		return array(
			'code'=>$error_code,
			'msg'=>$error_info[$error_code],
			'data'=>''
			);
	}
}

?>