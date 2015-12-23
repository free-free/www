<?php
namespace Admin\Controller;
use Think\Controller;
class UploadController extends Controller {
    public function indexAction(){
        $this->display();
    }
    public function newsUploadAction(){
    	if(IS_POST){
    		$upload=new \Think\Upload();
    		$upload->rootPath="./Uploads";
    		$upload->savePath="/news/";
    		$upload->exts=array('txt', 'doc','docx','wps');
    		$upload->autoSub=true;
            $upload->subName=array('date','Ymd');
            $upload->saveName=array('date','YmdHis');
            if($info=$upload->uploadOne($_FILES["news"])){
               $news=D("news");
               $_POST["pTime"]=time();
               $_POST["name"]=$_POST["title"].'_'.$info["savename"];
               if($news->create()){
                $news->add();
                $this->success("上传成功","newsUpload",3);
               }else{
               	unlink('./Uploads'.$info["savepath"].$info["savename"]);
               	$this->error("上传失败1","newsUpload",3);
               }
            }else{
            	unlink('./Uploads'.$info["savepath"].$info["savename"]);
            	$this->error($upload->getError(),"newsUpload",3);
            }
    	}
        $this->assign("power",session("power"));
        $this->display();
    }
    public function reportUploadAction(){
    	if(IS_POST){
    		$upload=new \Think\Upload();
    		$upload->rootPath="./Uploads";
    		$upload->savePath="/reports/";
    		$upload->exts=array('doc','docx','ppt','pptx','wps');
    		$upload->autoSub=true;
            $upload->subName=array('date','Ymd');
            $upload->saveName=array('date','YmdHis');
            if($info=$upload->uploadOne($_FILES["report"])){
               $report=D("report");
               $_POST["pTime"]=time();
               $_POST["name"]=$_POST["title"].'_'.$info["savename"];
               if($report->create()){
                  $report->add();
                  $this->success("上传成功","reportUpload",3);
               }else{
               	unlink('./Uploads'.$info["savepath"].$info["savename"]);
               	$this->error("上传失败1","reportUpload",5);
               }
            }else{
            	unlink('./Uploads'.$info["savepath"].$info["savename"]);
            	$this->error($upload->getError(),"reportUpload",5);
            }
    	}
        $this->assign("power",session("power"));
        $this->display();
    }
    public function noticeUploadAction(){
    	if(IS_POST){
    		 $notice=D("notice");
         $_POST["pTime"]=time();
         $_POST["title"]=I("post.title");
         $_POST["name"]=I("post.title").'_'.date("YmdHis");
         if($notice->create()){
             $notice->add();
             $this->success('发布成功','',3);
         }else{
             $this->error('发布失败','noticeUpload',3);
         }
    	}
        $this->assign("power",session("power"));
        $this->display();
    }
}