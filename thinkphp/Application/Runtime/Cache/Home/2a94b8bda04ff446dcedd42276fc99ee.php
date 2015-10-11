<?php if (!defined('THINK_PATH')) exit();?><!-- <p>I am <?php echo ($age); ?> years old</p>
<p>I am a <?php if(($age) > "18"): ?>man<?php else: ?>child<?php endif; ?></p>
<?php if(is_array($likes)): $i = 0; $__LIST__ = $likes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$like): $mod = ($i % 2 );++$i;?><p>I like <?php echo ($like); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
<p>
	<?php if(empty($money)): ?>I have no money,but I am aggressive ,ambition<?php endif; ?>
</p>
 -->

 <!-- <form action="/thinkphp/home/index/createUser" method="POST">
 	user name:<input type="text" name="user_name"><br/>
 	email:<input type="text" name="email"><br/>
 	password<input type="password" name="password"><br/>
 	<input type="submit"  value="login">
 </form> -->
 <html>
 <head>
 	<style type="text/css">
 	*{
 		margin: 0;
 		padding:0;
 	}
	.div{
		height: 100%;
		background-color: #0ba;
	}
 	</style>
 </head>
 <body>
 <div class='div'>
 	
 		<if condition="$num eq 0">
 			num is equal to 0
 		<elseif  condition="$num lt 0"/>
	        num is smaller than 0
	     <else/>
	     	num is bigger than 0
	    </if>
 	
 </div>
</body>
 </html>