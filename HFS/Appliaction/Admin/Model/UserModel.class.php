<?php
namespace  Admin\Model;
use Think\Model;
class UserModel extends Model{
	protected $patchValidate = true;
	protected $_validate = array(
		  array('code','require','验证码必须！'),

		  array("oldpass",'require','密码必须'),

		  array("rpassword","password","两次密码输入不一致",3,'confirm'),

		  array("userName","require","账号不能为空"),

		  array("userName",'','帐号已经存在！',0,'unique',1),

          array("userName","checkLength","账号长度在3-8之间",0,"callback",3,array(3,8)),

          array("password","require","密码不能为空"),

          array('userPower',array(0,1,2),'权限必须选择!',2,'in',3),

          array("truename",'require','真实姓名不能为空'),

          array("truename",'','姓名已存在！',0,'unique',1),

          array("studentID",'require','学号不能为空'),

          array("studentID",'/^[0-9]{8,10}$/','学号只能是8-12位数字',0,'regex',3),
	);
	protected function checkLength($str,$min,$max){
		 preg_match_all("/./u", $str,$match);
		 $length=count($match[0]);
         if($length>$max||$length<$min){
         	return false;
         }else{
         	return true;
         }
         
	}
}