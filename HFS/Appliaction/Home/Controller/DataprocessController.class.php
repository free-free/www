<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class DataprocessController extends Controller {
    public function indexAction(){
        $this->display("dataprocess::index");
    }
    public function dataProAction(){
    	
    	if(IS_POST){
    	   $post=(array)json_decode($_POST["q"]);
    	   $lDate=!empty($post["lDate"]) ? strtotime($post["lDate"]) :'';
    	   $uDate=!empty($post["uDate"]) ? strtotime($post["uDate"]) :time();
    	   $dName=!empty($post["dName"][0]) ? $post["dName"] :''; 
    	   //print_r($post);
    	   $dose=$this->dosePro($lDate, $uDate,$dName);
	       $gammapic=$this->gammapicPro($lDate, $uDate,$dName);
	       $gammaphoto=$this->gammaphotoPro($lDate, $uDate,$dName);
	       $dmsr=$this->dmsrPro($lDate, $uDate,$dName);	 
	       $doseType=1;$gammapicType=2; $gammaphotoType=3;$dmsrType=4;
    	   
    	   if(count($post["type"])==0||count($post["type"])==4){
    	   	 echo json_encode(array(
				0=>array(//剂量率
				'gType'=>$doseType,
				'desc'=>'剂量率',
				'x'=>$dose[0],
				'y'=>$dose[1],
				),
				1=>array(//伽马能谱
				'gType'=>$gammapicType,
				'desc'=>'伽马能谱',
				'x'=>$gammapic[0][0],
				'y'=>$gammapic[1][0],
				),
				2=>array(//伽马相机
				'gType'=>$gammaphotoType,
				'desc'=>'伽马相机',
				'x'=>'',
				'y'=>$gammaphoto,
				),
				3=>array(//空间辐射监测数据
				'gType'=>$dmsrType,
				'desc'=>'空间辐射监测数据',
				'x'=>'',
				'y'=>$dmsr,
				),
                ));
    	   }else if(count($post["type"])==1){
    	   	   if($post["type"][0]==1){
                    echo json_encode(array(
                    	   0=>array(
                    	   	'gType'=>$doseType,
							'desc'=>'剂量率',
							'x'=>$dose[0],
							'y'=>$dose[1],
                    	   	),
						));    
    	   	   }else if($post["type"][0]==2){
    	   	   	$picdata=array();
    	   	   	for($i=0;$i<count($gammapic[0]);$i++){
    	   	   		$picdata[$i]=array(
                    	   	           'gType'=>$gammapicType,
				                       'desc'=>'伽马能谱',
							           'x'=>$gammapic[0][$i],
							           'y'=>$gammapic[1][$i],
                    	   	           );
    	   	   	}
                echo json_encode($picdata);  
    	   	   	
    	   	   }else if($post["type"][0]==3){
                    echo json_encode(array(
                    	   0=>array(
                    	   	'gType'=>$gammaphotoType,
							'desc'=>'伽马相机',
							'x'=>'',
							'y'=>$gammaphoto,
                    	   	),
						));
    	   	   }else if($post["type"][0]==4){
                    echo json_encode(array(
                    	   0=>array(
                    	   	'gType'=>$dmsrType,
							'desc'=>'空间辐射监测数据',
							'x'=>'',
							'y'=>$dmsr,
                    	   	),
						));
    	   	   }
    	   }else if(count($post["type"])==2){
                  $arr1=array('1','2');$arr2=array('1','3');
                  $arr3=array('1','4');$arr4=array('2','3');
                  $arr5=array('2','4');$arr6=array('3','4');
                  if($arr1==$post["type"]){
                         echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$doseType,
								'desc'=>'剂量率',
								'x'=>$dose[0],
								'y'=>$dose[1],
								),
								1=>array(//伽马能谱
								'gType'=>$gammapicType,
								'desc'=>'伽马能谱',
								'x'=>$gammapic[0],
								'y'=>$gammapic[1],
								),));
                  }else if($arr2==$post["type"]){
                  	      echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$doseType,
								'desc'=>'剂量率',
								'x'=>$dose[0],
								'y'=>$dose[1],
								),
								1=>array(//伽马能谱
								'gType'=>$gammaphotoType,
								'desc'=>'伽马相机',
								'x'=>'',
								'y'=>$gammaphoto,
								),));
                  }else if($arr3==$post["type"]){
                  	      echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$doseType,
								'desc'=>'剂量率',
								'x'=>$dose[0],
								'y'=>$dose[1],
								),
								1=>array(//伽马能谱
								'gType'=>$dmsrType,
								'desc'=>'空间辐射监测数据',
								'x'=>'',
								'y'=>$dmsr,
								),));
                  }else if($arr4==$post["type"]){
                  	     echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$gammapicType,
								'desc'=>'伽马能谱',
								'x'=>$gammapic[0],
					            'y'=>$gammapic[1],
								),
								1=>array(//伽马能谱
								'gType'=>$gammaphotoType,
								'desc'=>'伽马相机',
								'x'=>'',
								'y'=>$gammaphoto,
								),));
                  }else if($arr5==$post["type"]){
                  	     echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$gammapicType,
								'desc'=>'伽马能谱',
								'x'=>$gammapic[0],
					            'y'=>$gammapic[1],
								),
								1=>array(//伽马能谱
								'gType'=>$dmsrType,
								'desc'=>'空间辐射监测数据',
								'x'=>'',
								'y'=>$dmsr,
								),));
                  }else if($arr6==$post["type"]){
                  	    echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$gammaphotoType,
								'desc'=>'伽马相机',
								'x'=>'',
								'y'=>$gammaphoto,
								),
								1=>array(//伽马能谱
								'gType'=>$dmsrType,
								'desc'=>'空间辐射监测数据',
								'x'=>'',
								'y'=>$dmsr,
								),));
                  }
    	   }else if(count($post["type"])==3){
                  $arr1=array('1','2','3');$arr2=array('1','2','4');
                  $arr3=array('1','3','4');$arr4=array('2','3','4');
                  if($arr1==$post["type"]){
                         echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$doseType,
								'desc'=>'剂量率',
								'x'=>$dose[0],
								'y'=>$dose[1],
								),
								1=>array(//伽马能谱
								'gType'=>$gammapicType,
								'desc'=>'伽马能谱',
								'x'=>$gammapic[0],
								'y'=>$gammapic[1],
								),
								2=>array(//伽马能谱
								'gType'=>$gammaphotoType,
								'desc'=>'伽马相机',
								'x'=>'',
								'y'=>$gammaphoto,
								),
								));
                  }else if($arr2==$post["type"]){
                        echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$doseType,
								'desc'=>'剂量率',
								'x'=>$dose[0],
								'y'=>$dose[1],
								),
								1=>array(//伽马能谱
								'gType'=>$gammapicType,
								'desc'=>'伽马能谱',
								'x'=>$gammapic[0],
								'y'=>$gammapic[1],
								),
								2=>array(//伽马能谱
								'gType'=>$dmsrType,
								'desc'=>'空间辐射监测数据',
								'x'=>'',
								'y'=>$dmsr,
								),
								));
                  }else if($arr3==$post["type"]){
                        echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$gammapicType,
								'desc'=>'伽马能谱',
								'x'=>$gammapic[0],
								'y'=>$gammapic[1],
								),
								1=>array(//伽马能谱
								'gType'=>$gammaphotoType,
								'desc'=>'伽马相机',
								'x'=>'',
								'y'=>$gammaphoto,
								),
								2=>array(//伽马能谱
								'gType'=>$dmsrType,
								'desc'=>'空间辐射监测数据',
								'x'=>'',
								'y'=>$dmsr,
								),
								));
                  }else if($arr4==$post["type"]){
                         echo json_encode(array(
								0=>array(//剂量率
								'gType'=>$doseType,
								'desc'=>'剂量率',
								'x'=>$dose[0],
								'y'=>$dose[1],
								),
								1=>array(//伽马能谱
								'gType'=>$gammaphotoType,
								'desc'=>'伽马相机',
								'x'=>'',
								'y'=>$gammaphoto,
								),
								2=>array(//伽马能谱
								'gType'=>$dmsrType,
								'desc'=>'空间辐射监测数据',
								'x'=>'',
								'y'=>$dmsr,
								),
								));
                  }
    	   }
        }
    }
    private function dosePro($lDate,$uDate,$dName){
    	$doserate=D("doserate");
    	$LN=array();
    	$y=array();
    	$x=array();
    	$map=array();
    	if(!empty($dName)){
	    	foreach ($dName as $key => $value) {
	    		$map["legendName"][$key]=array('eq',$value);
	    	}
	    	    $map["legendName"][]="or";
        }
        if(!empty($lDate)&&!empty($uDate)){
        	 $map["collectTime"]=array(array('gt',$lDate),array('lt',$uDate));
        }
        //print_r($map);
        $data1=$doserate->field("legendName,doseRate")->where($map)->select();
        foreach ($data1 as $key => $value) {
        	if(!in_array($value["legendName"], $LN))
        	$LN[]=$value["legendName"];
        }
        //print_r($LN);
        foreach ($LN as $k1 => $v1) {
        	$condition["legendName"]=$v1;
        	$data2=$doserate->order("collectTime desc")->field("legendName,doseRate")->limit(10)->where($condition)->select();
        	$count=$doserate->where($condition)->count();
        	for ($i=0;$i<=$count;$i++) {
        		$x[$k1]['data'][]=$i;
        	}
        	foreach ($data2 as $k2 => $v2) {
        		$y[$k1]["legendName"]=$v2["legendName"];
        		$y[$k1]["name"]="剂量率";
        		$y[$k1]["max"]=100;
        		$y[$k1]['data'][$k2]=$v2["doseRate"];
        	}
        }
        //print_r($y);
     
         return array($x,$y);
       
    }
    private function gammapicPro($lDate, $uDate,$dName){
    	   $gammapic=D("gammapic");
    	   $x=array();
    	   $y=array();
    	   $LN=array();
    	   $j=0;
			if(!empty($dName)){
			foreach ($dName as $key => $value) {
			$map["legendName"][$key]=array('eq',$value);
			}
			$map["legendName"][]="or";
			}
			if(!empty($lDate)&&!empty($uDate)){
			$map["collectTime"]=array(array('gt',$lDate),array('lt',$uDate));
			}
    	   $data1=$gammapic->field("legendName")->where($map)->select();
    	   foreach ($data1 as $key => $value) {
    	   	   if(!in_array($value["legendName"], $LN))
    	   	   	$LN[]=$value["legendName"];
    	   }
    	  for($lni=0;$lni<count($LN);$lni=$lni+3,$j++){
    	     $sc=array_slice($LN,$lni,3);
             foreach ($sc as $k1 => $v1) {
    	  	 $condition["legendName"]=$v1;
    	  	 $data2=$gammapic->order("collectTime desc")->field("legendName,powerR")->where($condition)->select();
    	  	 $count=$gammapic->where($condition)->count();
    	  	 $max=$gammapic->where($condition)->max("powerR");
    	  	 for ($i=0;$i<=$count;$i++) {
        		$x[$k1]['data'][]=$i;
        	 }
    	  	 foreach ($data2 as $k2 => $v2) {
    	  	 	$y[$k1]["legendName"]=$v2["legendName"];
        		$y[$k1]["name"]="能量值";
        		$y[$k1]["max"]=$max;
        		$y[$k1]['data'][$k2]=$v2["powerR"];
    	  	 }
    	  	 if($j==intval(count($LN)/3)&&(count($LN)%3)==2){
    	  	 	array_splice($y,2,1);
    	  	 }else if($j==intval(count($LN)/3)&&(count($LN)%3)==1){
    	  	 	array_splice($y,1,2);
    	  	 }
    	  	 $counts[$j]=$x;
    	  	 $powers[$j]=$y;
    	}
    }
      // print_r(count($y));
       return array($counts,$powers);
    }
    private function gammaphotoPro($lDate, $uDate,$dName){
    	$gammaphoto=D("gammaphoto");
    	$LN=array();
    	$y=array();
    	$x=array();
    	if(!empty($dName)){
	    	foreach ($dName as $key => $value) {
	    		$map["legendName"][$key]=array('eq',$value);
	    	}
	    	    $map["legendName"][]="or";
        }
        if(!empty($lDate)&&!empty($uDate)){
        	 $map["collectTime"]=array(array('gt',$lDate),array('lt',$uDate));
        }
        $data1=$gammaphoto->field("legendName")->where($map)->select();
        foreach ($data1 as $key => $value) {
        	if(!in_array($value["legendName"], $LN))
        	$LN[]=$value["legendName"];
        }
        //print_r($LN);
        foreach ($LN as $k1 => $v1) {
        	$condition["legendName"]=$v1;
        	$data2=$gammaphoto->order("collectTime desc")->field("legendName,x,y,doseRate")->where($condition)->limit(10)->select();
        	$count=$gammaphoto->where($condition)->count();
        	// for ($i=1;$i<=$count;$i++) {
        	// 	$x[$k1]['data'][]=$i;
        	// }
        	foreach ($data2 as $k2 => $v2) {
        		$y[$k1]["legendName"]=$v2["legendName"];
        		$y[$k1]["name"]="剂量率";
        		$y[$k1]["max"]=100;
        		$y[$k1]['data'][$k2]=array($v2["x"],$v2["y"],$v2["doseRate"]);
        	}
        }
        //return array($x,$y);
      
        	 return $y;
       
        
        //print_r($y);
    }
    private function dmsrPro($lDate, $uDate,$dName){
    	$dmsr=D("dmsr");
    	$LN=array();
    	$y=array();
    	$x=array();
    	if(!empty($dName)){
	    	foreach ($dName as $key => $value) {
	    		$map["legendName"][$key]=array('eq',$value);
	    	}
	    	    $map["legendName"][]="or";
        }
        if(!empty($lDate)&&!empty($uDate)){
        	 $map["collectTime"]=array(array('gt',$lDate),array('lt',$uDate));
        }
        $data1=$dmsr->field("legendName")->where($map)->select();
        foreach ($data1 as $key => $value) {
        	if(!in_array($value["legendName"], $LN))
        	$LN[]=$value["legendName"];
        }
        //print_r($LN);
        foreach ($LN as $k1 => $v1) {
        	$condition["legendName"]=$v1;
        	$data2=$dmsr->order("collectTime desc")->field("legendName,longitude,latitude,doseRate")->where($condition)->limit(10)->select();
        	$count=$dmsr->where($condition)->count();
        	// for ($i=1;$i<=$count;$i++) {
        	// 	$x[$k1]['data'][]=$i;
        	// }
        	foreach ($data2 as $k2 => $v2) {
        		$y[$k1]["legendName"]=$v2["legendName"];
        		$y[$k1]["name"]="";
        		$y[$k1]["max"]=130;
        		$y[$k1]['data'][$k2]=array($v2["longitude"],$v2["latitude"],$v2["doseRate"]);
        	}
        }
        //return array($x,$y);
       
        	 return $y;
       
        //print_r($y);
    }

}