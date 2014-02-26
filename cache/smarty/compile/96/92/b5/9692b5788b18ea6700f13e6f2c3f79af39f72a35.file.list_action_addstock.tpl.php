<?php /* Smarty version Smarty-3.1.14, created on 2014-02-25 10:35:22
         compiled from "/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/list/list_action_addstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2081883795530c55ca28bf16-37005050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9692b5788b18ea6700f13e6f2c3f79af39f72a35' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/list/list_action_addstock.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2081883795530c55ca28bf16-37005050',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_530c55ca299c25_66393289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530c55ca299c25_66393289')) {function content_530c55ca299c25_66393289($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/add_stock.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a>
<?php }} ?>