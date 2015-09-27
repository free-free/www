<?php

namespace IMooc;
class Register{
	private static $rgs_obj=array();
	public static function registe($obj,$alias){
		if($obj){
			self::$rgs_obj[$alias]=$obj;
			return $obj;
		}
		return false;
	}
	public static function unregiste($alias){
		if(array_key_exists($alias,self::$rgs_obj)){
			unset(self::$rgs_obj[$alias]);
			return true;
		}
		return false;
	}
 	public static function getObj($alias){
		if(array_key_exists($alias,self::$rgs_obj)){
			return self::$rgs_obj[$alias];
		}
		return false;
	}
}









?>
