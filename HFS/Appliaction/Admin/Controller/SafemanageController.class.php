<?php
namespace  Admin\Controller;
use Think\Controller;
use Think\Model;
class SafemanageController extends Controller {
	public function indexAction(){
		  $cou=3;
          echo '$cou';
	}
	public function passModAction(){
		if(IS_POST){
			//print_r($_POST);
			if($this->check_verify(I("post.code"))){
				$user=D("User");
				$map['userName']=session("user");
				$map['password']=md5(I("post.oldpass"));
				$result=$user->where($map)->find();
				if($result&&$user->create()){
			        $condition["userName"]=session("user");
					$data["password"]=md5(I("post.password"));
					if($user->where($condition)->save($data)){
                        $this->success("密码修改成功",__APP__.'/Home/Index/logoShow',3);   
					 }else{
						$this->error($user->getError(),'passMod',3);
					}
				 }else{
					$this->error($user->getError(),'passMod',3);
				}
			}else{
				$this->error("验证码错误","passMod",3);
			}
		}
		$this->assign("power",session("power"));
		$this->assign("user",session("user"));
		$this->display();
	}
	public function powerAddAction(){
		if(IS_POST){
			$user=D("User");
			$_POST["password"]=md5(I("post.password"));
			if($user->create()){
                if($user->add()){
                	$this->success("添加成功",'powerAdd',3);
                }
            }
		}

		$this->assign("power",session("power"));
		$this->display();
	}
	public function checkAddAction(){
		$user=D("user");
		if(!$user->create($_POST,1)){
           $this->ajaxReturn($user->getError());
           return false;
		}else{
		  return true;
		}
	}
	public function checkModAction(){
		$user=D("user");
		if(!$user->create($_POST,2)){
           $this->ajaxReturn($user->getError());
           return false;
		}else{
		  return true;
		}
	}
	public function powerInfoAction(){
		$user=M("User");
		$data=$user->select();
		$this->assign("data",$data);
		$this->assign("power",session("power"));
		$this->display();
	}
	public function powerModAction(){
		$user=D("User");
		$_POST["id"]=I("get.id");
		$_POST["password"]=md5(I("post.password"));
		if(IS_POST){
		if($user->create()){
            if($user->save()){
                $this->success("权限改动成功",'powerInfo',3);
            }
        }
		}
		$map['id']=I("get.id");
		$data=$user->where($map)->find();
		$college=array("信息工程学院","计算机科学与技术学院","国防科技学院","制造科学与工程学院",
			           "土木工程与建筑学院","材料科学与工程学院","环境与资源学院","生命科学与工程学院",
			           "理学院","经济管理学院","外国语学院","法学院",
			           "文学与艺术学院","马克思主义学院","体育学科部");
		$userPower=array("一级(所有权限)","二级(信息发布权)","三级(数据采集权)");
		$this->assign("data",$data);
		$this->assign("power",session("power"));
		$this->assign("userPower",$userPower);
		$this->assign("college",$college);
		$this->assign("collegeValue",$data["college"]);
		$this->assign("powerValue",$data["userPower"]);
		$this->display();
	}
	public function powerDelAction(){
		$user=D("User");
		$condition["id"]=I("get.id");
		if($user->where($condition)->delete()){
		    $this->redirect('/Admin/Safemanage/powerInfo');
		}else{
		   	$this->error("删除失败",'/Admin/Safemanage/powerInfo',3);
		}
	}
	public function vcodeAction(){
        $Verify =  new \Think\Verify();
        $Verify->imageW="100";
        $Verify->imageH="26";
        $Verify->fontSize="14";
        $Verify->length=4;
        $Verify->entry();
	}
	public function check_verify($code, $id = ''){   
	    $verify = new \Think\Verify(); 
	    return $verify->check($code, $id);
	}
}