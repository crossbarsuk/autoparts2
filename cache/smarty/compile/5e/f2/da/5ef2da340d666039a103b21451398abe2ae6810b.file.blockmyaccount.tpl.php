<?php /* Smarty version Smarty-3.1.14, created on 2014-02-25 17:27:24
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockmyaccount/blockmyaccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1644422658530cb1fc3354a6-71935850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ef2da340d666039a103b21451398abe2ae6810b' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockmyaccount/blockmyaccount.tpl',
      1 => 1393342043,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1644422658530cb1fc3354a6-71935850',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_530cb1fc3f3a12_34188926',
  'variables' => 
  array (
    'context' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530cb1fc3f3a12_34188926')) {function content_530cb1fc3f3a12_34188926($_smarty_tpl) {?><!-- Block myaccount module -->
<div class="block myaccount informations_block_left">
	<p class="title_block"><?php echo smartyTranslate(array('s'=>'Ваше меню','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</p>
  <div class="profile_inf">
    <p class="balance"><?php echo smartyTranslate(array('s'=>'Баланс:','mod'=>'blockuserinfo'),$_smarty_tpl);?>
 60.00 <?php echo $_smarty_tpl->tpl_vars['context']->value->currency->sign;?>
</p>
    <p class="discount"><?php echo smartyTranslate(array('s'=>'Уровень скидки:','mod'=>'blockuserinfo'),$_smarty_tpl);?>
 <b>опт 2</b></p>
  </div>
  <ul class="block_content">
    <li class="bullet"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Личный кабинет','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Личный кабинет','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
    </li>
    <li class="bullet"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Корзина','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Корзина','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
    </li>
    <li class="bullet"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Заказы','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Заказы','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
    </li>
    <li class="bullet"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Автомобили','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Автомобили','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
    </li>
    <li class="bullet"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Запросы по VIN','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Запросы по VIN','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
    </li>
    <li class="bullet"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Баланс','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Баланс','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
    </li>
  </ul>
</div>
<!-- /Block myaccount module -->
<?php }} ?>