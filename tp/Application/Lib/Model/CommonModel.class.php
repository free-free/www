<?php
/*
*
*this file a public model file
*/
class CommonModel extends Model{
	public function pwd_convert($password){
		return md5($password);
	}
}
?>