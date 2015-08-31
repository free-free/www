<?php

session_start();
require_once "Validcode.class.php";
$obj=new Validcode();
$obj->createValidcode('./arial.ttf',20);
$_SESSION['code']=$obj->getValidcode();
$obj->outputValidcode();

?>