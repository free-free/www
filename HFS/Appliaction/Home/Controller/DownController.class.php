<?php
namespace Home\Controller;
use Think\Controller;
class DownController extends Controller {
    public function indexAction(){
    	
    }
    public function newsDownloadAction(){
    	 $news=M("news");
         $condition["id"]=I("get.id");
         $newsData=$news->where($condition)->find();
         $name=explode("_", $newsData["name"]);
         $dir=date("Ymd",$newsData["pTime"]);
         $filepath="./Uploads/news/".$dir."/".$name[1];
         header("Content-type: application/octet-stream;charset=utf-8");
         header("Content-Disposition: attachment; filename=".$newsData["name"]);
         header('Content-Length:'.filesize($filepath));
         readfile($filepath);
    }
    public function reportDownloadAction(){
    	 $report=M("report");
         $condition["id"]=I("get.id");
         $reportData=$report->where($condition)->find();
         $name=explode("_", $reportData["name"]);
         $dir=date("Ymd",$reportData["pTime"]);
         $filepath="./Uploads/reports/".$dir."/".$name[1];
         header("Content-type: application/octet-stream;charset=utf-8");
         header("Content-Disposition: attachment; filename=".$reportData["name"]);
         header('Content-Length:'.filesize($filepath));
         readfile($filepath);
    }
}