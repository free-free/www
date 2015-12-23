<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>核辐射数据后台管理系统</title>
	<link rel="stylesheet" href="/HFS/Public/Css/Admin/default/base.css">
	<link rel="stylesheet" href="/HFS/Public/Css/Admin/Info/newsInfo.css">
	<style type="text/css" media="screen">
	</style>
	<script src="/HFS/Public/Js/Admin/jquery-1.8.0.js" type="text/javascript">
	</script>
	<script src="/HFS/Public/Js/Admin/base.js" type="text/javascript"></script>
	<script src="/HFS/Public/Js/Admin/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="" type="text/javascript"></script>
</head>
<body>
	
	     <div id="title">
	     	<h1>核辐射数据后台管理系统</h1>
	     </div> 	
	

	
	    <div id="meaus">
	    <?php if(($power == 1) OR ($power == 2)): ?><ul class="uplist">
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
        <?php if($power == 1): ?><ul class="managelist">
                 <li class="passlist"><a href="">安全管理</a></li>
                 <li class="list"><a href="/HFS/index.php/Admin/Safemanage/passMod">修改密码</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Safemanage/powerAdd">添加权限</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Safemanage/powerInfo">权限改动</a></li>
		         <li class="list"><a href="/HFS/index.php/Admin/Safemanage/passQues">密保问题</a></li>
            </ul><?php endif; ?>
		</div>
	

	
	<div id="content">
	<h1>新闻文件表单</h1>
	   <table>
	        <tr>
	            <td>文件名称</td>
	            <td>新闻题目</td>
	            <td>新闻作者</td>
	            <td>发布时间</td>
	            <td>操作</td>
	        </tr>
	      <?php if(is_array($newsData)): $i = 0; $__LIST__ = $newsData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lo): $mod = ($i % 2 );++$i;?><tr>
	            <td><?php echo ($lo["name"]); ?></td>
	            <td><?php echo ($lo["title"]); ?></td>
	            <td><?php echo ($lo["author"]); ?></td>
	            <td><?php echo (date("Y-m-d H:i:s",$lo["pTime"])); ?></td>
	            <td><a href="javascript:if(confirm('确实要删除该内容吗?'))location='/HFS/index.php/Admin/Action/newsDel?id=<?php echo ($lo["id"]); ?>'">删除</a>/<a href="/HFS/index.php/Admin/Action/newsMod?id=<?php echo ($lo["id"]); ?>">修改</a></td>
	        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	   </table>
	</div>

	
	
		 <div id="end">
		 	<h1>携手共建和谐社会</h1>
		 	<h4><a href="/HFS/index.php/Admin/Index/logout">退出登录</a></h4>
		 </div>
	
</body>
</html>