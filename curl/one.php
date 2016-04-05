<?php


//one:
/*
$hand=curl_init("https://www.baidu.com");
curl_exec($hand);
curl_close($hand);
*/


//two:
/*
$handler=curl_init();
//download page from https site
curl_setopt($handler,CURLOPT_URL,"https://www.baidu.com");
curl_setopt($handler,CURLOPT_RETURNTRANSFER,true);
date_default_timezone_set('PRC');
curl_setopt($handler,CURLOPT_SSL_VERIFYPEER,0);
$output=curl_exec($handler);
curl_close($handler);
echo str_replace('百度',"BAIDU",$output);

*/
//three:
/*
$postData='theCityName=北京';
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL, 'http://www.webxml.com.cn/WebServices/WeatherWebService.asmx/getWeatherbyCityName');
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_HEADER, 0);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch,CURLOPT_HTTPHEADER,[
	"application/x-www-form-urlencoded;charset=utf-8",
	'Content-length:'.strlen($postData)
	]);
$back=curl_exec($ch);
if(!curl_errno($ch))
{
	echo $back;
}
else
{
	echo 'curl error:'.curl_error($ch);
}
curl_close($ch);
*/

//four:
/*
$postData="username=18281573692@163.com&password=huangbiao526114&remember=1";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL, "http://www.imooc.com/user/login");
curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
date_default_timezone_set("PRC");
curl_setopt($ch,CURLOPT_COOKIESESSION, TRUE);
curl_setopt($ch,CURLOPT_COOKIEFILE, 'cfile');
curl_setopt($ch,CURLOPT_COOLIEJAR, 'cfile');
curl_setopt($ch,CURLOPT_COOKIE, session_name().'='.session_id());
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER,[
	'application/x-www-form-urlencoded;charset=utf-8',
	'Content-length='.strlen($postData)
	]);
curl_exec($ch);
curl_setopt($ch,CURLOPT_URL, 'http://www.imooc.com/space/index');
curl_setopt($ch,CURLOPT_POST, 0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_HTTPHEADER, [
'Content-type:text/xml'
	]);
$output=curl_exec($ch);
curl_close($ch);
echo $output;
*/


//five:download file from ftp server

/*$ch=curl_init();
curl_setopt($ch,CURLOPT_URL, 'ftp://192.168.0.103/sqlite.py');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_TIEMOUT, 300);
curl_setopt($ch,CURLOPT_USERPWD, 'john:526114');
$fp=fopen('py.py','a+');
curl_setopt($ch,CURLOPT_FILE,$fp);
$back=curl_exec($ch);
fclose($fp);
if(!curl_errno($ch))
{
	echo 'RETURN '.$back.curl_getinfo($ch);
}
else
{
	echo 'CURL ERROR:'.curl_error($ch);
}
curl_close($ch);

*/

//six:upload file to ftp server
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL, 'ftp://192.168.0.103/uploadex.txt');
curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch,CURLOPT_HEADER, 0);
curl_setopt($ch,CURLOPT_TIMEOUT, 300);
curl_setopt($ch,CURLOPT_USERPWD, 'john:526114');
$fp=fopen('uploadex.txt','r');
curl_setopt($ch, CURLOPT_UPLOAD, TRUE);
curl_setopt($ch, CURLOPT_INFILE,$fp);
curl_setopt($ch,CURLOPT_INFILESIZE,filesize('uploadex.txt'));
$back=curl_exec($ch);
fclose($fp);
if(!curl_errno($ch))
{
	echo 'uploaded Successfully'.$back;
}
else
{
	echo 'curl error:'.curl_error($ch);
}
curl_close($ch);
?>