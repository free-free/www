<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Dataquery</title>
	<link rel="stylesheet" href="/HFS/Public/Css/Home/Index/header.css">
	<link rel="stylesheet" href="/HFS/Public/Plugins/datetimepicker/jquery.datetimepicker.css">
	<link rel="stylesheet" href="/HFS/Public/Css/Home/Dataquery/dataquery.css">
	
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
			<div class="search">
				<h2 class="search-title">
					数据查询
				</h2>
				<div class="search-box">
					<dl class="search-list">
						<dd class="search-item search-date">
							
							<label for="l_date">时间:</label>
							<span class="first_q_key"></span>
							<input type="text" class="date l_date">
							<span class="second_q_key">至</span>
							<input type="text" class="date u_date">
						<dd class="search-item search-name">
							<label for="s_name">名称:</label>
							<span class="first_q_key"></span>
							<!-- <input type="text" class="s_name" placeholder="请输入名称"> -->
							<select class="s_name">
								<option value="1" selected>剂量率</option>
								<option value="2">伽马能谱</option>
								<option value="3">伽马相机数据</option>
								<option value="4">空间辐射监测数据</option>
							</select>
						<dd class="search-item search-longitude">
							<label for="l_longitude">经度:</label>
							<span class="first_q_key">大于</span>
							<input type="text" class="l_longitude"  placeholder="请输入最小经度">
							<span class="second_q_key">小于</span>
							<input type="text" class="u_longitude" placeholder="请输入最大经度">
							<span class="lon_check_note" style="color:#f00;font-size:10px;display:inline-block;width:100px;text-align:left;"></span>
						</dd>
						<dd class="search-item search-latitude 
						 ">
						    <label for="l_latitude">纬度:</label>
						    <span class="first_q_key">大于</span>
							<input type="text" class="l_latitude" placeholder="请输入最小纬度">
							<span class="second_q_key">小于</span>
							<input type="text" class="u_latitude" placeholder="请输入最大纬度">
							<span class="lat_check_note" style="color:#f00;font-size:10px;display:inline-block;width:100px;text-align:left;"></span>
						</dd>			
					</dl>
					<div class="search-btn">
						<a href="javascript:void(0);" class="btn">查询</a>
					</div>
					<div class="search-tips">
					</div>
				</div>
			</div>
			<div class="data-box">
				<div class="data-desc">
					<h2 class="desc-title">
					查询结果
					</h2>
					<div class="desc-box">
						<span class="desc-item">名称</span>
						<span class="desc-item">时间</span>
						<span class="desc-item">经度</span>
						<span class="desc-item">纬度</span>
						<span class="desc-item"></span>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="datalist">
					<!--
					<div class="datalist-item " id="0">
						<dl>
							<dd class="data-info"><a href="">伽马相机数据</a></dd>
							<dd class="data-info"><a href="">2015-05-12</a></dd>
							<dd class="data-info"><a href="">198.32度</a></dd>
							<dd class="data-info"><a href="">123.12度</a></dd>
							<dd class="data-info data-operate">
								<span>
									<img src="images/file_download.png" alt="download">
								</span>
								<span>
								</span>
							</dd>
							<div class="clearfix"></div>
					    </dl>
					</div>
					<div class="datalist-item " id="1">
						<dl>
							<dd class="data-info">伽马相机数据</dd>
							<dd class="data-info">2015-05-12</dd>
							<dd class="data-info">198.32度</dd>
							<dd class="data-info">123.12度</dd>
							<dd class="data-info data-operate">
								<span><img src="images/file_download.png" alt="download"></span>
								<span></span>
							</dd>
							<div class="clearfix"></div>
						</dl>
					</div> 
					-->
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
	<script type="text/javascript" src="/HFS/Public/Plugins/datetimepicker/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="/HFS/Public/Js/Home/Dataquery/dataquery.js"></script>
    
</html>