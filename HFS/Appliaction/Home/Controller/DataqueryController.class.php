<?php
namespace Home\Controller;
use Think\Controller;
class DataqueryController extends Controller {
      /**
      *
      *@param  None
      *@return View 
      *
      *
     */
    public function indexAction(){
        $this->display("dataquery::index");
    }
      /**
      *
      *@param  None
      *@return String  json
      *
      *
     */
    public function dataQueryAction(){
        $type_arr=[1=>'doserate',2=>'gammapic',3=>'gammaphoto',4=>'dmsr'];
        if(IS_POST){
            $qCondition=I('post');
            if(in_array(I('post.name'),array_keys($type_arr))){
                 $this->{$type_arr[I('post.name')].'Data'}($qCondition);
            }else{
                echo json_encode(['cood'=>'200','msg'=>'请输入查询名称','data'=>'']);  
            }
        }
    }
      /**
      *
      *@param  None
      *@return String  json
      *
      *
     */
    public function downAction(){
        $filename="";
        $fileContent='';
        $legendName='';
        if(I("get.type")==1){
           /* $doserate=M("doserate");
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
            readfile($filename);*/
        }else if(I("get.type")==2){
            $gammapic=M("gammapic");
            $legendModel=M('gammapic_legend');
            $legend=$legendModel->field('legend_name,remarks,collect_time')->where('id',I('get.legend_id'))->select();
            $condition['legend_id']=I("get.legend_id");
            $data=$gammapic->field('sample,powerR,countP')->where($condition)->select();
            $fileContent="<?xml version='1.0' encoding='utf-8' ?>";
            $fileContent.="<legendId>".I('get.legend_id').'</legendId>';
            $fileContent.="<legendName>".$legend[0]['legend_name'].'</legendName>';
            $fileContent.='<collectTime>'.$legend[0]['collect_time'].'</collectTime>';
            $fileContent.='<remarks>'.$legend[0]['remarks'].'</remarks>';
            $fileContent.="<data>";
            foreach ($data as $key => $value) {
                $fileContent.="<row>";     
                $fileContent.="<sample>".$value["sample"]."</sample>";
                $fileContent.="<power>".$value["powerR"]."</power>";
                $fileContent.="<count>".$value["countP"]."</count>";
                $fileContent.="</row>";
            }
            $fileContent.="</data>";
            $filename="./Uploads/gammapic/".$legend[0]['legend_name'].".xml";
            $legendName=$legend[0]['legend_name'];
        }else if(I("get.type")==3){
            $gammaphoto=M("gammaphoto");
            $legendModel=M('gammaphoto_legend');
            $condition['legend_id']=I("get.legend_id");
            $legend=$legendModel->field('legend_name,collect_time,remarks')->where('id',I('post.legend_id'))->select();
            $data=$gammaphoto->field('x,y,dose_rate')->where($condition)->select();
            $fileContent="<?xml version='1.0' encoding='utf-8' ?>";
            $fileContent.="<legendId>".I('get.legend_id')."</legendId>";
            $fileContent.="<legendName>".$legend[0]["legend_name"]."</legendName>";
            $fileContent.="<collectTime>".date("Y-m-d H:i:s",$legend[0]["collect_time"])."</collectTime>";
            $fileContent.="<remarks>".$legend[0]['remarks']."</remarks>";
            $fileContent.="<data>";
            foreach ($data as $key => $value) {
                $fileContent.="<row>";
                $fileContent.="<x>".$value["x"]."</x>";
                $fileContent.="<y>".$value["y"]."</y>";
                $fileContent.="<doseRate>".$value["dose_rate"]."</doseRate>";    
                $fileContent.="</row>";
            }
            $fileContent.="</data>";
            $filename="./Uploads/gammaphoto/".$legend[0]['legend_name'].".xml";
            $legendName=$legend[0]['legend_name'];
        }else if(I("get.type")==4){
            /*$dmsr=M("dmsr");
            $condition['id']=I("get.id");
            $data=$dmsr->where($condition)->find();
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
            readfile($filename);*/
        }
        $this->delfile("./Uploads/gammapic");
        file_put_contents($filename, $fileContent);
        header("Content-Type:application/octet-stream");
        header("content-disposition:attachment;filename=".$legendName.'.xml');
        header('Content-Length:'.filesize($filename));
        readfile($filename);
    }
      /**
      *
      *@param  array $q 
      *@return String  json
      *
      *
     */
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
               /* $data[$key]['iconurl']='../../Public/Images/file_download.png';
                $data[$key]['downloadurl']='Dataquery/down?type=1&id='.$value["id"];*/
        }

        if(!empty($data)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$data]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>$data]);
        }
    }
      /**
      *
      *@param  array $1
      *@return String  json
      *
      *
     */
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
      /**
      *
      *@param  array $q
      *@return String  json
      *
      *
     */
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
      /**
      *
      *@param  array $q
      *@return String  json
      *
      *
     */
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
       /*         $data[$key]['iconurl']='../../Public/Images/file_download.png';
                $data[$key]['downloadurl']='Dataquery/down?type=4&id='.$value["id"];*/
        }
        if(!empty($data)){
           echo json_encode(['cood'=>'200','msg'=>'good','data'=>$data]);
        }else{
           echo json_encode(['cood'=>'200','msg'=>'没有合适数据','data'=>'']);
        }
    }
      /**
      *
      *@param  array $q
      *@return String  json
      *
      *
     */
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