<?php
//error_reporting(E_ALL);
if(isset($_FILES)&&!empty($_FILES)){
	$file_info=$_FILES['myfile'];
	$file_save_path=array(
		'jpg'=>"./data/image/jpg",
		'jpeg'=>'./data/image/jpeg',
		'gif'=>'./data/image/gif',
		'png'=>'./data/image/png'
		);
	/*file type that being allowed to upload*/
	$file_allow_type=array_keys($file_save_path);
	/*image type*/
	$image_type=array('jpg','jpeg','png','gif');
	/*image check flag */
	$image_check=true;
	/*file upload max file size*/
	$file_max_size=1024*1024;
	/* file save information */
	$file_save_ext=pathinfo($file_info['name'],PATHINFO_EXTENSION);
	$file_save_name=md5(uniqid(microtime(true),true));
	$file_save_path=in_array($file_save_ext,$file_allow_type)?$file_save_path[$file_save_ext]:'';
	/*file error processing*/
	$file_upload_error_info=array(
		1=>'The numbers of file you are uploading too many',
		2=>'The size of your file is too large',
		3=>'Only a little part of your file be uploaded',
		4=>'Not select your file',
		6=>'Can\'t find tmp directory',
		7=>'Writing file failed',
		8=>'The uploading process be distured by PHP extension'
		);
	$file_upload_error_code=$file_info['error'];
	$file_check_error_info=array(
		0=>'upload successful',
		1=>'file too large',
		2=>'file type not allowed',
		3=>'file is\'t uploaded through http protocol',
		4=>'file is not really image',
		5=>'can\'t create dir',
		6=>'move uploaded file failed!'
		);
	$file_check_error_code=0;


	if($file_upload_error_code==0){
		print_r($file_info);
		if($file_info['size']>$file_max_size){
			$file_check_error_code=1;
			echo json_encode(array(
				'code'=>$file_check_error_code,
				'msg'=>$file_check_error_info[$file_check_error_code],
				'data'=>''
				));
			return ;
		}
		if(!in_array($file_save_ext, $file_allow_type)){
			$file_check_error_code=2;
			echo json_encode(array(
				'code'=>$file_check_error_code,
				'msg'=>$file_check_error_info[$file_check_error_code],
				'data'=>''
				));
			return ;
		}
		if(!is_uploaded_file($file_info['tmp_name'])){
			$file_check_error_code=3;
			echo json_encode(array(
				'code'=>$file_check_error_code,
				'msg'=>$file_check_error_info[$file_check_error_code],
				'data'=>''
				));
			return ;
		}
		if($image_check&&in_array($file_save_ext,$image_type)){
			if(!getimagesize($file_info['tmp_name'])){
				$file_check_error_code=4;
				echo json_encode(array(
				'code'=>$file_check_error_code,
				'msg'=>$file_check_error_info[$file_check_error_code],
				'data'=>''
				));
				return ;
			}
		}
		if(!file_exists($file_save_path)){
			if(!mkdir($file_save_path,0775,true)){
				$file_check_error_code=5;
				echo json_encode(array(
				'code'=>$file_check_error_code,
				'msg'=>$file_check_error_info[$file_check_error_code],
				'data'=>''
				));
				return ;
			}
		}
		if(!@move_uploaded_file($file_info['tmp_name'],$file_save_path.'/'.$file_save_name.'.'.$file_save_ext)){
			$file_check_error_code=6;
			echo json_encode(array(
				'code'=>$file_check_error_code,
				'msg'=>$file_check_error_info[$file_check_error_code],
				'data'=>''
				));
			return;	
		}else{
			$file_check_error_code=0;
			echo json_encode(array(
				'code'=>$file_check_error_code,
				'msg'=>$file_check_error_info[$file_check_error_code],
				'data'=>''
				));
			return ;
		}
	}else{
		echo $file_upload_error_info[$file_upload_error_code];
		return;
	}

}else{
	echo "has a form error";
	return ;
}

?>
