<?php
session_start();
if(isset($_SESSION['code'])&&isset($_POST)&&!empty($_POST)){
	if(strtolower($_SESSION['code'])==strtolower($_POST['code'])){
		echo 'your validation is correct';
		unset($_SESSION['code']);
	}else{
		echo 'your validation is not right';
	}
}else{
	echo 'please enter again';
}

?>