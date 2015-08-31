<?php

class UploadFile{
	protected $file_max_size=1024*1024;
	protected $files_info=array();
	protected $allow_file_type=array();
	protected $error_code=0;
	protected $image_check_enable=true;
	protected $error_info=array();
	protected $image_check_type=array(
		'jpg','png','gif','jpeg'
		);
	protected $file_save_path=array(
		'jpg'=>'./data/image/jpg',
		'jpeg'=>'./data/image/jpeg',
		'png'=>'./data/image/png',
		'gif'=>'./data/image/gif'
		);
	protected $error_case=array(
		0=>'Upload successfully',
		1=>'The numbers of uploaded file is beyond UPLOAD_MAX_FILESIZE',
		2=>'The size of  file is beyond MAX_FILE_SIZE',
		3=>'Only a little part of file be uploaded',
		4=>'Not select file',
		6=>'Can\'t find tmp directory',
		7=>'Writing file failed',
		8=>'The uploading process is disturbed by PHP extension',
		9=>'Has a form error',
		10=>'The size of file is beyond administer defined size',
		11=>'The type of file is not support',
		12=>'The file is not uploaded through HTTP protocol',
		13=>'Image is not correct',
		14=>'Can\' make directory',
		15=>'Moving tmp  file failed'
		);
	/*
	*
	*
	*
	*/
	public function __construct($maxsize=1048576,$imagecheck=true,$path=array()){
		if(!isset($_FILES)||empty($_FILES)){
			$this->error_code=9;
			$this->formatErrorInfo($this->error_code);
			return false;
		}
		$this->formatFileInfo();
		if(!empty($path)){
			$this->file_save_path=$path;
		}
		$this->allow_file_type=array_keys($this->file_save_path);
		$this->file_max_size=$maxsize;
		$this->image_check_enable=$imagecheck;
	}
	/*
	*
	*
	*
	*/
	public function formatErrorInfo($code,$data=''){
		$this->error_info[]=array(
			'code'=>$this->error_code,
			'msg'=>$this->error_case[$this->error_code],
			'data'=>$data
			);
		return true;
	}
	/*
	*
	*
	*
	*/
	public function formatFileInfo(){
		$i=0;
		foreach ($_FILES as $k1 => $v1) {
			if(is_string($v1['name'])){
				$this->files_info[$i]=$v1;
				$i++;
			}elseif(is_array($v1['name'])){
				foreach ($v1['name'] as $k2 => $v2) {
					$this->files_info[$i]['name']=$v1['name'][$i];
					$this->files_info[$i]['type']=$v1['type'][$i];
					$this->files_info[$i]['tmp_name']=$v1['tmp_name'][$i];
					$this->files_info[$i]['error']=$v1['error'][$i];
					$this->files_info[$i]['size']=$v1['size'][$i];
					$i++;
				}
			}
		}
		return true;
	}
	/*
	*
	*
	*
	*/
	public function addPath($ext,$path){
		$this->file_save_path[$ext]=$path;
		if(!in_array($ext,$this->allow_file_type)){
			array_push($this->allow_file_type, $ext);
		}
		return $path;
	}
	/*
	*
	*
	*
	*/
	public function resetPath($path){
		$this->file_save_path=$path;
		$this->allow_file_type=array_keys($this->file_save_path);
		return $path;
	}
	/*
	*
	*
	*
	*/
	protected function checkSize($filesize){
		if($filesize>$this->file_max_size){
			$this->error_code=10;
			$this->formatErrorInfo($this->error_code);
			return false;
		}
		return true;
	}
	protected function checkType($filetype){
		if(!in_array($filetype, $this->allow_file_type)){
			$this->error_code=11;
			$this->formatErrorInfo($this->error_code);
			return false;
		}
		return true;
	}
	protected function checkProtocol($filename){
		if(!is_uploaded_file($filename)){
			$this->error_code=12;
			$this->formatErrorInfo($this->error_code);
			return false;
		}
		return true;
	}
	protected function checkImage($filename){
		if($this->image_check_enable){
			if(!getimagesize($filename)){
				$this->error_code=13;
				$this->formatErrorInfo($this->error_code);
				return false;
			}
		}
		return true;
	}

	protected function checkSaveDir($filedir){
		if(!file_exists($filedir)){
			if(!mkdir($filedir,0775,true)){
				$this->error_code=14;
				$this->formatErrorInfo($this->error_code);
				return false;
			}
		}
		return true;
	}
	public function upload(){
			$file_type='';
			$file_name='';
			$file_path='';
			foreach ($this->files_info as $index => $file) {
				if(!$this->checkSize($file['size'])){
					//return false;
					continue;
				}
				$file_type=pathinfo($file['name'],PATHINFO_EXTENSION);
				if(!$this->checkType($file_type)){
					//return false;
					continue;
				}
				$file_path=$this->file_save_path[$file_type];
				if(!$this->checkProtocol($file['tmp_name'])){
					//return false;
					continue;
				}
				if(!$this->checkImage($file['tmp_name'])){
					//return false;
					continue;
				}
				if(!$this->checkSaveDir($file_path)){
					//return false;
					continue;
				}
				$file_name=md5(uniqid(microtime(true),true));
				if(!@move_uploaded_file($file['tmp_name'],$file_path.'/'.$file_name.'.'.$file_type)){
					$this->error_code=15;
					$this->formatErrorInfo($this->error_code);
					//return false;
					continue;
				}else{
					$this->error_code=0;
					$this->formatErrorInfo($this->error_code);
					//return true;
					continue;
				}
			}
			$this->showError();
	}
	protected function showError(){
		header("Content-Type:application/json");
		echo  json_encode($this->error_info);
	}

}

?>