<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>data picking</title>
<meta charset="utf-8">
<link rel="stylesheet" href="/HFS/Public/Css/Home/Index/header.css">
<link rel="stylesheet" type="text/css" href="/HFS/Public/Css/Home/Datapick/datapick.css">
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<h1 class="header-title">核辐射数据采集与管理系统</h1>
			</div>
			<div class="nav">
				<ul class="nav-items">
					<li class="nav-item"><a href="/HFS/index.php/Home/Index">首   页</a></li>
					<li class="nav-item"><a href="/HFS/index.php/Home/Datapick">数据采集</a></li>
					<li class="nav-item"><a href="/HFS/index.php/Home/Dataquery">数据查询</a></li>
					<li class="nav-item"><a href="/HFS/index.php/Home/Dataprocess">数据处理</a></li>
					<li class="nav-item"><a href="/HFS/index.php/Home/Aboutus">关于我们</a></li>
				</ul>
			</div>

		</div>
	</div>
	<div class="main">
		<div class="container">
			<div class="main-top">
				<h2 class="main-title">采集设备参数配置</h2>
     			<div class="device-operate-box">
					<span class="cur-device">当前设备:</span>
					<select class="device-list" name="deviceList">
						<option value="1" selected="selected" >串口</option>
						<option value="2">网络接口</option>
					</select>
					<div class="param-load-btns">
						<a class="file-select" href="javascript:void(0);"><input type="file" name="file" id="file" class="up-file"><span><img src="/HFS/Public/Images/file_upload.png" alt="选择文件"></span></a>
						<a class="btn  param-upload-btn" href="javascript:;">参数导入</a>
						<a class="btn  param-download-btn" href="">参数导出</a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="device">

				 	<div id="1" class="device-box" >
				 		<div class="specific-device com">
						 	<p class="param "><span class="d_name">波特率:</span><input class="d_input" type="text" name="speed" value="<?php echo ($portData["speed"]); ?>"></p>
						 	<p class="param "><span class="d_name">端口号:</span><input class="d_input" type="text" name="port" value="<?php echo ($portData["port"]); ?>"></p>
						 	<p class="param "><span class="d_name">校验位:</span><input class="d_input" type="text" name="checkbit" value="<?php echo ($portData["checkbit"]); ?>"></p>
						 	<p class="param "><span class="d_name">数据位:</span><input class="d_input" type="text" name="databit" value="<?php echo ($portData["databit"]); ?>"></p>
						 	<p class="param "><span class="d_name">停止位:</span><input class="d_input" type="text" name="stopbit" value="<?php echo ($portData["stopbit"]); ?>"></p>
						 	 <div class="device-btns" >
					 	   	   <a class="btn clear" href="javascript:void(0);">清   除</a>
					 	   	   <a class="btn save" href="javascript:void(0);">保   存</a>
					 	   	   <a class="btn fix" href="javascript:void(0);">修   改</a>
				 	 		  </div>
				 	   </div>
				 	   <div class="param-note">
				 	   	
				 	   </div>
				 	  
				    </div>
				 <div id="2" class="device-box">	
					<div class="specific-device internet-interface">
						<p class="param "><span class="d_name">IP地址:</span><input class="d_input" type="text" name="ip" value="<?php echo ($interData["ip"]); ?>"></p>
						<p class="param "><span class="d_name">子网掩码:</span><input class="d_input" type="text" name="ipmask" value="<?php echo ($interData["ipmask"]); ?>"></p>
						<div class="device-btns" >
					 	   	   <a class="btn clear" href="javascript:void(0);">清   除</a>
					 	   	   <a class="btn save" href="javascript:void(0);">保   存</a>
					 	   	   <a class="btn fix" href="javascript:void(0);">修   改</a>
				 	 	</div>
					</div>
					<div class="param-note">
				 	   	
				 	</div>

				</div>
				
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<p class="contact"><a href=""> 联系我们:19941222hb@gmail.com</a></p>
			<p class="statement">Copyright 2015,All Rights Reserved. <span><a href="">智能信号检测与核仪器组</a></span> 版权所有 复制必究</p>
		</div>
	</div>
</body>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">window.jQuery||document.write('<script src="/HFS/Public/Js/Home/jquery-1.11.3.min.js"><\/script>');</script>
<script type="text/javascript" src="/HFS/Public/Js/Home/Datapick/datapick.js"></script>
</html>