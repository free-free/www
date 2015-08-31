<?php
class Cache{
	private $cache_path='';
	private $ext='txt';

	/*
	*@param  string $name     //cache data name
	*@param  string $action   //cache action ,include  'set','get','delete'
	*@param  string $value    //cache data value
	*@param  int    $expire   //cache outdate time , unit second
	*@return boolean
	*/
	public function cacheData($name,$action,$value='',$expire=0){
		$cache_file_name=$this->cache_path.$name.'.'.$this->ext;
		switch(strtolower($action)){
			case 'set':
				if(!is_numeric($expire)){
					$expire=0;
				}elseif(!is_int($expire)){
					$expire=ceil($expire);
				}
				return empty($value)?false:file_put_contents($cache_file_name,$expire.':::'.$value);
			case 'get':
				$expire=0;
				if(is_file($cache_file_name)){
					$content=file_get_contents($cache_file_name);
					$explode_array=explode(':::',$content);
					$expire=$explode_array[0];
					if(filemtime($cache_file_name)+$expire<time()){
						unlink($cache_file_name);
						return false;
					}
					return $explode_array[1];
				}
				return false;
			case 'delete':
				return !is_file($cache_file_name)?false:unlink($cache_file_name);
			default:
				#
				break;
		}	
	}
	/*
	*
	*@param   string $path //new cache path
	*@return  boolean   //when set new cache path successfully,return true or false
	*
	*
	*/
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
		$path=dirname(__FILE__).'/cache/';
		if(!file_exists($path)){
			if(!mkdir($path,0775,true)){
				return false;
			}
		}	
		$this->cache_path=$path;
		return true;
	}
}

	



?>
