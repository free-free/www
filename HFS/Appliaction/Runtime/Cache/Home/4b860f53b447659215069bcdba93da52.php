<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zn" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>data process page</title>
	<link rel="stylesheet" href="/Public/Css/Home/Index/header.css">
	<link rel="stylesheet" href="/Public/Css/Home/Dataprocess/dataprocess.css">
	<link rel="stylesheet" href="/Public/Plugins/datetimepicker/jquery.datetimepicker.css">

</head>
<body>
	<div class="header">
		<div class="container">
			<div class="header-top">
				<h1 class="header-title">核辐射数据采集与管理系统</h1>
			</div>
			<div class="nav">
				<ul class="nav-items">
					<li class="nav-item"><a href="index.html">首   页</a></li>
					<li class="nav-item"><a href="datapick.html">数据采集</a></li>
					<li class="nav-item"><a href="dataquery.html">数据查询</a></li>
					<li class="nav-item"><a href="dataprocess.html">数据处理</a></li>
					<li class="nav-item"><a href="aboutus.html">关于我们</a></li>
				</ul>
			</div>

		</div>
	</div>
	<div class="main">
		<div class="container">
			<div class="main-top">
				<h2 class="main-title">
					数据可视化
				</h2>
			</div>
			<div class="left-box">
				<div class="data-view">
				<!-- 	<div class="data-view-box">
					<div class="data-view-item">
						<div class="graphic">
						</div>
						<div class="graphic-desc">
						</div>
					</div>
				</div> -->
				<!--
					<div class="data-view-box">
						<div class="data-view-item">
							<h3 class="graphic-title">
									剂量率分布图
							</h3>
							<div class="graphic">
								
							</div>
							<div class="graphic-desc">
								
							</div>
						</div>
					</div>
					<div class="data-view-box">
						<div class="data-view-item">
							<h3 class="graphic-title">
									剂量率分布图
							</h3>
							
							<div class="graphic">
								
							</div>
							<div class="graphic-desc">
								
							</div>
						</div>
					</div>
					<div class="data-view-box">
						<div class="data-view-item">
							<h3 class="graphic-title">
									剂量率分布图
							</h3>
							<div class="graphic">
								
							</div>
							<div class="graphic-desc">
								
							</div>
						</div>
					</div>
				-->
				</div>
			</div>
			<div class="right-box">
				<div class="search-option-box">
					<dl>
						<dd><input type="checkbox" class="option" value="1"><span>剂量率</span></dd>
						<dd style="display:none" id="check1" class="device-option">
						
							<span>设备号:</span>
							<select class="device-list">
								<?php if(is_array($device_list[1])): $i = 0; $__LIST__ = $device_list[1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record): $mod = ($i % 2 );++$i;?><option value="<?php echo ($record["data"]); ?>" >
						  					<?php echo ($record["device_name"]); ?>
						  				</option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select> 
						</dd>
						<dd><input type="checkbox" class="option" value="2"><span>伽马能谱</span></dd>
						<dd style="display:none" id="check2"
						class="device-option">
							<span>设备号:</span>
							<select class="device-list">
								<?php if(is_array($device_list[2])): $i = 0; $__LIST__ = $device_list[2];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record): $mod = ($i % 2 );++$i;?><option value="<?php echo ($record["data"]); ?>" >
						  					<?php echo ($record["device_name"]); ?>
						  				</option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</dd>
						<dd><input type="checkbox" class="option" value="3"><span>伽马相机数据</span></dd>
						<dd style="display:none" id="check3"
						class="device-option">
							<span>设备号:</span>
							<select class="device-list">
								<?php if(is_array($device_list[3])): $i = 0; $__LIST__ = $device_list[3];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record): $mod = ($i % 2 );++$i;?><option value="<?php echo ($record["data"]); ?>" >
						  					<?php echo ($record["device_name"]); ?>
						  				</option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</dd>
						<dd><input type="checkbox" class="option" value="4"><span>空间辐射监测数据</span></dd>
						<dd style="display:none" id="check4"
						class="device-option">
							<span>设备号:</span>
							<select class="device-list">
								<?php if(is_array($device_list[4])): $i = 0; $__LIST__ = $device_list[4];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$record): $mod = ($i % 2 );++$i;?><option value="<?php echo ($record["data"]); ?>" >
						  					<?php echo ($record["device_name"]); ?>
						  				</option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</dd>
					</dl>
				</div>
				<div class="search-content-box">
					<dl>
						<dd><span>最小时间:</span></dd>
						<dd><input class="date l_date" type="text"></dd>
						<dd><span>最大时间:</span></dd>
						<dd><input class="date u_date"type="text"></dd>
						<!-- <dd><span>设备号:</span></dd>
						<dd><input class="device_name"type="text"></dd> -->
						
					</dl>
				</div>
				<div class="search-btn-box"><a class="search-btn" href="javascript:void(0);">搜索</a></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<p class="contact"><a href=""> 联系我们:19941222hb@gmail.com</a>|<a href="/index.php/Home/Index/logoShow">管理员登录</a></p>
			<p class="statement">Copyright 2015,All Rights Reserved. <span><a href="">智能信号检测与核仪器组</a></span> 版权所有 复制必究</p>
		</div>
	</div>
</body>
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript">window.jQuery||document.write('<script src="/Public/Js/Home/jquery-1.11.3.min.js"><\/script>');</script>
	<script type="text/javascript" src="/Public/Plugins/echarts/build/dist/echarts.js"></script>
	<script type="text/javascript" src="/Public/Plugins/datetimepicker/jquery.datetimepicker.js"></script>
     <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=0337c6cdfaf0902dc0dbe59a623c4449"></script>
    <script type="text/javascript" src="/Public/Js/Home/Dataprocess/dataprocess.js"></script>


</html>