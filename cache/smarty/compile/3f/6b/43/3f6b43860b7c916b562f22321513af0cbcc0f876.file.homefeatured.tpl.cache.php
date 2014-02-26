<?php /* Smarty version Smarty-3.1.14, created on 2014-02-25 18:38:13
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7487328745306fa9d9c45b5-16209683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '7487328745306fa9d9c45b5-16209683',
  'function' => 
  array (
  ),
  'cache_lifetime' => 31536000,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306fa9d9cd358_08152209',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306fa9d9cd358_08152209')) {function content_5306fa9d9cd358_08152209($_smarty_tpl) {?><!-- MODULE Home Featured Products -->
<div id="featured-products_block_center" class="block products_block clearfix">
	<p class="title_block"><?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'homefeatured'),$_smarty_tpl);?>
</p>
  <?php echo $_smarty_tpl->getSubTemplate ("../../product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

</div>
<!-- /MODULE Home Featured Products -->
<?php }} ?>