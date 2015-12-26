<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>news page</title>
	<link rel="stylesheet" href="/Public/Css/Home/Index/header.css">
	<link rel="stylesheet" type="text/css" href="/Public/Css/Home/Index/showReport.css">
</head>
<body>
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
			<div class="l-side-box">
				<div class="related-box">
					<h3>相关学术报告</h3>
					<dl>
					  <?php if(is_array($allreportData)): $i = 0; $__LIST__ = $allreportData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lo): $mod = ($i % 2 );++$i;?><dd ><a href="/index.php/Home/Index/showReport?id=<?php echo ($lo["id"]); ?>" class="item"><span><?php echo ($lo["title"]); ?></span></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
					</dl>
				</div>
			</div>
			<div class="r-side-box">
					<h3 class="report-title"><?php echo ($title); ?></h3>
					<div class="report-content">
					<li class="report-info">
					    <?php if(!empty($author)): ?><span>作者：<?php echo ($author); ?></span><?php endif; ?>
					    <?php if(!empty($time)): ?><span>时间：<?php echo ($time); ?></span><?php endif; ?>
					</li>
					<div class="report-descs">
					<?php if(!empty($descs)): ?><span>简述：</span><?php echo ($descs); endif; ?>
					</div>
					<li class="report-link">
					<?php if(!empty($id)): ?><a href="/index.php/Home/Down/reportDownload?id=<?php echo ($id); ?>">请点击下载文件</a><?php endif; ?>
					</li>
					</div>
					
			</div>
			<div class="clearfix"></div>
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
	<script type="text/javascript">window.jQuery||document.write('<script src="/Public/Js/Home/jquery-1.11.3.min.js"><\/script>');</script>
   <script type="text/javascript" src="/Public/Js/Home/Index/news.js"></script>
</html>