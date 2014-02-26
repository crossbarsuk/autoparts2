<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 14:31:02
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19254977805306fa9d19e4a1-88529166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3506a1578fe5bd6058795353c7a9b674b937c499' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1392985862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19254977805306fa9d19e4a1-88529166',
  'function' => 
  array (
  ),
  'cache_lifetime' => 31536000,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306fa9d1d25a9_33442983',
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306fa9d1d25a9_33442983')) {function content_5306fa9d1d25a9_33442983($_smarty_tpl) {?><!-- Block permanent links module HEADER -->
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
  <li id="header_link_contact"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCMSLink(6), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
  <li id="header_link_feedback"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact');?>
" title="<?php echo smartyTranslate(array('s'=>'feedback','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'feedback','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
</ul>
<!-- /Block permanent links module HEADER -->
<?php }} ?>