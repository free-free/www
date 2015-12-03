<?php

   define("TOKEN", "weixin");
   $wechatObj = new wechatCallbackapiTest();
   if (!isset($_GET['echostr'])){
	   //调用响应消息函数
  	 $wechatObj->responseMsg();
   }else{
	   //实现网址接入
      $wechatObj->valid();
   }  

class wechatCallbackapiTest
{
	//验证消息
    public function valid()
    {
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }		 
    }

	//检查签名
    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

	//响应消息
    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);
            switch($RX_TYPE)
			{
				case "event":
				  $result = $this->receiveEvent($postObj);
				  break;
				case "text":
				  $result = $this->receiveText($postObj);
				  break;
				case "image":
				  $result = $this->receiveImage($postObj);
				  break;
				case "voice":
				  $result = $this->receiveVoice($postObj);
				  break;
				case "video":
				  $result = $this->receiveVideo($postObj);
				  break;
				case "location":
				  $result = $this->receiveLocation($postObj);
				  break;
				case "link":
				  $result = $this->receiveLink($postObj);
				  break;
				default:
				  $result = "unknow msg type: ".$RX_TYPE;
				  break;
			}
			echo $result;
        }else{
            echo "hello";
            exit;
        }
    }
	
	//接收事件推送
	private function receiveEvent($object)
	{
		$content = "";
		switch($object->Event)
		{
			case "subscribe":
			  $content = array();
			  $content[] = array("Title"=>"多图文标题1","Description"=>"多图文内容1",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://www.ptu.edu.cn/"
			                  );
			  $content[] = array("Title"=>"多图文标题2","Description"=>"多图文内容3",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://www.ptu.edu.cn/"
			                  );
			  $content[] = array("Title"=>"多图文标题3","Description"=>"多图文内容3",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://www.ptu.edu.cn/"
			                  );
			  break;
			case "unsubscribe":
			  $content = "取消关注";
			  break;
			case "click":
			  switch($object->EventKey)
			  {
				  case "1":
				    $content = array();
				    $content[] = array("Title"=>"多图文标题1","Description"=>"多图文内容1",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://www.ptu.edu.cn/"
			                  );
					break;
				  case "赞一下我们":
				    $content = array();
				    $content[] = array("Title"=>"多图文标题1","Description"=>"多图文内容1",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://www.ptu.edu.cn/"
			                  );
					break;
			  }
			  break;
		}
		$result = $this->transmitNews($object,$content);
		return $result;
		
	}
	
	
	//接收文本消息
	private function receiveText($object)
	{
		$keyword = trim($object->Content);
		
		if($keyword == "文本")
		{
			//回复文本消息
			$content = "这是个文本消息，内容是：".$object->Content;
			$result = $this->transmitText($object,$content);
		}
		else if($keyword == "单图文")
		{
			//回复单图文消息
			$content = array();
			$content[] = array("Title"=>"单图文标题","Description"=>"单图文内容",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://apix.sinaapp.com/weather/?appkey="
			                  );
		    $result = $this->transmitNews($object,$content);
		}
		else if($keyword == "多图文")
		{
			//回复多图文消息
			$content = array();
			$content[] = array("Title"=>"多图文标题1","Description"=>"多图文内容1",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://www.ptu.edu.cn/"
			                  );
			$content[] = array("Title"=>"多图文标题2","Description"=>"多图文内容1",
			                   "PicUrl"=>"http://discuz.comli.com/weixin/weather/icon/cartoon.jpg",
							   "Url"=>"http://www.ptu.edu.cn/"
			                  );
			$result = $this->transmitNews($object,$content);
		}
		else if($keyword == "音乐")
		{
			//回复音乐消息
			$content = array("Title"=>"音乐库","Description"=>"百度随心听",
			                 "MusicUrl"=>"http://play.baidu.com/?__m=mboxCtrl.playSong&__a=121889450&__o=song/121889450||playBtn&fr=-1||music.baidu.com#",
							 "HQMusicUrl"=>"http://play.baidu.com/?__m=mboxCtrl.playSong&__a=121889450&__o=song/121889450||playBtn&fr=-1||music.baidu.com#"
			                );
			$result = $this->transmitMusic($object,$content);
		}
		return $result;
	}
	
	//接收图片消息
	private function receiveImage($object)
	{
		//获取图片消息内容
		$imageArray = array(
		        "PicUrl"=>$object->PicUrl,
				"MediaId"=>$object->MediaId
		        );
		$result = $this->transmitImage($object,$imageArray);
		return $result;
	}
	
	//接收语音消息
	private function receiveVoice($object)
	{
		//获取语音消息内容
		$voiceArray = array(
				"MediaId"=>$object->MediaId,
				"Format"=>$object->Format
		        );
		$result = $this->transmitVoice($object,$voiceArray);
		return $result;
	}
	
	//接收视频消息
	private function receiveVideo($object)
	{
		//获取视频消息内容
		$videoArray = array(
		        "MediaId"=>$object->MediaId,
				"ThumbMediaId"=>$object->ThumbMediaId
		        );
		$result = $this->transmitVideo($object,$videoArray);
		return $result;
	}
	
	//接收链接消息
	private function receiveLink($object)
	{
		//获取链接消息内容
		$content = "你发送的是链接，标题为：".$object->Title."；内容为：
		".$object->Description."；链接地址为：".$object->Url."；位置为：".$object->Label;
		$result = $this->transmitText($object,$content);
		return $result;
	}
	
	//接收地理位置消息
	private function receiveLocation($object)
	{
		//获取地理位置内容
		$content = "你发送的是地理位置，纬度为：".$object->Location_X."；经度为：
		".$object->Location_Y."；缩放级别为：".$object->Scale."；位置为：".$object->Label;
		$result = $this->transmitText($object,$content);
		return $result;
	}
	
	//回复文本消息
	private function transmitText($object,$content)
	{
		$textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[text]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>";
		//返回一个XML数据包
		$result = sprintf($textTpl,$object->FromUserName,$object->ToUserName,time(),$content);
	    return $result;
	}
	//回复图片消息
	private function transmitImage($object,$imageArray)
	{
		$itemTpl = "<Image>
                    <MediaId><![CDATA[%s]]></MediaId>
                    </Image>";
	    $item_str = sprintf($itemTpl,$imageArray['MediaId']);
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[image]]></MsgType>
					$item_str
                    </xml>";
		//返回一个XML数据包
		$result = sprintf($textTpl,$object->FromUserName,$object->ToUserName,time());
	    return $result;
	}
	//回复语音消息
	private function transmitVoice($object,$voiceArray)
	{
		$itemTpl = "<Voice>
                    <MediaId><![CDATA[%s]]></MediaId>
                    </Voice>";
	    $item_str = sprintf($itemTpl,$voiceArray['MediaId']);
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[voice]]></MsgType>
					$item_str
                    </xml>";
		//返回一个XML数据包
		$result = sprintf($textTpl,$object->FromUserName,$object->ToUserName,time());
	    return $result;
	}
	
	//回复视频消息
	private function transmitVideo($object,$videoArray)
	{
		$itemTpl = "<Video>
                    <MediaId><![CDATA[%s]]></MediaId>
					<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                    </Video>";
	    $item_str = sprintf($itemTpl,$videoArray['MediaId'],$videoArray['ThumbMediaId']);
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[video]]></MsgType>
					$item_str
                    </xml>";
		//返回一个XML数据包
		$result = sprintf($textTpl,$object->FromUserName,$object->ToUserName,time());
	    return $result;
	}
	
	//回复音乐消息
	private function transmitMusic($object,$musicArray)
	{
		$itemTpl = "<Music>
                    <Title><![CDATA[%s]]></Title>
                    <Description><![CDATA[%s]]></Description>
                    <MusicUrl><![CDATA[%s]]></MusicUrl>
                    <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                    </Music>";
	    $item_str = sprintf($itemTpl,$musicArray['Title'],$musicArray['Description'],
		                    $musicArray['MusicUrl'],$musicArray['HQMusicUrl']);
        $textTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[music]]></MsgType>
					$item_str
                    </xml>";
		//返回一个XML数据包
		$result = sprintf($textTpl,$object->FromUserName,$object->ToUserName,time());
	    return $result;
	}
	
	//回复图文消息
	private function transmitNews($object,$arr_item)
	{
		if(!is_array($arr_item))
			return;
		
		$itemTpl = "<item>
                    <Title><![CDATA[%s]]></Title> 
                    <Description><![CDATA[%s]]></Description>
                    <PicUrl><![CDATA[%s]]></PicUrl>
                    <Url><![CDATA[%s]]></Url>
                    </item>";
		 $item_str = "";
         foreach($arr_item as $item)
            $item_str .= sprintf($itemTpl,$item['Title'],$item['Description'],$item['PicUrl'],$item['Url']);		 
		
		$newsTpl = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[news]]></MsgType>
					<Content><![CDATA[]]></Content>
                    <ArticleCount>%s</ArticleCount>
                    <Articles>
					$item_str</Articles>
                    </xml> ";
		//返回一个XML数据包
		$result = sprintf($newsTpl,$object->FromUserName,$object->ToUserName,time(),count($arr_item));
	    return $result;
	}
}
?>