<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<title>index page</title>
	<meta  charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/Public/Css/Home/Index/header.css">
	<link rel="stylesheet" type="text/css" href="/Public/Css/Home/Index/index.css">
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="bookmark" href="../favicon.ico">

</head>
<body>
	<!-- <div class="header">
		<div class="container">
			<div class="header-top">
				<h1 class="header-title">核辐射数据采集与管理系统</h1>
			</div>
			<div class="nav">
				<ul class="nav-items">
					<li class="nav-item"><a href="">首   页</a></li>
					<li class="nav-item"><a href="">数据采集</a></li>
					<li class="nav-item"><a href="">数据查询</a></li>
					<li class="nav-item"><a href="">数据处理</a></li>
					<li class="nav-item"><a href="">关于我们</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div> -->
	<div class="header">
		<div class="container">
			<div class="header-top">
				<h1 class="header-title">核辐射数据采集与管理系统</h1>
			</div>
			<div class="nav">
				<ul class="nav-items">
					<li class="nav-item"><a href="/index.php/Home/Index">首   页</a></li>
					<li class="nav-item"><a href="/index.php/Home/Datapick">数据采集</a></li>
					<li class="nav-item"><a href="/index.php/Home/Dataquery">数据查询</a></li>
					<li class="nav-item"><a href="/index.php/Home/Dataprocess">数据处理</a></li>
					<li class="nav-item"><a href="/index.php/Home/Aboutus">关于我们</a></li>
				</ul>
			</div>

		</div>
	</div>
	<div class="main">
		<div class="container">
			<div class="focus-img-box">
				<div class="focus-img">
					<img class="img1" src="/Public/Images/focus-img1.jpg" alt="">
					<img class="img2" src="/Public/Images/focus-img2.jpg" alt="">
					<img class="img3" src="/Public/Images/focus-img3.jpg" alt="">
					<img class="img4" src="/Public/Images/focus-img4.jpg" alt="">
					<img class="img5" src="/Public/Images/focus-img5.jpg" alt="">
				</div>
			    <div class="s-btns">
					<span id="0" class="s-btn on" ></span>
					<span id="1" class="s-btn"></span>
					<span id="2" class="s-btn"></span>
					<span id="3" class="s-btn"></span>
					<span id="4" class="s-btn"></span>
			    </div>
			</div>
			<div class="news-container">
				<div class="news-box">
					<div class="box-title"><h2>最新动态</h2><span><a href="/index.php/Home/Index/moreContent?type=1">更多&gt;&gt;</a></span></div>
					<div class="clearfix"></div>
					<ul class="news-ul">
						<!-- <li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li> -->
						<?php if(is_array($newsData)): $i = 0; $__LIST__ = $newsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="news-item"><a href="/index.php/Home/Index/showNews?id=<?php echo ($no["id"]); ?>"><?php echo ($no["title"]); ?>【文|<?php echo ($no["author"]); ?>】</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="news-box">
					<div class="box-title"><h2>学术交流</h2><span><a href="/index.php/Home/Index/moreContent?type=2">更多&gt;&gt;</a></span></div>
					<div class="clearfix"></div>
					<ul class="news-ul">
						<!-- <li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li> -->
						<?php if(is_array($reportData)): $i = 0; $__LIST__ = $reportData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ro): $mod = ($i % 2 );++$i;?><li class="news-item"><a href="/index.php/Home/Index/showReport?id=<?php echo ($ro["id"]); ?>"><?php echo ($ro["title"]); ?>【作者:<?php echo ($ro["author"]); ?>】</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="news-box">
					<div class="box-title"><h2>通知公告</h2><span><a href="/index.php/Home/Index/moreContent?type=3">更多&gt;&gt;</a></span></div>
					<div class="clearfix"></div>
					<ul class="news-ul">
						<!-- <li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li>
						<li class="news-item"><a href="">核辐射数据采集与管理系统</a></li> -->
						<?php if(is_array($noticeData)): $i = 0; $__LIST__ = $noticeData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$no): $mod = ($i % 2 );++$i;?><li class="news-item"><a href="/index.php/Home/Index/showNotice?id=<?php echo ($no["id"]); ?>">
						    <?php if(($no["important"]) == "3"): ?><font color='red'><?php echo ($no["title"]); ?></font><?php endif; ?>
						    <?php if(($no["important"]) == "2"): ?><font color='green'><?php echo ($no["title"]); ?></font><?php endif; ?>
						    <?php if(($no["important"]) == "1"): ?><font color='black'><?php echo ($no["title"]); ?></font><?php endif; ?>
						    </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="clearfix"></div>
		    </div>
		</div>
	</div>
	<div class="footer">
        
		<div class="container">
			<p class="contact"><a href="">联系我们:19941222hb@gmail.com</a>|<a href="/index.php/Home/Index/logoShow">管理员登录</a></p>
			<p class="statement">Copyright 2015,All Rights Reserved. <span><a href="">智能信号检测与核仪器组</a></span> 版权所有 复制必究</p>
		</div>
	</div>
</body>
<script type="text/javascript" src="/Public/Js/Home/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/Public/Js/Home/Index/index.js"></script>
</html>