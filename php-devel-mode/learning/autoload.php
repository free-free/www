
<?php

spl_autoload_register('myautoload');

function myautoload($classname){
	require_once __DIR__.'/'.$classname.'.php';
}

$obj1=new test1();
$obj2=new test2();

//method 1:php build in function __autoload
/*function __autoload($classname){
	require_once __DIR__.'/'.$classname.'.php';	
}
*/
//method 2:php build in function spl_autoload_register
//spl_autoload_register must run before make a class object


?>
