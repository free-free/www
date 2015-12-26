<?php
namespace Home\Controller;
use Think\Controller;
class DataqueryController extends Controller {
    public function indexAction(){
        $this->display("dataquery::index");
    }
    public function dataQueryAction(){
        $type_arr=[1=>'doserate',2=>'gammapic',3=>'gammaphoto',4=>'dmsr'];
        if(IS_POST){
            /*$ldate=!empty(I("post.ldate")) ? strtotime(I("post.ldate")): "";
            $udate=!empty(I("post.udate")) ? strtotime(I("post.udate")): time();*/
            /*$llng=!empty(I("post.llng")) ? I("post.llng"): 0; //经度大于
            $ulng=!empty(I("post.ulng")) ? I("post.ulng"): 180;//经度小于
            $llat=!empty(I("post.llat")) ? I("post.llat"): 0;//纬度大于
            $ulat=!empty(I("post.ulat")) ? I("post.ulat"): 90;//纬度小于
            $this->dmsrData($llng,$ulng,$llat,$ulat,$ldate,$udate);*/
            $qCondition=I('post');
            if(in_array(I('post.name'),array_keys($type_arr))){
                 $this->{$type_arr[I('post.name')].'Data'}($qCondition);
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
    private function doserateData($q){
    	$doserate=M("doserate");
    	$data=[];
        $condition=[];
        $limitNum=0;
        $ldate=!empty(I("post.ldate"))? strtotime(I("post.ldate")):"";
        $udate=!empty(I("post.udate"))? strtotime(I("post.udate")):"";
        if(!empty($ldate)||!empty($udate)){
               if(!empty($ldate)&&empty($udate)){
                        $condition["collect_time"]=array("gt",$ldate); 
               }else if (empty($ldate)&&!empty($udate)){
                        $condition["collect_time"]=array("lt",$udate); 
               }else{
                        $condition["collect_time"]=array(array("gt",$ldate),array("lt",$udate)); 
               }            
               $limitNum=100;
        }else{
             $limitNum=20;
        }
        $doseData=$doserate->order("collect_time asc")
                           ->limit($limitNum)
                           ->field("think_doserate.id as id,think_device.device_name as  name,think_doserate.collect_time as date,think_doserate.dose_rate as val")
                           ->join('inner join think_device where think_device.id=think_doserate.device_id')
                           ->where($condition)->select();
        foreach ($doseData as $key => $value) {
                $value["date"]=date("Y-m-d H:i:s",$value["date"]);
                $data[$key]['listcon']=$value;
                $data[$key]['iconurl']='../../Public/Images/file_download.png';
                $data[$key]['downloadurl']='Dataquery/down?type=1&id='.$value["id"];
        }

        if(!empty($data)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$data]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>$data]);
        }
    }
    private function gammapicData($q){
    	$gammapic=M("gammapic");
        $legendModel=M('gammapic_legend');
        $data=[];
        $condition=[];
        $limitNum=0;
        $ldate=!empty(I("post.ldate"))? strtotime(I("post.ldate")):"";
        $udate=!empty(I("post.udate"))? strtotime(I("post.udate")):"";
        if(!empty($ldate)||!empty($udate)){
               if(!empty($ldate)&&empty($udate)){
                        $condition["collect_time"]=array("gt",$ldate); 
               }else if (empty($ldate)&&!empty($udate)){
                        $condition["collect_time"]=array("lt",$udate); 
               }else{
                        $condition["collect_time"]=array(array("gt",$ldate),array("lt",$udate)); 
               }            
               $limitNum=100;
        }else{
             $limitNum=20;
        }
        $back=$legendModel->order('collect_time desc')->limit($limitNum)
                           ->field('id ,collect_time as date,legend_name as name')
                           ->where($condition)
                           ->select();
        foreach ($back as $key => $value) {
            $data[$key]['downloadurl']='Dataquery/down?type=2&legend_id='.$value["id"];
            $value["date"]=date("Y-m-d H:i:s",$value["date"]);
            $data[$key]['listcon']=$value;
            $data[$key]['iconurl']='../../Public/Images/file_download.png';
        }
        if(!empty($data)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$data]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>'']);
        }
    }
    private function gammaphotoData($q){
    	$gammaphoto=M("gammaphoto");
        $legendModel=M('gammaphoto_legend');
        $data=[];
        $condition=[];
        $limitNum=0;
        $ldate=!empty(I("post.ldate"))? strtotime(I("post.ldate")):"";
        $udate=!empty(I("post.udate"))? strtotime(I("post.udate")):"";
        if(!empty($ldate)||!empty($udate)){
               if(!empty($ldate)&&empty($udate)){
                        $condition["collect_time"]=array("gt",$ldate); 
               }else if (empty($ldate)&&!empty($udate)){
                        $condition["collect_time"]=array("lt",$udate); 
               }else{
                        $condition["collect_time"]=array(array("gt",$ldate),array("lt",$udate)); 
               }            
               $limitNum=100;
        }else{
             $limitNum=20;
        }
        $back=$legendModel->order('collect_time desc')->limit($limitNum)
                           ->field('id ,collect_time as date,legend_name as name')
                           ->where($condition)
                           ->select();
        foreach ($back as $key => $value) {
            $data[$key]['downloadurl']='Dataquery/down?type=3&legend_id='.$value["id"];
            $value["date"]=date("Y-m-d H:i:s",$value["date"]);
            $data[$key]['listcon']=$value;
            $data[$key]['iconurl']='../../Public/Images/file_download.png';
        }
        if(!empty($data)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$data]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>'']);
        }

    }
    private function dmsrData($q){
        $dmsr=M("dmsr");
        $data=[];
        $condition=[];
        $limitNum=0;
        $condition["longitude"]=array(array("gt",I("post.llng")),array("lt",I('post.ulng')));
        $condition["latitude"]=array(array("gt",I('post.llat')),array("lt",I('post.ulat')));
        $ldate=!empty(I("post.ldate"))? strtotime(I("post.ldate")):"";
        $udate=!empty(I("post.udate"))? strtotime(I("post.udate")):"";
        if(!empty($ldate)||!empty($udate)){
               if(!empty($ldate)&&empty($udate)){
                        $condition["collect_time"]=array("gt",$ldate); 
               }else if (empty($ldate)&&!empty($udate)){
                        $condition["collect_time"]=array("lt",$udate); 
               }else{
                        $condition["collect_time"]=array(array("gt",$ldate),array("lt",$udate)); 
               }            
               $limitNum=100;
        }else{
             $limitNum=20;
        }
        $dmsrData=$dmsr->order("collect_time asc")
                           ->limit($limitNum)
                           ->field("think_dmsr.id as id,
                                    think_dmsr_legend.legend_name as  name,
                                    think_dmsr_legend.collect_time as date,
                                    think_dmsr.longitude as longitude,
                                    think_dmsr.latitude as latitude,
                                    think_dmsr.dose_rate as val")
                           ->join('inner join think_dmsr_legend on think_dmsr_legend.id=think_dmsr.legend_id')
                           ->where($condition)->select();
        foreach ($dmsrData as $key => $value) {
                $value["date"]=date("Y-m-d H:i:s",$value["date"]);
                $data[$key]['listcon']=$value;
                $data[$key]['iconurl']='../../Public/Images/file_download.png';
                $data[$key]['downloadurl']='Dataquery/down?type=1&id='.$value["id"];
        }
       /* if(!empty($ldate)&&!empty($udate)){
            $condition["collectTime"]=array(array("gt",$ldate),array("lt",$udate));
        }*/
        /*$array=array();
        $dmsrData=$dmsr->order("collectTime desc")
                       ->field("id,legendName as name,collectTime as date,longitude,latitude")
                       ->where($condition)->select();
        foreach ($dmsrData as $key => $value) {
            $value["date"]=date("Y-m-d",$value["date"]);
            $array[$key]['listcon']=$value;
            $array[$key]['iconurl']='../../Public/Images/file_download.png';
            $array[$key]['downloadurl']='Dataquery/down?type=4&id='.$value["id"];
        }*/
        if(!empty($data)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$data]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>'']);
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