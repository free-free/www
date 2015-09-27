<?php /* Smarty version 3.1.27, created on 2015-09-12 18:39:20
         compiled from "/var/www/smarty/template/index.html" */ ?>
<?php
/*%%SmartyHeaderCode:37634739155f400d8d42d65_83406541%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18dfc92fa97bb12630df32310e0171c26302eced' => 
    array (
      0 => '/var/www/smarty/template/index.html',
      1 => 1442054355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37634739155f400d8d42d65_83406541',
  'variables' => 
  array (
    'value' => 0,
    'x' => 0,
    'time' => 0,
    'data' => 0,
    'it' => 0,
    'num' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55f400d8da81d9_65257403',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f400d8da81d9_65257403')) {
function content_55f400d8da81d9_65257403 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once '/var/www/smarty/libs/plugins/modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/smarty/libs/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '37634739155f400d8d42d65_83406541';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Smarty</title>
</head>
<body>
	<p><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['value']->value);?>
</p>
	<p><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['value']->value, 'UTF-8');?>
</p>
	<p><?php echo ($_smarty_tpl->tpl_vars['value']->value).('Hi Guys');?>
</p>
	<p><?php echo (($tmp = @$_smarty_tpl->tpl_vars['x']->value)===null||$tmp==='' ? "your are default" : $tmp);?>
</p>
	<p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['time']->value,"%Y-%m-%d--%H:%M:%I");?>
</p>
	<p><?php echo str_replace('1','a',$_smarty_tpl->tpl_vars['time']->value);?>
</p>
	<p><?php echo printa(array('h'=>'home','c'=>'controller','m'=>'method'),$_smarty_tpl);?>
</p>

	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['value'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['value']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['name'] = 'value';
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['value']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['value']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['value']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['value']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['value']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['value']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['value']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['value']['total']);
?>
			<p><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['value']['index']]['name'];?>
</p>
			<p><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['value']['index']]['age'];?>
</p>
	<?php endfor; endif; ?>


	<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['it'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['it']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
$foreach_it_Sav = $_smarty_tpl->tpl_vars['it'];
?>
			<p><?php echo $_smarty_tpl->tpl_vars['it']->value['name'];?>
:<?php echo $_smarty_tpl->tpl_vars['it']->value['age'];?>
</p>
	<?php
$_smarty_tpl->tpl_vars['it'] = $foreach_it_Sav;
}
?>


	<p>
	<?php if ($_smarty_tpl->tpl_vars['num']->value > 12313) {?>
		time is correct!
	<?php } elseif ($_smarty_tpl->tpl_vars['num']->value == 123) {?>
		time is equal!
	<?php } else { ?>
		time is incorrect!
	<?php }?>
	</p>
	<?php while ($_smarty_tpl->tpl_vars['num']->value > 1) {?>
		<p><?php echo $_smarty_tpl->tpl_vars['num']->value--;?>
</p>
	<?php }?>
</body>
</html><?php }
}
?>