<?php
require_once "api.php";
require_once "cache.php";
$x=array(
'code'=>200,
'msg'=>'successful',
'data'=>array('title'=>'vekou.com','content'=>'today is good',
array('hello','world'))
);
//Response::returnData($x);
$obj=new Cache();
echo $obj->cacheData('cache_file','set',json_encode($x));
//echo $obj->cacheData('cache_file','get');
//echo $obj->cacheData('cache_file','delete');

