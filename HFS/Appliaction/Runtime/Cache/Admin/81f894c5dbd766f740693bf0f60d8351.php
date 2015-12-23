<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>核辐射数据后台管理系统</title>
	<link rel="stylesheet" href="/HFS/Public/Css/Admin/default/base.css">
	<link rel="stylesheet" type="text/css" href="/HFS/Public/Css/Admin/Safemanage/powerAdd.css">
	<style type="text/css" media="screen">
	</style>
	<script src="/HFS/Public/Js/Admin/jquery-1.8.0.js" type="text/javascript">
	</script>
	<script src="/HFS/Public/Js/Admin/base.js" type="text/javascript"></script>
	<script src="/HFS/Public/Js/Admin/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="/HFS/Public/Js/Admin/Safemanage/poweradd.js" type="text/javascript"></script>
</head>
<body>
	
	     <div id="title">
	     	<h1>核辐射数据后台管理系统</h1>
	     </div> 	
	

	
	    <div id="meaus">
	    <?php if(($power == 0) OR ($power == 1)): ?><ul class="uplist">
                 <li class="titlelist"><a href="">上传文件</a></li>
                 <li class="list"><a href="/HFS/index.php/Admin/Upload/newsUpload">新闻文件</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Upload/reportUpload">报告文件</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Upload/noticeUpload">通知文件</a></li>
            </ul>
            <ul class="infolist">
                 <li class="titlelist"><a href="">文件信息</a></li>
                 <li class="list"><a href="/HFS/index.php/Admin/Info/newsInfo">新闻信息</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Info/reportInfo">报告信息</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Info/noticeInfo">通知信息</a></li>
            </ul><?php endif; ?>
        <?php if($power == 0): ?><ul class="managelist">
                 <li class="passlist"><a href="">安全管理</a></li>
                 <li class="list"><a href="/HFS/index.php/Admin/Safemanage/passMod">修改密码</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Safemanage/powerAdd">添加权限</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Safemanage/powerInfo">权限改动</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Safemanage/passQues">密保问题</a></li>
            </ul><?php endif; ?>
		</div>
	

	
    <div id="content">
        <h1>权限添加</h1>
        <form id="frm" method="post" action="/HFS/index.php/Admin/Safemanage/powerAdd">
             <ul class="poweradd1">
                 <li class="list"><font color="red">*</font>登录用户</li>
                 <li><input class="userlist" type="text" name="userName" value="">
                 <span style="color:red"></span></li>
             </ul>
             <ul class="poweradd2">
                 <li class="list"><font color="red">*</font>登录密码</li>
                 <li><input class="passlist" type="password" name="password" value=""><span style="color:red"></span></li>
             </ul>
             <ul class="poweradd3">
                 <li class="list"><font color="red">*</font>权限级别</li>
                 <li><select class="powerlist" name="userPower">
                 	   <option value="0" selected="selected">一级(所有权限)</option>
                 	   <option value="1">二级(信息发布权)</option>
                 	   <option value="2">三级(数据采集权)</option>
                 </select><span style="color:red"></span></li>
             </ul>
             <ul class="poweradd4">
                 <li class="list"><font color="red">*</font>真实姓名</li>
                 <li><input class="namelist" type="text" name="truename" value=""><span style="color:red"></span></li>
             </ul>
             <ul class="poweradd5">
                 <li class="list"><font color="red">*</font>学号</li>
                 <li><input class="idlist" type="text" name="studentID" value=""><span style="color:red"></span></li>
             </ul>
             <ul class="poweradd6">
                 <li class="list">学院</li>
                 <li><select class="collegelist" name="college">
                 	 <option value="0" selected="selected">信息工程学院</option>
                 	 <option value="1">计算机科学与技术学院</option>
                 	 <option value="2">国防科技学院</option>
                 	 <option value="3">制造科学与工程学院</option>
                 	 <option value="4">土木工程与建筑学院</option>
                 	 <option value="5">材料科学与工程学院</option>
                 	 <option value="6">环境与资源学院</option>
                 	 <option value="7">生命科学与工程学院</option>
                 	 <option value="8">理学院</option>
                 	 <option value="9">经济管理学院</option>
                 	 <option value="10">外国语学院</option>
                 	 <option value="11">法学院</option>
                 	 <option value="12">文学与艺术学院</option>
                 	 <option value="13">马克思主义学院</option>
                 	 <option value="14">体育学科部</option>
                 </select></li>
             </ul>
             <ul class="poweradd7">
                 <li class="list">专业</li>
                 <li><input class="majorlist" type="text" name="major" value=""></li>
             </ul>
             <ul class="poweradd8">
                 <li class="list">邮箱</li>
                 <li><input class="emaillist" type="text" name="email" value=""></li>
             </ul>
             <li><input class="submit" type="submit" name="sub" value="添加"></li>
        </form>
    </div>

	
	
		 <div id="end">
		 	<h1>携手共建和谐社会</h1>
		 	<h4><a href="/HFS/index.php/Admin/Index/logout">退出登录</a></h4>
		 </div>
	
</body>
</html>