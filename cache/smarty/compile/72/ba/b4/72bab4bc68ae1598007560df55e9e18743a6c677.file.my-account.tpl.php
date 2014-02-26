<?php /* Smarty version Smarty-3.1.14, created on 2014-02-23 17:36:23
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5451254245307087618a1c6-08786755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72bab4bc68ae1598007560df55e9e18743a6c677' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/my-account.tpl',
      1 => 1393169780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5451254245307087618a1c6-08786755',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53070876263a30_96262421',
  'variables' => 
  array (
    'account_created' => 0,
    'link' => 0,
    'img_dir' => 0,
    'voucherAllowed' => 0,
    'has_customer_an_address' => 0,
    'HOOK_CUSTOMER_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53070876263a30_96262421')) {function content_53070876263a30_96262421($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="my_account block">
<h1><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['account_created']->value)){?>
	<p class="success">
		<?php echo smartyTranslate(array('s'=>'Your account has been created.'),$_smarty_tpl);?>

	</p>
<?php }?>

<div class="myaccount_lnk_list">
	<div class="row">
	  <div class="col"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Cart'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
/pc_item1.png" alt="<?php echo smartyTranslate(array('s'=>'Cart'),$_smarty_tpl);?>
" class="icon" /><span><?php echo smartyTranslate(array('s'=>'Cart'),$_smarty_tpl);?>
</span></a><p><?php echo smartyTranslate(array('s'=>'Содержимое вашей виртуальной корзины. Срок хранения товаров в корзине ограничен - не более 3-х дней'),$_smarty_tpl);?>
</p></div>
    <div class="col"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
/pc_item2.png" alt="<?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
" class="icon" /><span><?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
</span></a><p><?php echo smartyTranslate(array('s'=>'Мониторинг заказов, просмотр всех заказов, экспорт данных'),$_smarty_tpl);?>
</p></div>
	
  </div>
  <div class="row">
    <div class="col"><a href="" title="<?php echo smartyTranslate(array('s'=>'Автомобили'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
/pc_item3.png" alt="<?php echo smartyTranslate(array('s'=>'Автомобили'),$_smarty_tpl);?>
" class="icon" /><span><?php echo smartyTranslate(array('s'=>'Автомобили'),$_smarty_tpl);?>
</span></a><p><?php echo smartyTranslate(array('s'=>'Сохраняйте ваши автомобили для быстрого поиска деталей в каталогах и запросов по наименованию.'),$_smarty_tpl);?>
</p></div>
    <div class="col"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Запросы по VIN'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
/pc_item4.png" alt="<?php echo smartyTranslate(array('s'=>'Запросы по VIN'),$_smarty_tpl);?>
" class="icon" /><span><?php echo smartyTranslate(array('s'=>'Запросы по VIN'),$_smarty_tpl);?>
</span></a><p><?php echo smartyTranslate(array('s'=>'Мониторинг заказов, просмотр всех заказов, экспорт данных'),$_smarty_tpl);?>
</p></div>
  </div>
  <div class="row">
    <div class="col"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Addresses'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/addrbook.gif" alt="<?php echo smartyTranslate(array('s'=>'Addresses'),$_smarty_tpl);?>
" class="icon" /><span><?php echo smartyTranslate(array('s'=>'Addresses'),$_smarty_tpl);?>
</span></a><p><?php echo smartyTranslate(array('s'=>''),$_smarty_tpl);?>
</p></div>
    <div class="col"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Settings'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
/pc_item6.png" alt="<?php echo smartyTranslate(array('s'=>'Settings'),$_smarty_tpl);?>
" class="icon" /><span><?php echo smartyTranslate(array('s'=>'Settings'),$_smarty_tpl);?>
</span></a><p><?php echo smartyTranslate(array('s'=>'Settings'),$_smarty_tpl);?>
</p></div>
  </div>
	<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value){?>
    <div class="col"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('discount',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Vouchers'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/voucher.gif" alt="<?php echo smartyTranslate(array('s'=>'Vouchers'),$_smarty_tpl);?>
" class="icon" /><span><?php echo smartyTranslate(array('s'=>'Vouchers'),$_smarty_tpl);?>
</span></a><p><?php echo smartyTranslate(array('s'=>'My vouchers'),$_smarty_tpl);?>
</p></div>
	<?php }?>
  <?php if ($_smarty_tpl->tpl_vars['has_customer_an_address']->value){?>
    <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Add my first address'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
/pc_item1.png" alt="<?php echo smartyTranslate(array('s'=>'Add my first address'),$_smarty_tpl);?>
" class="icon" /> <?php echo smartyTranslate(array('s'=>'Add my first address'),$_smarty_tpl);?>
</a></li>
  <?php }?>
	<?php echo $_smarty_tpl->tpl_vars['HOOK_CUSTOMER_ACCOUNT']->value;?>

</div>

</div><?php }} ?>