<?php
if(isset($_GET['dt'])&&!empty($_GET)){
	$filepath='./images/file.png';
	header("Content-Type:application/octet-stream");
	header("content-disposition:attachment;filename=".basename('./images/file.png'));
	header('Content-Length:'.filesize('./images/file.png'));
	echo readfile('./images/file.png');
}

?>