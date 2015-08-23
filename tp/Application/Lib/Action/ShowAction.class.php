<?php
class ShowAction extends Action{
	public function index(){
		echo U("Show/test",array("id"=>1,'name'=>'huangbiao'),'html',false,'localhost');
	}
	public function test(){
		echo 'this is test function<br/>';
		if(isset($_GET['id'])){
			echo 'id:'.$_GET['id'].'<br/>';
		}
		if(isset($_GET['name'])){
			echo 'name:'.$_GET['name'].'<br/>';
		}
	}
}


?>
