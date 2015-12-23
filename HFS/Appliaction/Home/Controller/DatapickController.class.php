<?php
namespace Home\Controller;
use Think\Controller;
class DatapickController extends Controller {
    public function indexAction(){
    	$portConfig=D("portconfig");
    	$interport=D("interconfig");
    	$portData=$portConfig->order("id desc")->find();
    	$interData=$interport->order("id desc")->find();
    	$this->assign("portData",$portData);
    	$this->assign("interData",$interData);
    	$this->display("datapick::index");
    }
    public function portConfigAction(){
    	//echo json_encode($_POST);
    	if(I("post.devivetype")==1){
    		$portConfig=D("portconfig");

    		if(I("post.verbscode")==1){
    			$condition["id"]=array("egt",1);
				$return=$portConfig->where($condition)->delete();
				if($return){
					$arr=array('code'=>200,'msg'=>'清除成功',data=>array(''));
			        echo json_encode($arr);
		        }else{
		        	$arr=array('code'=>20,'msg'=>'清除失败',data=>array(''));
			        echo json_encode($arr);
		        }
    		}

    		if(I("post.verbscode")==2){
    			if($portConfig->create()){
    				$return=$portConfig->add();
    				if($return){
	    				$arr=array('code'=>200,'msg'=>'参数设置成功',data=>array(''));
	    		        echo json_encode($arr);
    		        }else{
    		        	$arr=array('code'=>30,'msg'=>'参数设置失败',data=>array(''));
	    		        echo json_encode($arr);
    		        }
    			}
    		}

    		if(I("post.verbscode")==3){
    			$id=$portConfig->order('id desc')->field("id")->find();
    			$condition["id"]=$id["id"];
    			if($portConfig->create()){
    				$return=$portConfig->where($condition)->save();
    				if($return){
	    				$arr=array('code'=>200,'msg'=>'数据更新成功',data=>array(''));
	    		        echo json_encode($arr);
    		        }else{
    		        	$arr=array('code'=>40,'msg'=>'没有数据更新',data=>array(''));
	    		        echo json_encode($arr);
    		        }
    			}
    		}
    		
    	}

    	if(I("post.devivetype")==2){
    		$interport=D("interconfig");
    		if(I("post.verbscode")==1){
                $condition["id"]=array("egt",1);
				$return=$interport->where($condition)->delete();
				if($return){
					$arr=array('code'=>200,'msg'=>'清除成功',data=>array(''));
			        echo json_encode($arr);
		        }else{
		        	$arr=array('code'=>102,'msg'=>'清除失败',data=>array(''));
			        echo json_encode($arr);
		        } 

    		}
    		if(I("post.verbscode")==2){
    			//echo json_encode($_POST);
                if($interport->create()){
                	$return=$interport->add();
                	if($return){
                		$arr=array('code'=>200,'msg'=>'参数设置成功',data=>array(''));
			            echo json_encode($arr);
                	}
                }else{
                        $arr=array('code'=>103,'msg'=>'参数设置失败',data=>array(''));
			            echo json_encode($arr);
                }

    	    }
            if(I("post.verbscode")==3){
                $id=$interport->order('id desc')->field("id")->find();
    			$condition["id"]=$id["id"];
    			if($interport->create()){
    				$return=$interport->where($condition)->save();
    				if($return){
	    				$arr=array('code'=>200,'msg'=>'数据更新成功',data=>array(''));
	    		        echo json_encode($arr);
    		        }else{
    		        	$arr=array('code'=>104,'msg'=>'没有数据更新',data=>array(''));
	    		        echo json_encode($arr);
    		        }
    			}

            }
    	
    	}
    }
    public function importConfigAction(){
    	  $upload=new \Think\Upload();
          $upload->rootPath="./Uploads";
          $upload->exts=array('xml');
          $upload->subName=array('date','Ymd');
          $upload->saveName=array('date','YmdHis');
          if(I("get.dt")==1){
              $portConfig=D("portconfig");
    		  $upload->savePath="/portconfig/";
    		  $this->delfile("./Uploads/portconfig");
    		  $data=array();
              if($info=$upload->uploadOne($_FILES["file"])){
              	$filepath='./Uploads'.$info["savepath"].$info["savename"];
              	$xml=simplexml_load_file($filepath);
              	$xml=(array)$xml;
                foreach($xml as  $key=>$value){
                	$_POST[$key]=$value;
                }
              }
              if($portConfig->create()){
              	 $return=$portConfig->add();
              	 if($return){
              	 	$arr=array('code'=>200,'msg'=>'导入成功',data=>array(''));
			        echo json_encode($arr);
              	 }else{
                    $arr=array('code'=>110,'msg'=>'导入失败',data=>array(''));
			        echo json_encode($arr);
                 }
              }
          }
          if(I("get.dt")==2){
          	  $interport=D("interconfig");
    		  $upload->savePath="/interport/";
    		  $this->delfile("./Uploads/interport");
    		  $data=array();
              if($info=$upload->uploadOne($_FILES["file"])){
              	$filepath='./Uploads'.$info["savepath"].$info["savename"];
              	$xml=simplexml_load_file($filepath);
              	$xml=(array)$xml;
                foreach($xml as  $key=>$value){
                	$_POST[$key]=$value;
                }
              }

              if($interport->create()){
              	 $return=$interport->add();
              	 if($return){
              	 	$arr=array('code'=>200,'msg'=>'导入成功',data=>array(''));
			             echo json_encode($arr);
              	 }else{
                    $arr=array('code'=>110,'msg'=>'导入失败',data=>array(''));
			              echo json_encode($arr);
                 }
              }else{
                  print_r($interport->getError());
              }
          }
    }
    public function outportConfigAction(){
    	   if(I("get.dt")==1){
    	   	   $portConfig=D("portconfig");
    	   	   $data=$portConfig->order('id desc')->find();
    	   	   $str='<?xml version="1.0" encoding="utf-8" ?>';
    	   	   $str.='<post>';
    	   	   $str.='<speed>'.$data["speed"].'</speed>';
    	   	   $str.='<port>'.$data["port"].'</port>';
    	   	   $str.='<checkbit>'.$data["checkbit"].'</checkbit>';
    	   	   $str.='<databit>'.$data["databit"].'</databit>';
    	   	   $str.='<stopbit>'.$data["stopbit"].'</stopbit>';
    	   	   $str.='</post>';
    	   	   $this->delfile("./Uploads/xml");
    	   	   $filename="./Uploads/xml/port.xml";
    	   	   file_put_contents($filename, $str);
	           header("Content-Type:application/octet-stream");
	           header("content-disposition:attachment;filename=".'port'.date("YmdHis").'.xml');
	           header('Content-Length:'.filesize($filename));
	           readfile($filename);
    	   }
    	   if(I("get.dt")==2){
    	   	   $interport=D("interconfig");
    	   	   $data=$interport->order('id desc')->find();
    	   	   $str='<?xml version="1.0" encoding="utf-8" ?>';
    	   	   $str.='<post>';
    	   	   $str.='<ip>'.$data["ip"].'</ip>';
    	   	   $str.='<ipmask>'.$data["ipmask"].'</ipmask>';
    	   	   $str.="</post>";
    	   	   $this->delfile("./Uploads/xml");
    	   	   $filename="./Uploads/xml/inter.xml";
    	   	   file_put_contents($filename, $str);
    	   	   header("Content-Type:application/octet-stream");
	           header("content-disposition:attachment;filename=".'inter'.date("YmdHis").'.xml');
	           header('Content-Length:'.filesize($filename));
	           readfile($filename);
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
