<?php

namespace IMooc;

Interface Cache{
	public function get($key);
	public function set($key,$value);
	public function del($key);
}

class  RedisCache implements Cache{

	public function get($key){
	}
	public function set($key,$value){

	}
	public function del($key){

	}
}
class FileCache implements Cache{
	public function set($key,$value){

	}
	public function get($key){

	}
	public function del($key){

	}
}







?>
