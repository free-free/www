<?php
  //创建一个自定义菜单
  
  //curl模拟GET请求，获取access_token
  $appid = "wx84eb5a098d6131f4";
   $appsecret = "8923f997a083adb5cbd3b4c5aba711df";
   $access_token_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$appsecret}";
 // $access_token_url ="http://localhost/index.php";
   $ch = curl_init();
   curl_setopt($ch,CURLOPT_URL,$access_token_url);
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   $outopt = curl_exec($ch);
  /* print_r($outopt);
   exit();*/
   $access_token_arr = json_decode($outopt,true);
   $access_token = $access_token_arr['access_token'];
   //curl模拟POST请求
   $create_menu_url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$access_token}";
   echo $create_menu_url,'<br/>';
   $jsonmenu=array("button"=>array(
   	array("type"=>'click',"name"=>'靠靠',"key"=>'靠靠'),
   	array("name"=>"song","sub_button"=>array(
   		array("type"=>"view","name"=>"fes","url"=>"http://www.soso.com","key"=>"V1001_HELLO_WORLD "),
   		array("type"=>"view","name"=>"json","url"=>"http://v.qq.com","key"=>"V1001_HELLO_WORLD "),
   		array("type"=>"click","name"=>"song","url"=>"http://www.soso.com","key"=>"djisduhd")
   		))

   	));
/*   $jsonmenu = '{=
	  "button":[
      {	
          "type":"click",
          "name":"song",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"json",
           "sub_button":[
            {	
               "type":"view",
               "name":"fes",
               "url":"http://www.soso.com/",
               "key":"dheuisdff"
            },
            {
               "type":"view",
               "name":"json",
               "url":"http://v.qq.com/",
               "key":"dfesfes"
            },
            {
               "type":"click",
               "name":"fdsf",
               "key":"fdejifjfi"
            }]
       }]
   }';*/

   $jsonmenu=json_encode($jsonmenu);
   echo $jsonmenu;
/*   curl_setopt($ch,CURLOPT_URL,$create_menu_url);
   curl_setopt($ch,CURLOPT_POST,1);//模拟POST
   curl_setopt($ch,CURLOPT_POSTFIELDS,$jsonmenu);//POST内容
   curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
   print_r(curl_exec($ch));
   curl_close($ch);*/
curl_setopt ( $ch, CURLOPT_URL,$create_menu_url );
curl_setopt ( $ch, CURLOPT_POST, 1 );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $jsonmenu );

print_r(curl_exec ( $ch ));
curl_close ( $ch );
?>
