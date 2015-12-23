<?php
namespace Admin\Controller;
use Think\Controller;
class ActionController extends Controller {
	public function indexAction(){
          echo $this->is_empty_dir("./Uploads/news/20151024/") ;
	}
	public function newsModAction(){
		   $news=D("news");
		   $condition["id"]=I("get.id");
		   $newsData=$news->where($condition)->find();
		   if(IS_POST){
              if($news->create()){
              	if($news->where($condition)->save()){
              	   $this->success("修改成功","newsMod?id=".I("get.id"),3);
              	}
              }else{
              	 $this->error("修改失败","newsMod",3);
              }
		   }
		   $this->assign("id",I("get.id"));
		   $this->assign("newsData",$newsData);
		   $this->assign("power",session("power"));
           $this->display();
	}
	public function newsDelAction(){
           $news=D("news");
		   $condition["id"]=I("get.id");
		   $newsData=$news->where($condition)->find();
		   $name=explode("_", $newsData["name"]);
		   $dir=date("Ymd",$newsData["pTime"]);
		   if($news->where($condition)->delete()){
		       unlink("./Uploads/news/".$dir."/".$name[1]);
               if($this->is_empty_dir("./Uploads/news/".$dir."/")){
               	 rmdir("./Uploads/news/".$dir."/");
               }
		       $this->redirect('/Admin/Info/newsInfo');
		   }else{
		   	   $this->error("删除失败",'/HFS/index.php/Admin/Info/newsInfo',3);
		   }
	}
	public function reportModAction(){
           $report=D("report");
		   $condition["id"]=I("get.id");
		   $reportData=$report->where($condition)->find();
		   if(IS_POST){
              if($report->create()){
              	if($report->where($condition)->save()){
              	   $this->success("修改成功","reportMod?id=".I("get.id"),3);
              	}
              }else{
              	 $this->error("修改失败","reportMod",3);
              }
		   }
		   $this->assign("id",I("get.id"));
		   $this->assign("reportData",$reportData);
		   $this->assign("power",session("power"));
           $this->display();
	}
	public function reportDelAction(){
           $report=D("report");
		   $condition["id"]=I("get.id");
		   $reportData=$report->where($condition)->find();
		   $name=explode("_", $reportData["name"]);
		   $dir=date("Ymd",$reportData["pTime"]);
		   if($report->where($condition)->delete()){
		       unlink("./Uploads/reports/".$dir."/".$name[1]);
		        if($this->is_empty_dir("./Uploads/reports/".$dir."/")){
               	 rmdir("./Uploads/reports/".$dir."/");
               }
		       $this->redirect('/Admin/Info/reportInfo');
		   }else{
		   	   $this->error("删除失败",'/HFS/index.php/Admin/Info/reportInfo',3);
		   }
	}
	public function noticeModAction(){
           $notice=D("notice");
		   $condition["id"]=I("get.id");
		   $noticeData=$notice->where($condition)->find();
		   if(IS_POST){
              if($notice->create()){
              	if($notice->where($condition)->save()){
              	   $this->success("修改成功","noticeMod?id=".I("get.id"),3);
              	}
              }else{
              	 $this->error("修改失败","noticeMod",3);
              }
		   }
		   $this->assign("id",I("get.id"));
		   $this->assign("noticeData",$noticeData);
		   $this->assign("power",session("power"));
           $this->display();
	}
	public function noticeDelAction(){
           $notice=D("notice");
		   $condition["id"]=I("get.id");
		   if($notice->where($condition)->delete()){
		       $this->redirect('/Admin/Info/noticeInfo');
		   }else{
		   	   $this->error("删除失败",'/Admin/Info/noticeInfo',3);
		   }
	}
	private function is_empty_dir($fp){    
           $file=@opendir($fp); 
           $i=0;    
           while(readdir($file)){    
            $i++;    
           }    
           closedir($file);    
           if($i>2){ 
            return false; 
           }else{ 
            return true;  //true
           } 
    } 
}