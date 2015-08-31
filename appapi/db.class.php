<?php

class DB{
	protected static $_instance;
	protected static  $conn;
	protected $db=array(
		'host'=>'localhost',
		'user'=>'root',
		'db'=>'mydata',
		'password'=>'526114',
		'encoding'=>'utf8'
	);
	protected  function __construct(){
		if(!$this->connect()){
                        throw new Exception();	
			return false;
		}
	}
	public static function getInstance(){
		if(self::$_instance instanceof self){
			return self::$_instance;
		}else{
			self::$_instance=new self();
			return self::$_instance;
		}

	}
	public function connect(){
		if(!self::$conn){
			self::$conn=mysqli_connect($this->db['host'],$this->db['user'],$this->db['password']);
			if(!self::$conn){
				throw new Exception();
				return false;
			}
			mysqli_select_db(self::$conn,$this->db['db']);
			mysqli_query(self::$conn,"set names {$this->db['encoding']}");
		}
		return self::$conn;
	}
}






?>
