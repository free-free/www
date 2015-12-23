<?php
namespace Home\Controller;
use Think\Controller;
class DataqueryController extends Controller {
    public function indexAction(){
        $this->display("dataquery::index");
    }
    public function dataQueryAction(){
        if(IS_POST){
            //print_r($_POST);
        	if(I("post.name")==1){
                 $ldate=!empty(I("post.ldate")) ? strtotime(I("post.ldate")): "";
                 $udate=!empty(I("post.udate")) ? strtotime(I("post.udate")): time();
                 $this->doserateData($ldate,$udate);
        	}else if(I("post.name")==2){
                 $ldate=!empty(I("post.ldate")) ? strtotime(I("post.ldate")): "";
                 $udate=!empty(I("post.udate")) ? strtotime(I("post.udate")): time();
                 $this->gammapicData($ldate,$udate);
        	}else if(I("post.name")==3){
                 $ldate=!empty(I("post.ldate")) ? strtotime(I("post.ldate")): "";
                 $udate=!empty(I("post.udate")) ? strtotime(I("post.udate")): time();
                 $this->gammaphotoData($ldate,$udate);
        	}else if(I("post.name")==4){
                 $llng=!empty(I("post.llng")) ? I("post.llng"): 0;//经度大于
                 $ulng=!empty(I("post.ulng")) ? I("post.ulng"): 180;//经度小于
                 $llat=!empty(I("post.llat")) ? I("post.llat"): 0;//纬度大于
                 $ulat=!empty(I("post.ulat")) ? I("post.ulat"): 90;//纬度小于
                 $ldate=!empty(I("post.ldate")) ? strtotime(I("post.ldate")): "";
                 $udate=!empty(I("post.udate")) ? strtotime(I("post.udate")): time();
                 // print_r($ldate);
                 // print_r('');
                 // print_r($udate);
                 $this->dmsrData($llng,$ulng,$llat,$ulat,$ldate,$udate);
        	}else{
                echo json_encode(['cood'=>'200','msg'=>'请输入查询名称','data'=>'']);  
            }
        }
    }
     public function downAction(){
        if(I("get.type")==1){
            $doserate=M("doserate");
            $condition['id']=I("get.id");
            $data=$doserate->where($condition)->find();
            $str="<?xml version='1.0' encoding='utf-8' ?>";
            $str.="<data>";
            $str.="<legendName>设备号：".$data["legendName"]."</legendName>"."<br />";
            $str.="<collectTime>采集时间：".date("Y-m-d H:i:s",$data["collectTime"])."</collectTime>"."<br />";
            $str.="<sample>采样时刻：".$data["sample"]."</sample>"."<br />";
            $str.="<doserate>剂量率：".$data["doseRate"]."Gy/h</doserate>"."<br />";
            $str.="<remarks>备注：".$data["remarks"]."</remarks>"."<br />";
            $str.="</data>";
            $this->delfile("./Uploads/doserate");
            $filename="./Uploads/doserate/".date("YmdHis").".xml";
            file_put_contents($filename, $str);
            header("Content-Type:application/octet-stream");
            header("content-disposition:attachment;filename=".'剂量率'.date("YmdHis").'.xml');
            header('Content-Length:'.filesize($filename));
            readfile($filename);
        }else if(I("get.type")==2){
            $gammapic=M("gammapic");
            $condition['id']=I("get.id");
            $data=$gammapic->where($condition)->find();
            //print_r($data);
            $str="<?xml version='1.0' encoding='utf-8' ?>";
            $str.="<data>";
            $str.="<legendName>设备号：".$data["legendName"]."</legendName>"."<br />";
            $str.="<collectTime>采集时间：".date("Y-m-d H:i:s",$data["collectTime"])."</collectTime>"."<br />";
            $str.="<sample>采样时刻：".$data["sample"]."</sample>"."<br />";
            $str.="<power>能量区间：".$data["powerR"]."</power>"."<br />";
            $str.="<count>道计数：".$data["countP"]."</count>"."<br />";
            $str.="<remarks>备注：".$data["remarks"]."</remarks>"."<br />";
            $str.="</data>";
            $this->delfile("./Uploads/gammapic");
            $filename="./Uploads/gammapic/".date("YmdHis").".xml";
            file_put_contents($filename, $str);
            header("Content-Type:application/octet-stream");
            header("content-disposition:attachment;filename=".'伽马能谱数据'.date("YmdHis").'.xml');
            header('Content-Length:'.filesize($filename));
            readfile($filename);
        }else if(I("get.type")==3){
            $gammaphoto=M("gammaphoto");
            $condition['id']=I("get.id");
            $data=$gammaphoto->where($condition)->find();
            //print_r($data);
            $str="<?xml version='1.0' encoding='utf-8' ?>";
            $str.="<data>";
            $str.="<legendName>设备号：".$data["legendName"]."</legendName>"."<br />";
            $str.="<collectTime>采集时间：".date("Y-m-d H:i:s",$data["collectTime"])."</collectTime>"."<br />";
            $str.="<sample>采样时刻：".$data["sample"]."</sample>"."<br />";
            $str.="<x>横坐标：".$data["x"]."</x>"."<br />";
            $str.="<y>纵坐标：".$data["y"]."</y>"."<br />";
            $str.="<doserate>剂量率：".$data["doseRate"]."Gy/h</doserate>"."<br />";
            $str.="<remarks>备注：".$data["remarks"]."</remarks>"."<br />";
            $str.="</data>";
            $this->delfile("./Uploads/gammaphoto");
            $filename="./Uploads/gammaphoto/".date("YmdHis").".xml";
            file_put_contents($filename, $str);
            header("Content-Type:application/octet-stream");
            header("content-disposition:attachment;filename=".'伽马相机数据'.date("YmdHis").'.xml');
            header('Content-Length:'.filesize($filename));
            readfile($filename);
        }else if(I("get.type")==4){
            $dmsr=M("dmsr");
            $condition['id']=I("get.id");
            $data=$dmsr->where($condition)->find();
            //print_r($data);
            $str="<?xml version='1.0' encoding='utf-8' ?>";
            $str.="<data>";
            $str.="<legendName>设备号：".$data["legendName"]."</legendName>"."<br />";
            $str.="<collectTime>采集时间：".date("Y-m-d H:i:s",$data["collectTime"])."</collectTime>"."<br />";
            $str.="<sample>采样时刻：".$data["sample"]."</sample>"."<br />";
            $str.="<longitude>经度：".$data["longitude"]."</longitude>"."<br />";
            $str.="<latitude>纬度：".$data["latitude"]."</latitude>"."<br />";
            $str.="<doserate>剂量率：".$data["doseRate"]."Gy/h</doserate>"."<br />";
            $str.="<remarks>备注：".$data["remarks"]."</remarks>"."<br />";
            $str.="</data>";
            $this->delfile("./Uploads/dmsr");
            $filename="./Uploads/dmsr/".date("YmdHis").".xml";
            file_put_contents($filename, $str);
            header("Content-Type:application/octet-stream");
            header("content-disposition:attachment;filename=".'空间核辐射数据'.date("YmdHis").'.xml');
            header('Content-Length:'.filesize($filename));
            readfile($filename);
        }
    }
   
    private function doserateData($ldate,$udate){
    	$doserate=M("doserate");
    	$array=array();
        if(!empty($ldate)&&!empty($udate)){
        $condition["collectTime"]=array(array("gt",$ldate),array("lt",$udate));
        }
        $doseData=$doserate->order("collectTime desc")
                       ->field("id,legendName as name,collectTime as date")
                       ->where($condition)->select();
        foreach ($doseData as $key => $value) {
            $value["date"]=date("Y-m-d",$value["date"]);
            $array[$key]['listcon']=$value;
            //$array[$key]['iconurl']='/HFS/Public/Images/file_download.png';
            $array[$key]['iconurl']='../../Public/Images/file_download.png';
            $array[$key]['downloadurl']='Dataquery/down?type=1&id='.$value["id"];
        }
        
        //print_r($array);
        if(!empty($array)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$array]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>$array]);
        }
    }
    private function gammapicData($ldate,$udate){
    	$gammapic=M("gammapic");
        $array=array();
        if(!empty($ldate)&&!empty($udate)){
        $condition["collectTime"]=array(array("gt",$ldate),array("lt",$udate));
        }
        $gammaData=$gammapic->order("collectTime desc")
                       ->field("id,legendName as name,collectTime as date")
                       ->where($condition)->select();
        foreach ($gammaData as $key => $value) {
            $value["date"]=date("Y-m-d",$value["date"]);
            $array[$key]['listcon']=$value;
            //$array[$key]['iconurl']='/HFS/Public/Images/file_download.png';
            $array[$key]['iconurl']='../../Public/Images/file_download.png';
            $array[$key]['downloadurl']='Dataquery/down?type=2&id='.$value["id"];
        }
        
        //print_r($array);
        if(!empty($array)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$array]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>$array]);
        }
    }
    private function gammaphotoData($ldate,$udate){
    	$gammaphoto=M("gammaphoto");
        $array=array();
        if(!empty($ldate)&&!empty($udate)){
        $condition["collectTime"]=array(array("gt",$ldate),array("lt",$udate));
        }
        $gammaData=$gammaphoto->order("collectTime desc")
                       ->field("id,legendName as name,collectTime as date")
                       ->where($condition)->select();
        foreach ($gammaData as $key => $value) {
            $value["date"]=date("Y-m-d",$value["date"]);
            $array[$key]['listcon']=$value;
            //$array[$key]['iconurl']='/HFS/Public/Images/file_download.png';
            $array[$key]['iconurl']='../../Public/Images/file_download.png';
            $array[$key]['downloadurl']='Dataquery/down?type=3&id='.$value["id"];
        }
        
        //print_r($array);
        if(!empty($array)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$array]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>$array]);
        }
    }
    private function dmsrData($llng,$ulng,$llat,$ulat,$ldate,$udate){
        $dmsr=M("dmsr");
        $condition["longitude"]=array(array("gt",$llng),array("lt",$ulng));
        $condition["latitude"]=array(array("gt",$llat),array("lt",$ulat));
        if(!empty($ldate)&&!empty($udate)){
        $condition["collectTime"]=array(array("gt",$ldate),array("lt",$udate));
        }
        $array=array();
        $dmsrData=$dmsr->order("collectTime desc")
                       ->field("id,legendName as name,collectTime as date,longitude,latitude")
                       ->where($condition)->select();
        foreach ($dmsrData as $key => $value) {
            $value["date"]=date("Y-m-d",$value["date"]);
            $array[$key]['listcon']=$value;
            //$array[$key]['iconurl']='/HFS/Public/Images/file_download.png';
            $array[$key]['iconurl']='../../Public/Images/file_download.png';
            $array[$key]['downloadurl']='Dataquery/down?type=4&id='.$value["id"];
        }
        
        //print_r($array);
        if(!empty($array)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$array]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>$array]);
        }
    }
    private function delfile($dir){
            $dh=opendir($dir);
            while($file=readdir($dh)){
                if($file!="." && $file!=".."){
                    $fullpath=$dir."/".$file;
                    if(is_file($fullpath)){
                        unlink($fullpath);
                    }else{
                        $this->delfile($fullpath);
                    }
                }
            }           
    }

}