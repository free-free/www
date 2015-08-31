<?php

if(isset($_GET['fn'])&&!empty($_GET)){
	header("Content-Type:application/octet-stream");
	header("content-disposition:attachment;filename=".basename($_GET['fn']));
	header('Content-Type:'.filesize($_GET['fn']));
	echo readfile($_GET['fn']);
}
?>