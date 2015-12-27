<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>核辐射数据后台管理系统</title>
	<link rel="stylesheet" href="/Public/Css/Admin/default/base.css">
	<link rel="stylesheet" href="/Public/Css/Admin/Safemanage/passMod.css">
	<style type="text/css" media="screen">
	</style>
	<script src="/Public/Js/Admin/jquery-1.8.0.js" type="text/javascript">
	</script>
	<script src="/Public/Js/Admin/base.js" type="text/javascript"></script>
	<script src="/Public/Js/Admin/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="/Public/Js/Admin/Safemanage/passmod.js" type="text/javascript"></script>
</head>
<body>
	
	     <div id="title">
	     	<h1>核辐射数据后台管理系统</h1>
	     </div> 	
	

	
	    <div id="meaus">
	    <?php if(($power == 0) OR ($power == 1)): ?><ul class="uplist">
                 <li class="titlelist"><a href="">上传文件</a></li>
                 <li class="list"><a href="/index.php/Admin/Upload/newsUpload">新闻文件</a></li>
		         <li class="list"><a href="/index.php/Admin/Upload/reportUpload">报告文件</a></li>
		         <li class="list"><a href="/index.php/Admin/Upload/noticeUpload">通知文件</a></li>
            </ul>
            <ul class="infolist">
                 <li class="titlelist"><a href="">文件信息</a></li>
                 <li class="list"><a href="/index.php/Admin/Info/newsInfo">新闻信息</a></li>
		         <li class="list"><a href="/index.php/Admin/Info/reportInfo">报告信息</a></li>
		         <li class="list"><a href="/index.php/Admin/Info/noticeInfo">通知信息</a></li>
            </ul><?php endif; ?>
        <?php if($power == 0): ?><ul class="managelist">
                 <li class="passlist"><a href="">安全管理</a></li>
                 <li class="list"><a href="/index.php/Admin/Safemanage/passMod">修改密码</a></li>
		         <li class="list"><a href="/index.php/Admin/Safemanage/powerAdd">添加权限</a></li>
		         <li class="list"><a href="/index.php/Admin/Safemanage/powerInfo">权限改动</a></li>
		         <li class="list"><a href="/index.php/Admin/Safemanage/passQues">密保问题</a></li>
            </ul><?php endif; ?>
		</div>
	

	
    <div id="content">
       <h1>修改密码</h1>
       <form id="frm" method="post" action="/index.php/Admin/Safemanage/passMod">
          <ul class="passmod1">
              <li  class="list"><font color="red">*</font>密码</li>
              <li>
              <input type="hidden" name="user" value="<?php echo ($user); ?>">
              <input class="pass" type="password" name="oldpass" value="">
              <span style="color:red"></span>
              </li>
          </ul>
          <ul class="passmod2">
              <li  class="list"><font color="red">*</font>新密码</li>
              <li><input class="pass" type="password" name="password" value=""></li>
          </ul>
          <ul class="passmod3">
             <li  class="list"><font color="red">*</font>再次输入</li>
             <li><input class="pass" type="password" name="rpassword" value=""></li>
          </ul>
          <ul class="passmod4">
             <li  class="list"><font color="red">*</font>验证码</li>
             <li><input class="pass" type="text" name="code" value=""></li>
             <li ><img class="code" src="/index.php/Admin/Safemanage/vcode" alt="vcode" onclick="this.src='/index.php/Admin/Safemanage/vcode?random=+Math.random()'"></li>
          </ul>
          <li><input type="submit" class="submit" name="sub" value="确定" disabled></li>
       </form>
	</div>

	
	
		 <div id="end">
		 	<h1>携手共建和谐社会</h1>
		 	<h4><a href="/index.php/Admin/Index/logout">退出登录</a></h4>
		 </div>
	
</body>
</html>