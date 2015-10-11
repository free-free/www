<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	protected $tablePrefix='';
	protected $tableName='';
	protected $trueTableName='';
	protected $dbName='';
	protected $connection=array(
		'db_type'=>'mysql',
		'db_host'=>'localhost',
		'db_name'=>'thinkphp',
		'db_user'=>'root',
		'db_pwd'=>'526114',
		'db_port'=>'3306',
		'db_prefix'=>'think_',
		'db_charset'=>'utf8'
		);
	//or $connection='mysql://root:526112@localhost/thinkphp#utf8';
	protected $updateFields='user_name,email,password';
	protected $insertFields='user_name,email,password';
	
}








?>