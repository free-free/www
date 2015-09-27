<?php



namespace IMooc;

class Database{
	public function where ($where){
		echo $where,'<br/>';
		return $this;	
	}
	public function order($order){
		echo $order,'<br/>';
		return $this;
	}
	public function limit($limit){
		echo $limit,'<br/>';
		return $this;
	}

}



?>


