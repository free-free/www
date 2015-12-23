<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function indexAction(){
        $news=M("news");
        $report=M("report");
        $notice=M("notice");
        $newsData=$news->limit(6)->order("pTime desc")->select();
        $reportData=$report->limit(6)->order("pTime desc ")->select();
        $noticeData=$notice->limit(6)->order("pTime desc ")->select();
        $this->assign("newsData",$newsData);
        $this->assign("reportData",$reportData);
        $this->assign("noticeData",$noticeData);
        $this->display("Index:index");
    }
    public function moreContentAction(){
        $news=M("news");
        $report=M("report");
        $notice=M("notice");
        $allnewsData=$news->order("pTime desc")->select();
        $allreportData=$report->order("pTime desc ")->select();
        $allnoticeData=$notice->order("pTime desc ")->select();
        if(I("get.type")==1){
        $this->assign("allnewsData",$allnewsData);
        $this->display("Index::showNews");
        }
        if(I("get.type")==2){
        $this->assign("allreportData",$allreportData);
        $this->display("Index::showReport");
        }
        if(I("get.type")==3){
        $this->assign("allnoticeData",$allnoticeData);
        $this->display("Index::showNotice");
        }
    }
    public function logoShowAction(){
    	$this->display();
    }
    public function logoAction(){
    	if(IS_POST){
             $user=D("user");
             $condition["userName"]=I("post.userName");
             $condition["password"]=md5(I("post.password"));
             session("user",I("post.userName"));
             $data=$user->where($condition)->find();
             session("power",$data["userPower"]);
             if($data&&session('?user')){
             	$this->success('登录成功',__APP__.'/Admin/Index',3);
             }else{
             	$this->error('登录失败','logoShow',5);
             }
    	}
    }
    public function showNewsAction(){
          $news=M("news");
          $condition["id"]=I("get.id");
          $id=I("get.id");
          $allnewsData=$news->order("pTime desc")->select();
          $newsData=$news->where($condition)->find();
          $dir=date("Ymd",$newsData["pTime"]);
          $exts=explode(".",$newsData["name"]);
          $name=explode("_",$newsData["name"]);
          if($exts[1]=="txt"){
             $file="./Uploads/news/".$dir.'/'.$name[1];
             $this->assign('txt',$this->readTxt($file));
             $this->assign('title',$newsData["title"]);
             $this->assign('author',$newsData["author"]);
             $this->assign('descs',$newsData["descs"]);
             $this->assign('time',date("Y-m-d H:i:s",$newsData["pTime"]));
             $this->assign("id",$id);
             $this->assign("allnewsData",$allnewsData);
             $this->display();
          }else{
             $this->assign('title',$newsData["title"]);
             $this->assign('author',$newsData["author"]);
             $this->assign('time',date("Y-m-d H:i:s",$newsData["pTime"]));
             $this->assign('descs',$newsData["descs"]);
             $this->assign("allnewsData",$allnewsData);
             $this->assign("id",$id);
             $this->display('Index::showNews');
          }
          
    }
    public function showReportAction(){
          $report=M("report");
          $condition["id"]=I("get.id");
          $id=I("get.id");
          $allreportData=$report->order("pTime desc ")->select();
          $reportData=$report->where($condition)->find();
          $this->assign('title',$reportData["title"]);
          $this->assign('author',$reportData["author"]);
          $this->assign('time',date("Y-m-d H:i:s",$reportData["pTime"]));
          $this->assign('descs',$reportData["descs"]);
          $this->assign("allreportData",$allreportData);
          $this->assign("id",$id);
          $this->display('Index::showReport');
    
         
    }
    public function showNoticeAction(){
         $notice=M("notice");
         $condition["id"]=I("get.id");
         $allnoticeData=$notice->order("pTime desc ")->select();
         $noticeData=$notice->where($condition)->field("title,content,pTime,author")->find();
         $name=explode("_", $noticeData["title"]);
         $title=$name[0];
         $this->assign("title",$title);
         $this->assign("noticeData",$noticeData);
         $this->assign("allnoticeData",$allnoticeData);
         $this->display('Index::showNotice');
    }
    private function readTxt($data){//读取txt文件
        if(is_file($data)){
            $files=fopen($data,'r');
            $str="";
            while($content=fgets($files)){
                  $str=$str.$content;
            }
            fclose($data);
            return "<pre>".$this->convertUTF8($str)."</pre>";
        }else{
            return "无法在线阅读";
        }
    }
    private function convertUTF8($str){//将非UTF-8字符串转换为UTF-8
           if(empty($str)) return '';
           $encoding=mb_detect_encoding($str,array('UTF-8','GBK','LATIN1','BIG5'));
           if($encoding=='UTF-8'){
                return $str;
           }else{
                $str=mb_convert_encoding($str,'utf-8',$encoding);
                return $str;
           }
    }
}