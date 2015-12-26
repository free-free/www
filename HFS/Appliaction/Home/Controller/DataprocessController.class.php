<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class DataprocessController extends Controller {
    /**
      *
      *@param  None
      *@return view
      *
      *
     */
    public function indexAction(){
        $data=[];
        $deviceModel=D('device');
        $deviceList=$deviceModel->field('pid,id,device_name')->select();
        foreach ($deviceList as $key => $value) {
             $data[$value['pid']][$key]['device_name']=$value['device_name'];
             $data[$value['pid']][$key]['data']=$value['id'];
        }
        $this->assign('device_list',$data);
        $this->display("dataprocess::index");
    }
    /**
      *
      *@param  None
      *@return String  json
      *
      *
     */
    public function dataProAction(){
    	if(IS_POST){
      	   $post=(array)json_decode($_POST["q"]);
      	   $lDate=!empty($post["lDate"]) ? strtotime($post["lDate"]) :'';
      	   $uDate=!empty($post["uDate"]) ? strtotime($post["uDate"]) :'';
  	       $desc_arr=[1=>'剂量率',2=>'伽马能谱',3=>'伽马相机',4=>'空间辐射监测数据'];
           $type_arr=[1=>'dose',2=>'gammapic',3=>'gammaphoto',4=>'dmsr'];
           $formatData=[];
           $index=0;
           $deviceId=0;
           /*
            when $post is empty,by default ,
            should return a hot data from database,that's it purpose for next loop
           */
           if(count($post['type'])==0){
               for ($i=0; $i <4 ; $i++){ 
                 $post['type'][$i]=[$i+1,0];
              }
           }
           /* get data from database for different type of query */
      	   foreach ($post['type'] as $key => $value) {
                      $deviceId=$value[1]?$value[1]:0;
                      $record=$this->{$type_arr[(int)$value[0]].'Pro'}($lDate,$uDate,$deviceId);
             /*data from database is different,for simplify processing,data should be formated before render*/
                      $data=$this->format($value[0],$record);
                      foreach ($data as $k => $v) {
                          $formatData[$index]=[
                          'gType'=>$value[0],
                          'desc'=>$desc_arr[$value[0]],
                          'x'=>$v[0],
                          'y'=>$v[1]
                          ];
                          $index+=1;    
                      }
                      
             }
             echo json_encode($formatData);
        }
    }
    /**
      *
      *@param  int   $type(query type)
      *@param  array $data(need to be formated) 
      *@return array $formatedData
      *
      *
     */
    private function format($type,$data){
        $r_data=[];
        switch ($type) {
            case 1:
                $r_data[0][0]=$data[0];
                $r_data[0][1]=$data[1];
                break;
            case 2:
            
                $length=count($data[1]);
                for ($i=0; $i <$length ;$i++) { 
                    $r_data[$i][0]=$data[0][$i];
                    $r_data[$i][1]=$data[1][$i];
                }
                break;
            case 3:
                $length=count($data);
                for ($i=0; $i <$length ; $i++) { 
                    $r_data[0][0]='';
                    $r_data[0][1]=$data[$i];
                }
                break;
            case 4:
                $length=count($data);
                for ($i=0; $i <$length ; $i++) { 
                    $r_data[0][0]='';
                    $r_data[0][1]=$data[$i];
                }
                break;
            default:
                # code...
                break;
        }
        return $r_data;
    }
    /**
      *
      *@param  string   $lDate(lower date )
      *@param  string   $uData(upper date) 
      *@param  int      $deviceId
      *@return array    $data
      *
      *
     */
    private function dosePro($lDate,$uDate,$deviceId){
    	$doserate=D("doserate");
    	$y=array();
    	$x=array();
    	$map=array();
    	$records=[];

        if(empty($lDate)&&empty($uDate)&&$deviceId==0){
            $device=$doserate->order('id desc')->limit(1)->field('device_id')->select();
            $dId=$device[0]['device_id'];
            $map['device_id']=$dId;
        }else{
            $map['device_id']=$deviceId;
            if(empty($lDate)&&!empty($uDate)){
                $map['collect_time']=array('lt',$uDate);
            }elseif(!empty($lDate)&&empty($uDate)){
                $map['collect_time']=array('gt',$lDate);
            }elseif(!empty($lDate)&&!empty($uDate)){
                $map["collect_time"]=array(array('gt',$lDate),array('lt',$uDate));
            }else{

            }
          
        }
        $records=$doserate->order('collect_time asc')->field('dose_rate,collect_time')->where($map)->select();
        $y[0]["legendName"]=1;
        $y[0]["max"]=100;
        $y[0]["name"]="剂量率";
        foreach ($records as $key => $value) {
                $x[0]['data'][]=date('Y/m/d H:i:s',$value['collect_time']);
                $y[0]['data'][]=$value['dose_rate'];       
        }
        return array($x,$y);
    }
    /**
      *
      *@param  string   $lDate(lower date )
      *@param  string   $uData(upper date) 
      *@param  int      $deviceId
      *@return array    $data
      *
      *
     */
    private function gammapicPro($lDate, $uDate,$deviceId){
    	   $gammapic=D("gammapic");
    	   $countP=[];
           $powerR=[];
           $map=[];

           if((empty($lDate)&&empty($uDate)&&$deviceId==0)){
                  $device=$gammapic->order('id desc')->limit(1)->field('legend_id')->select();
                  $map['legend_id']=$device[0]['legend_id'];
                  $records=$gammapic->order('countP asc')->field('powerR,countP')->where($map)->select();
                  $countP[0][0]['data']=array_column($records,'countP');
                  $powerR[0][0]['data']=array_column($records,'powerR');
                  $powerR[0][0]['legendName']=2;
                  $powerR[0][0]['max']=500;
                  $powerR[0][0]["name"]="gammapic";
           }else{
                $legendModel=D('gammapic_legend');
                $map['device_id']=$deviceId;
                if(empty($lDate)&&!empty($uDate)){
                    $map['collect_time']=array('lt',$uDate);
                }elseif(!empty($lDate)&&empty($uDate)){
                    $map['collect_time']=array('gt',$lDate);
                }elseif(!empty($lDate)&&!empty($uDate)){
                    $map["collect_time"]=array(array('gt',$lDate),array('lt',$uDate));
                }else{
                    $recentTime=$legendModel->field('collect_time')->order('collect_time desc')->where($map)->select();
                    $map['collect_time']=$recentTime[0]['collect_time'];
                }
                $index1=0;
                $index2=0;
                $legends=$legendModel->field('id,legend_name')->where($map)->select();
                foreach ($legends as $key => $value) {
                        $map=[];
                        $map['legend_id']=$value['id'];
                        $records=$gammapic->field('powerR,countP')->where($map)->order('countP  asc')->select();
                        $countP[$index1][$index2]['data']=array_column($records,'countP');
                        $powerR[$index1][$index2]['data']=array_column($records,'powerR');
                        $powerR[$index1][$index2]['legendName']=$value['legend_name'];
                        $powerR[$index1][$index2]['max']=1000;
                        $powerR[$index1][$index2]["name"]="energy";
                        if(($key+1)%2==0){
                            $index2=0;
                            $index1+=1;
                        }else{
                            $index2+=1;    
                        }
                       
                        
                }
           }
           return array($countP,$powerR);
    }
    /**
      *
      *@param  string   $lDate(lower date )
      *@param  string   $uData(upper date) 
      *@param  int      $deviceId
      *@return array    $data
      *
      *
     */
    private function gammaphotoPro($lDate, $uDate,$deviceId){
    	    $gammaphoto=D("gammaphoto");
    	    $data=[];
          $map=[];
    	    if((empty($lDate)&&empty($uDate)&&$deviceId==0)){
                $device=$gammaphoto->order('id desc')->limit(1)->field('legend_id')->select();
                 $map['legend_id']=$device[0]['legend_id'];
                 $records=$gammaphoto->field('x as "0",y as "1",dose_rate as "2"')->where($map)->select();
                 $data[0][0]["legendName"]=$map['legend_id'];
                 $data[0][0]["name"]="";
                 $data[0][0]["max"]="";
                 $data[0][0]['data']=$records;            
          }else{
                $legendModel=D('gammaphoto_legend');
                $map['device_id']=$deviceId;
                if(empty($lDate)&&!empty($uDate)){
                    $map['collect_time']=array('lt',$uDate);
                }elseif(!empty($lDate)&&empty($uDate)){
                    $map['collect_time']=array('gt',$lDate);
                }elseif(!empty($lDate)&&!empty($uDate)){
                    $map["collect_time"]=array(array('gt',$lDate),array('lt',$uDate));
                }else{
                    $recentTime=$legendModel->field('collect_time')->order('collect_time desc')->where($map)->select();
                    $map['collect_time']=$recentTime[0]['collect_time'];
                }
                $legends=$legendModel->field('id,legend_name')->where($map)->select();
                foreach ($legends as $key => $value) {
                        $map=[];
                        $map['legend_id']=$value['id'];
                        $records=$gammaphoto->field('x as "0",y as "1",dose_rate as "2" ')->where($map)->select();
                        $data[$key][0]["legendName"]=$value['legend_name'];
                        $data[$key][0]["name"]="";
                        $data[$key][0]["max"]="";
                        $data[$key][0]['data']=$records;            
                }
          }
          return $data;
    }
    /**
      *
      *@param  string   $lDate(lower date )
      *@param  string   $uData(upper date) 
      *@param  int      $deviceId
      *@return array    $data
      *
      *
     */
    private function dmsrPro($lDate, $uDate,$deviceId){
    	$dmsr=D("dmsr");
        $map=[];
        $data=[];
        if((empty($lDate)&&empty($uDate)&&$deviceId==0)){
                 $device=$dmsr->order('id desc')->limit(1)->field('legend_id')->select();
                 $map['legend_id']=$device[0]['legend_id'];
                 $records=$dmsr->field('longitude as "0",latitude as "1",dose_rate as "2"')->where($map)->select();
                 $data[0][0]["legendName"]=$map['legend_id'];
                 $data[0][0]["name"]="";
                 $data[0][0]["max"]="";
                 $data[0][0]['data']=$records;            
            }else{
                $legendModel=D('dmsr_legend');
                $map['device_id']=$deviceId;
                if(empty($lDate)&&!empty($uDate)){
                    $map['collect_time']=array('lt',$uDate);
                }elseif(!empty($lDate)&&empty($uDate)){
                    $map['collect_time']=array('gt',$lDate);
                }elseif(!empty($lDate)&&!empty($uDate)){
                    $map["collect_time"]=array(array('gt',$lDate),array('lt',$uDate));
                }else{
                    $recentTime=$legendModel->field('collect_time')->order('collect_time desc')->where($map)->select();
                    $map['collect_time']=$recentTime[0]['collect_time'];
                }
                $legends=$legendModel->field('id,legend_name')->where($map)->select();
                foreach ($legends as $key => $value) {
                        $map=[];
                        $map['legend_id']=$value['id'];
                        $records=$dmsr->field('longitude as "0",latitude as "1",dose_rate as "2" ')->where($map)->select();
                        $data[$key][0]["legendName"]=$value['legend_name'];
                        $data[$key][0]["name"]="";
                        $data[$key][0]["max"]="";
                        $data[$key][0]['data']=$records;            
                }
           }
       return $data;
    }

}