<?php
$link=mysqli_connect("localhost",'root','526114');
mysqli_select_db($link,'ddp');

$dir='./gama';
if ($dh = opendir($dir)) {
	while (($file = readdir($dh)) !== false) {
		if(!is_dir($file)){
				$index=stripos($file,".") ;
				$lengend= substr($file, 0,$index);
				$fp=fopen($dir.'/'.$file, 'r+');
				$x=0;
				$date=time();
				while(!feof($fp)){
					$y= fgets($fp);
					$sql="insert think_gammapic(legendName,collectTime,powerR,countP) values (
						'{$lengend}',{$date},{$y},{$x})";
					mysqli_query($link,$sql);
					$x+=1;

				}
				echo 'ok';

		}
		
	}	
	closedir($dh);
}

mysqli_close($link);


?>
