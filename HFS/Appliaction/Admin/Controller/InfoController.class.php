<?php
namespace Admin\Controller;
use Think\Controller;
class InfoController extends Controller {
	public function indexAction(){

	}
	public function newsInfoAction(){
		$news=M("news");
		$newsData=$news->order("pTime desc")->select();
		$this->assign("newsData",$newsData);
		$this->assign("power",session("power"));
		$this->display();
	}
	public function reportInfoAction(){
		$report=M("report");
		$reportData=$report->order("pTime desc")->select();
		$this->assign("reportData",$reportData);
		$this->assign("power",session("power"));
		$this->display();
	}
	public function noticeInfoAction(){
		$notice=M("notice");
		$noticeData=$notice->order("pTime desc")->select();
		$this->assign("noticeData",$noticeData);
		$this->assign("power",session("power"));
		$this->display();
	}
}