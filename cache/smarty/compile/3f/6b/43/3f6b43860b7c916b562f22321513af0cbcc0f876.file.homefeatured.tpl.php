<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 09:01:12
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1177928565306f9b8375a68-67425003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f6b43860b7c916b562f22321513af0cbcc0f876' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/homefeatured/homefeatured.tpl',
      1 => 1392329019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1177928565306f9b8375a68-67425003',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306f9b837e8b9_29339561',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306f9b837e8b9_29339561')) {function content_5306f9b837e8b9_29339561($_smarty_tpl) {?><!-- MODULE Home Featured Products -->
<div id="featured-products_block_center" class="block products_block clearfix">
	<p class="title_block"><?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'homefeatured'),$_smarty_tpl);?>
</p>
  <?php echo $_smarty_tpl->getSubTemplate ("../../product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<!-- /MODULE Home Featured Products -->
<?php }} ?>