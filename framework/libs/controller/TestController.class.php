<?php
class TestController {
	public function index(){
		$m=M("test");
		$v=V('test');
		$data=$m->getAll();
		$v->display($data);
	}
	public function login(){
		$m=M('test');
		$v=V('test');
		$data=$m->getUserInfo();
		$v->display($data);
	}

}



?>