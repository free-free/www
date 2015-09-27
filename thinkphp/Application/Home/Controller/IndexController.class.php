<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
   /* public function _before_index(){
    	echo 'I am before<br/>';
    }*/
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	// $this->assign('age',19);
    	// $this->assign('likes',array('Mom','Dad','Sister'));
    	// $this->assign('money',0);
       	
     	// $this->display();
     	//sayHi(); //call your self defined function
     	// echo 'I am index <br/>';
     	/*echo I('param.id');
     	echo I('id');
     	echo I('get.id');*/
     	/*if(IS_GET){
     		echo 'this get request';
     	}else{
     		echo 'this not get request';
     	}*/
     	$this->display();
    }
 /*   public function _after_index(){
    	echo 'I am after <br/>';
    }*/
    public function createUser(){
    	$user=M('User');
    	if($user->create()){
    		$user->add();
    		$this->success('login successful',10);
    	}else{
    		$this->error('login failed!',20);
    	}

    }
}