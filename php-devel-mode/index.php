<?php

define("ROOT",__DIR__);
include ROOT.'/IMooc/AutoLoader.php';
spl_autoload_register("\\IMooc\\AutoLoader::autoload");
//IMooc\Object::test();
//App\Controller\Home\Index::test();

//$db=New IMooc\Database();
/*$db->where("id=1");
$db->where('name=2');
$db->order('id desc');
$db->limit(10);
*/
//$db->where('id=1')->order('id desc')->limit(10);

/*
$obj=new IMooc\Object();
echo $obj->title;
echo $obj->title='title';
$obj->hello('hello');
print_r( $obj->index('helo'));
echo IMooc\Object::test();
echo $obj;
$obj();
*/
/*
$obj=\IMooc\Factory::createDBObj();
print_r($obj);
*/
/*
$db=\IMooc\SingleObject::getInstance();
$rs=mysqli_query($db->con,'select * from tb1');
$rcd=array();
while($row=mysqli_fetch_assoc($rs)){
	$rcd[]=$row;	
}
print_r($rcd);

*/

/*
$db=\IMooc\SingleObject::getInstance();
\IMooc\Register::registe($db,'db');
$rgs_db=\IMooc\Register::getObj('db');
$rs=mysqli_query($rgs_db->con,'select * from tb2');
$record=array();
while($row=mysqli_fetch_assoc($rs)){
	$record[]=$row;
}
print_r($record);
*/



