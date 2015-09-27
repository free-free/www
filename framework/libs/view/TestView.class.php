<?php



class TestView {
	public function display($data){
		if(is_string($data)){
			echo $data;
		}else{
			print_r($data);
		}
	}
}

?>