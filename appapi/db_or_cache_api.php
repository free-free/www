<?php
require_once "api.class.php";
require_once "db.class.php";
require_once "cache.class.php";
$cache=new Cache();
$page_num=isset($_GET['page'])?$_GET['page']:1;
$page_size=isset($_GET['page_size'])?$_GET['page_size']:6;
if(!is_numeric($page_num)||!is_numeric($page_size)){
	$result=array(
		'code'=>401,
		'msg'=>'wrong type',
		'data'=>''
		);
	return Response::ReturnData($result);
	}

$cache_record='';
$_GET['format']=isset($_GET['format'])?$_GET['format']:'json';
if(!$cache_record=$cache->cacheData("appdata_index_pg{$page_num}_pgs{$page_size}_{$_GET['format']}",'get')){		
	try{
		$con=DB::getInstance()->connect();
	}catch(Exception $e){
		$result=array(
			'code'=>402,
			'msg'=>'database connection error',
			'data'=>''
			);
		return Response::returnData($result);
	}
	$start=($page_num-1)*$page_size;
	$sql="select * from tb2 limit {$start} ,{$page_size}";
	$rs=mysqli_query($con,$sql);
	$db_record=array();
	while($row=mysqli_fetch_assoc($rs)){
		$db_record[]=$row;
	}
	if(mysqli_num_rows($rs)!=0){
		$result=array(
			'code'=>200,
			'msg'=>'successful',
			'data'=>$db_record
			);
		/* json cache*/
		$cache->cacheData(
			"appdata_index_pg{$page_num}_pgs{$page_size}_json",
			'set',
			Response::json(200,'sucessful',$db_record),
			180
		);
		/* xml cache*/
		$cache->cacheData(
			"appdata_index_pg{$page_num}_pgs{$page_size}_xml",
			'set',
			Response::xml(200,'sucessful',$db_record),
			180
		);
		exit('db');
		Response::returnData($result);
	}else{
		$result=array(
			'code'=>401,
			'msg'=>'there is no record',
			'data'=>''
			);
		Response::returnData($result);
	}

}else{
	exit('cache');
	if($_GET['format']=='json'){
		header('content-type:application/json');
	}elseif($_GET['format']=='xml'){
		header('content-type:text/xml');
	}
	echo $cache_record;
}

?>
