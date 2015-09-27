<?php


namespace IMooc;


class SingleObject{
	protected static $__instance;
	protected static $__db=array(
		'host'=>'localhost',
		'user'=>'root',
		'password'=>'526114',
		'db_name'=>'mydata',
		'encoding'=>'utf8'
	);
	public $con;
	protected function __construct(){
		$this->connect();	
	}
	public static function getInstance(){
		if(self::$__instance instanceof self){
			return self::$__instance;
		}else{
			self::$__instance=new self();
			return self::$__instance;
		}
	}
	public function connect(){
		$this->con=mysqli_connect(self::$__db['host'],
				self::$__db['user'],
				self::$__db['password'],
				self::$__db['db_name']	
		);
		return $this->con?$this->con:false;
	}
}
