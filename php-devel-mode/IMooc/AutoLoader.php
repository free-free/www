<?php


namespace IMooc;


class AutoLoader{
	public static function autoload($class){
		$file=ROOT.'/'.str_replace('\\','/',$class).'.php';
		require_once $file;
	} 
}
