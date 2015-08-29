<?php
class Cache{
	private $cache_path='';
	private $ext='txt';
	public function cacheData($name,$action,$value=''){
		$cache_file_name=$this->cache_path.$name.'.'.$this->ext;
		switch(strtolower($action)){
			case 'set':
				return empty($value)?false:file_put_contents($cache_file_name,$value);
			case 'get':
				return !is_file($cache_file_name)?false:file_get_contents($cache_file_name);
			case 'delete':
				return !is_file($cache_file_name)?false:unlink($cache_file_name);
			default:
				#
				break;
		}	
	}
	public function setCachePath($path){
		if(!empty($path)){
			if(!file_exists($path)){
				if(!mkdir($path,0775,true)){
					return false;	
				}
			}
			$this->cache_path=$path;
			return true;
		}
		
	}
	public function __construct(){
		$this->cache_path=dirname(__FILE__).'/cache/';
		if(!file_exists($this->cache_path)){
			if(!mkdir($this->cache_path,0775,true)){
				return false;
			}
		}	
		return true;
	}
}

	



?>
