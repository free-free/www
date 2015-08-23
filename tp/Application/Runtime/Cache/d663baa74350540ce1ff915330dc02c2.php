<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html >
<head>
    <title>index template file</title>
	<meta http-equiv="Content-Type"  content="text/html;charset=utf-8"/>
</head>
<body>
  <!-- <?php echo ($info["name"]); ?>
  <br/>
  <?php echo ($info["age"]); ?>
  <br/>
  <?php echo (($info["sex"])?($info["sex"]):'male'); ?>
  <br/>
  <?php echo (substr(md5($info["name"]),0,5)); ?>
  <br/>
  <?php echo ($info['age']+10); ?>
  <br/>
  <?php echo (date('Y-m-d H:i:s',$time)); ?>
  <br/>
  <?php echo (THINK_VERSION); ?>
  <br/>
  <?php echo (date('Y-m-d g:i a',time())); ?>
  <br/>
  <?php echo ($_SERVER['HTTP_HOST']); ?>
  <br/> -->

  <!-- volist loop -->
  <?php if(is_array($people)): $i = 0; $__LIST__ = array_slice($people,1,2,true);if( count($__LIST__)==0 ) : echo "I have no data" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i; echo ($value['name']); ?>--->:<?php echo ($value['age']); ?><br/><?php endforeach; endif; else: echo "I have no data" ;endif; ?>
  <br/>
  <!-- foreach loop -->
  <?php if(is_array($people)): foreach($people as $key=>$value): echo ($value['name']); ?>====<?php echo ($value['age']); ?><br/><?php endforeach; endif; ?>

<!-- eq:=,neq:!=,gt:>,egt:>=,lt:<,elt:<=,heq:===,nheq:!== -->
<!-- for loop -->
<?php $__FOR_START_1656862088__=1;$__FOR_END_1656862088__=10;for($value=$__FOR_START_1656862088__;$value <= $__FOR_END_1656862088__;$value+=1){ echo ($value); ?><br/><?php } ?>
<!-- if else -->
<?php if($num > 10): ?>num >10<br/>
<?php elseif($num < 10): ?>
  num<10<br/>
<?php else: ?>
  num==10<br/><?php endif; ?>
<!-- switch -->
<?php switch($name): case "A": ?>A<br/><?php break;?>
  <?php case "B": ?>B<br/><?php break;?>
  <default>C<br/><?php endswitch;?>
<!-- comparison label -->
<?php if(($num) == "10"): ?>num ==10<br/><?php else: ?>num !=10<br/><?php endif; ?>
<?php if(($num) == "10"): ?>num ==10<br/><?php else: ?>num!=10<br/><?php endif; ?>
<!-- range label -->
<?php if(in_array(($num), explode(',',"8,9,10,11"))): ?>num is here <br/><?php endif; ?>
<?php if(!in_array(($num), explode(',',"1,2,3"))): ?>num is not here<br/><?php endif; ?>
<?php if(in_array(($num), explode(',',"8,9,10,11"))): ?>num is here<br/><?php else: ?> num is not here<br/><?php endif; ?>
<?php $_RANGE_VAR_=explode(',',"1,11");if($num>= $_RANGE_VAR_[0] && $num<= $_RANGE_VAR_[1]):?>num is here <br/><?php else: ?>num is not here<br/><?php endif; ?>
<?php if(in_array(($num), explode(',',"8,9,10,11"))): ?>num is here<br/><?php endif; ?>
<!-- three eye operator-->
<?php echo ($num >10?'greater than 10':'less or equal than 10'); ?>
</body>
</html>