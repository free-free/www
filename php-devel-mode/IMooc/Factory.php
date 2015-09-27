<?php



namespace IMooc;

class Factory{
	static function createDBObj(){
		$db=new \IMooc\Database();
		return $db;
	}

}









?>
