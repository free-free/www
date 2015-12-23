<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<style type="text/css" media="screen">
	 	.system-message{
	 		position: absolute;
	 		width:500px;
	 		left:400px;
	 		margin-top: 200px;
	 		background-color:   #6495ED ;
	 		border: 3px groove  #6495ED;
	 		box-shadow:10px 10px 25px #888888;
	 		-moz-box-shadow: 10px 10px 25px #888888; 
	 		border-bottom-left-radius: 15px;
	 		border-bottom-right-radius: 15px;
	 		border-top-left-radius: 15px;
	 		border-top-right-radius: 15px;
	 	}
	 	.message{
	 		font-weight: bold;
	 		font-size: 24px;
	 		margin-left: 30px;
	 		color:#FFFFFF;
	 	}
	 	.jump{
	 		font-weight: bold;
	 		font-size: 24px;
	 		margin-left: 30px;
	 		color:#FFFFFF ;
	 	}
	</style>
</head>
<body>
<div class="system-message">
<?php if(!empty($message)): ?><p class="message"><?php echo ($message); ?></p>
<?php else: ?>
<p class="message">你成功了！</p><?php endif; ?>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>