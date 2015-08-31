<?php
$pattern='/imooc.+123/Uix';
$subject='jiefiuefimooC__123123123123123';
$m=array();
preg_match($pattern,$subject,$m);
print_r($m);

?>
