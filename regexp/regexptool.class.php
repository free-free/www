<?php

class RegexpTool{
	private $validate=array(
		'require'=>'/./+/',
		'email'=>'/^\w+([.+-]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/',
		'url'=>'/^http(s?):\/\/(?:[A-Za-z0-9-]+\.)+[A-Za-z0-9]*/',
		'currency'=>'/^\d+(\.\d+)?$/',
		'number'=>'/^\d+$/',
		'zip'=>'/^\d{6}$/',
		'integer'=>'/^[-\W]?\d+$/',
		'double'=>'/^[-\+]?\d+(\.\d+)?$/',
		'english'=>'/^[A-Za-z]+$/',
		'qq'=>'/^\d{5,11}$/',
		'mobile'=>'/^1(3|4|5|7|8)\d{9}$'
		);
	private $isReturnMatchResult=false;
	private $fixMode=null;
	private $matches=array();
	private $isMatch=false;	
	public function __construct($result=false,$fix_mode=''){
		$this->isReturnMatchResult=$result;
		$this->fixMode=$fix_mode;	
	}
	private function regexp($pattern,$subject){
		if(array_key_exists(strtolower($pattern),$this->validate)){
			$pattern=$this->validate[$pattern].$this->fixMode;
		}		
		$this->isReturnMatchResult?
			preg_match_all($pattern,$subject,$this->matches):
			$this->isMatch=preg_match($pattern,$subject)===1;
		return $this->getMatchResult;
	}
	private function getMatchResult(){
		if($this->isReturnMatchResult){
			return $this->matches;
		}else{
			return $this->isMatch;
		}
	}
	public function toggleReturnType($bool=null){
		if($bool==null){
			$this->isReturnMatchResult=!$this->isReturnMatchResult;
		}else{
			$this->isReturnMatchResult=is_bool($bool)?$bool:(bool)$bool;
		}		
	}
	public function setFixMode($fix_mode){
		if(!empty($fix_mode)){
			$this->fixMode=$fix_mode;
		}
		return false;
	}
        public function noEmpty($str){
		return $this->regexp($this->validate['require'],$str);
	}
	public function isEmail($str){
		return $this->regexp($this->validate['email'],$str);
	}
	public function isPhoneNumber($number){
		return $this->regexp($this->validate['number'],$number);
	}
}


























?>
