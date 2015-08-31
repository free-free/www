<?php

class Response{
	protected static $default_type="json";
	/*
	*@description  convert data to json,ans return it
	*@param        int $code /status code
	*@param        string $msg   /notation message
	*@param        array  $data /return data 
	*@return        string 
	*
	*/
	public static function json($code,$msg,$data=array()){
		if(!is_numeric($code)){
			return '';
		}
		$result=array(
		'code'=>$code,
		'msg'=>$msg,
		'data'=>$data
		);
		return json_encode($result);
	}
	/*
	*@description  convert data to xml
	*@param        int $code /status code
	*@param        string $msg   /notation message
	*@param        array  $data /return data 
	*@return        string 
	*
	*/
	public static function xml($code,$msg,$data=array()){
		if(!is_numeric($code)){
			return '';
		}
		$result=array(
			'code'=>$code,
			'msg'=>$msg,
			'data'=>$data
		);
		return self::xmlEncode($result);
		/*$dom=new DOMdocument('1.0','utf-8');
		$root=$dom->createElement("root");
		$title=$dom->createElement('title');
		$title->appendChild($dom->createTextNode('vekou.com'));
		$content=$dom->createElement('content');
		$content->appendChild($dom->createTextNode('hello xml'));
		$root->appendChild($title);
		$root->appendChild($content);
		$dom->appendChild($root);
		echo $dom->save('./api.xml');
		*/
	}
	/*
	*@description  convert data to xml,ans return it
	*@param        array  $data 
	*@param        int $level /used to recursive
	*@return        string 
	*
	*/
	public static function xmlEncode($con,$level=1){
		if($level==1){
			$xml='<?xml version="1.0" encoding="utf-8" ?>';			    	    $xml.='<root>';
		}else{
			$xml='';
		}
		$start_label='';
		$end_label='';
		foreach($con as $key=>$value){
			if(is_numeric($key)){
				$start_label="<item id='{$level}{$key}'>";
				$end_label='</item>';
			}else{
				$start_label="<{$key}>";
				$end_label="</{$key}>";
			}
			$xml.=$start_label;
			$xml.=is_array($value)?self::xmlEncode($value,$level+1):$value;	
			$xml.=$end_label;
		}
		if($level==1){
			$xml.='</root>';
		}
		return $xml;
	}
	/*
	*@description  return data to client
	*@param        array $param 
	*@param       array  $response  /data
	*@return        string 
	*
	*/
	public static function returnData($response,$param=array()){
		   if(empty($param)){
                   	$return_type=isset($_GET['format'])?$_GET['format']:self::$default_type;
		   }else{
			$return_type=$param['format'];
		   }
		   switch(strtolower($return_type)){
			case 'json':
				header('content-type:application/json');	
				echo self::json($response['code'],$response['msg'],$response['data']);
				break;
			case 'xml':
				header('content-type:text/xml');	
				echo self::xml($response['code'],$response['msg'],$response['data']);
				break;	
			case 'array':	
				header('content-type:text/html');	
				echo $response;
				break;
			default:
				break;		
		   }		   
	}
}




?>
