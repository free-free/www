<?php
$link=mysqli_connect("localhost",'root','526114');
mysqli_select_db($link,'mydata');
$rs=mysqli_query($link,'select * from test1');
$data=array();
while($row=mysqli_fetch_assoc($rs)){
	$data[]=$row;
}
print_r($data);







?>
