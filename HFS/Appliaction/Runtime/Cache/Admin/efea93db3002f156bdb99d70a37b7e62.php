<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>核辐射数据后台管理系统</title>
	<link rel="stylesheet" href="/Public/Css/Admin/default/base.css">
	<link rel="stylesheet" href="/Public/Css/Admin/Upload/noticeUpload.css">
	<style type="text/css" media="screen">
	</style>
	<script src="/Public/Js/Admin/jquery-1.8.0.js" type="text/javascript">
	</script>
	<script src="/Public/Js/Admin/base.js" type="text/javascript"></script>
	<script src="/Public/Js/Admin/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="" type="text/javascript"></script>
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
	<h1>通知公告上传表单</h1>
	   <form id="frm" action="/index.php/Admin/Upload/noticeUpload" method="post" enctype="multipart/form-data">
	         <ul class="ulist1">
	         <label><li class="titlelist">通知题目</li>
	         <li ><input type="text" class="titletxt" name="title" size="28"/></li>
	         </label>
	         </ul>
	         <ul class="ulist2">
	         <label><li class="authorlist">通知发布者</li>
	         <li ><input type="text" class="authortxt" name="author" size="28"/></li>
	         </label>
	         </ul>
	         <ul class="ulist3">
	         <label><li class="contentlist">通知内容</li>
	         <li ><textarea class="contenttxt" name="content"></textarea></li>
	         </label>
	         </ul>
	         <ul class="ulist4">
	         <li class="imporatnt" style="margin-top:30px">重要程度</li>
	         <li class="radiolist" style="margin-top:30px">
	         <label><span>一级</span><input type="radio" name="important" value="1"/></label>
	         <label><sapn>二级</sapn><input type="radio" name="important" value="2"/></label>
	         <label><sapn>三级</sapn><input type="radio" name="important" value="3"/></label>
	         </li>
	         </ul>
	         <li ><input type="submit" class="submit" name="sub" value="发布"></li>
	     
	   </form>
	</div>

	
	
		 <div id="end">
		 	<h1>携手共建和谐社会</h1>
		 	<h4><a href="/index.php/Admin/Index/logout">退出登录</a></h4>
		 </div>
	
</body>
</html>