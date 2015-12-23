<?php





/**
*
* gType:代表数据类型,1 为剂量率,2 为伽马能谱,3 为伽马相机数据,4 为空间辐射监测数据
* desc:数据描述
* x:横坐标的值
* y:纵坐标相关参数
* legendName:数据的标号
* name:纵坐标的名字
*
**/

$return=array(
	0=>array(//剂量率
	    'gType'=>1,
	    'desc'=>'剂量率',
		'x'=>array(
			0=>array('data'=>array(1,2,3,4,5,6,7,8,9,10)),
			),
		'y'=>array(
			0=>array('legendName'=>'device1','name'=>'剂量率','max'=>100,'data'=>array(12,32,23,43,54,65,32,21,32,12)),
			1=>array('legendName'=>'device2','name'=>'剂量率','max'=>100,'data'=>array(43,5,4,32,12,21,32,12,21,32)),
			2=>array('legendName'=>'device3','name'=>'剂量率','max'=>100,'data'=>array(3,23,4,43,54,12,43,12,34,23))
			)
	),
	1=>array(//伽马能谱
	    'gType'=>2,
	    'desc'=>'伽马能谱',
		'x'=>array(
			0=>array('data'=>array(1,2,3,4,5,6,7,8,9,10)),
			),
		'y'=>array(
			0=>array('legendName'=>'device1','name'=>'能量值','max'=>100,'data'=>array(12,32,23,43,54,65,32,21,32,12)),
			1=>array('legendName'=>'device2','name'=>'能量值','max'=>100,'data'=>array(43,5,4,32,12,21,32,12,21,32)),
			)
	),
	2=>array(//伽马相机数据
	    'gType'=>3,
	    'desc'=>'伽马相机数据',
		'x'=>array(
			0=>array('data'=>''),
			),
		'y'=>array(
			0=>array('legendName'=>'device1','name'=>'','max'=>'','data'=>array(0=>array(1,2,123),//第一个值为横坐标，第二个值为纵坐标，第三值为这一点的剂量率
																					  1=>array(12,32,43),
																					  2=>array(43,43,32),
																					  3=>array(54,21,123)
																					  )),
			1=>array('legendName'=>'device2','name'=>'','max'=>'','data'=>array(0=>array(6,12,433),
																					  1=>array(65,43,32),
																					  2=>array(87,50,34),
																					  3=>array(12,43,13)
																					  )),
			2=>array('legendName'=>'device3','name'=>'','max'=>'','data'=>array(0=>array(32,34,433),
																					  1=>array(43,53,32),
																					  2=>array(54,34,34),
																					  3=>array(65,23,13)
																					  ))
			)

	),
	3=>array(//空间辐射监测数据
	    'gType'=>4,
	    'desc'=>'空间辐射监测数据',
		'x'=>array(
			0=>array('data'=>''),
			),
		'y'=>array(
			0=>array('legendName'=>'device1','name'=>'','max'=>130,'data'=>array(0=>array(116.430537,39.880968,123),//第一个值为经度(lng)，第二个值为纬度，第三值为这一点的剂量率
																			    1=>array(116.430537, 39.880968,120),
																			    2=>array(116.550673,39.895212,120),
																				3=>array(116.345906,39.815152,120),
																				4=>[116.512016,
																					39.868573,
																					120],
																				5=>[115.894604,
																					39.803644,
																					120],
																				6=>[116.32497,
																					40.083198,
																					120],
																				7=>[116.315523,
																					39.858242,
																					120]
																				)),
			1=>array('legendName'=>'device2','name'=>'','max'=>130,'data'=>array(0=>array(39.880968,39.880968,80),//第一个值为经度(lng)，第二个值为纬度，第三值为这一点的剂量率
																			    1=>array(39.880968, 39.880968,80),
																			    2=>array(39.880968,39.895212,80),
																				3=>array(39.880968,39.815152,80),
																				4=>[39.880968,
																					39.868573,
																					80],
																				5=>[39.880968,
																					39.803644,
																					80],
																				6=>[40.083198,
																					40.083198,
																					80],
																				7=>[39.880968,
																					39.858242,
																					80]
																				)),
			)

	)
);
echo json_encode($return);


?>