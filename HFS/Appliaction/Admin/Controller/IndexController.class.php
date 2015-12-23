<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function indexAction(){
    	if(session("?user")){
    		$this->assign("time",time());
            $this->assign("power",session("power"));
            $this->display();
    	}else{
    		$this->error('请先登录',__APP__.'/Home/Index/logoShow',3);
    	}
    	
    }
    public function logoutAction(){
        session(null);
        $this->redirect('Home/Index/index','',3,'页面跳转中');
    }
}