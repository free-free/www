<?php
    $mysqli = new mysqli('localhost','root','123456','nuclear_manage_system');
    //$mysqli = new mysqli('my0082097.xincache1.cn','my0082097','zx147369','my0082097');
    if (mysqli_connect_errno()){
	     die('Unable to connect!'). mysqli_connect_error();
    }
    $password="'".md5($_GET['pass'])."'";
    $user="'".$_GET['user']."'";
    $sql = "select * from think_user where userName=".$user."and password=".$password;
    $result=$mysqli->query($sql);
    if($result->fetch_assoc()){
       echo json_encode(['code'=>'200','msg'=>'密码正确']);
    }else{
       echo json_encode(['code'=>'304','msg'=>'密码错误']);
    }
?>