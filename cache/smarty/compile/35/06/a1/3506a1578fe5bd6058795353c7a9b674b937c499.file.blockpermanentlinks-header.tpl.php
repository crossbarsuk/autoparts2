<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 09:01:12
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11069633795306f9b806d908-72203195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3506a1578fe5bd6058795353c7a9b674b937c499' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1392302457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11069633795306f9b806d908-72203195',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306f9b80a0ae7_29162526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306f9b80a0ae7_29162526')) {function content_5306f9b80a0ae7_29162526($_smarty_tpl) {?><!-- Block permanent links module HEADER -->
<ul id="header_links">
  <li id="header_link_main"><a href="/" title="<?php echo smartyTranslate(array('s'=>'home','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'home','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
  <li id="header_link_catalog"><a href="/" title="<?php echo smartyTranslate(array('s'=>'catalog','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'catalog','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
  <li id="header_link_news"><a href="/" title="<?php echo smartyTranslate(array('s'=>'news','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'news','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
  <li id="header_link_contact"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
  <li id="header_link_feedback"><a href="/" title="<?php echo smartyTranslate(array('s'=>'feedback','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'feedback','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
</ul>
<!-- /Block permanent links module HEADER -->
<?php }} ?>