<?php

namespace IMooc;
class Object{
	protected  $property=array();
	public static function test(){
		echo 'test Object';
	}
	public function index(){
		return $this->property;
	}
	public function __set($key,$value){
		$this->property[$key]=$value;
		return $this->property[$key];
	}
	public function  __get($key){
		return array_key_exists($key,$this->property)?$this->property[$key]:'no property exists';
	}
	public function  __call($func,$param){
		if(method_exists($this,$func)){
			return $this->$func($param);
		}else{
			echo 'method:',$func,'<br/>';
			echo 'params:','<br/>';
			print_r($param);
		}
	}
	public static function  __callStatic($func,$param){
		if(in_array($func,get_class_methods(__CLASS__))){
			return self::$func($param);
		}else{
			return 'no such method exists';
		}
	}
	public function __toString(){
		echo  __CLASS__;
	}
	public function __invoke($param){
		print_r($this->index());
	}
}
