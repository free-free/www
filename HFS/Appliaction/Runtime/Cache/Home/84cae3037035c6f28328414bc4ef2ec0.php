<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="/Public/Css/Home/Index/logoShow.css">
</head>
<body>
	<form id="frm" action="/index.php/Home/Index/logo" method="post">
	     <table>
	        <tr>
				<td><span>用户:</span></td>
				<td><span><input type="text" name="userName" /></span></td>
		    </tr>
		    <tr>
				<td><span>密码:</span></td>
				<td><span><input type="password" name="password" /></span></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="sub" value="LOGO" /></td>
			</tr>
	     </table>
	</form>
</body>
</html>