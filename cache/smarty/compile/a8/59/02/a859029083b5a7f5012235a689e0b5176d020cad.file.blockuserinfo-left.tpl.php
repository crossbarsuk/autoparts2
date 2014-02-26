<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 10:14:45
         compiled from "/home/pavel/public_html/clients/autoparts/modules/blockuserinfo/blockuserinfo-left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1684027504530707b71c6c62-41315146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a859029083b5a7f5012235a689e0b5176d020cad' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/modules/blockuserinfo/blockuserinfo-left.tpl',
      1 => 1392970483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1684027504530707b71c6c62-41315146',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_530707b7255e26_40451508',
  'variables' => 
  array (
    'context' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530707b7255e26_40451508')) {function content_530707b7255e26_40451508($_smarty_tpl) {?><!-- Block user information module LEFT -->
<div id="user_info" class="block informations_block_left">
  <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Ваше меню','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</h4>
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
<!-- /Block user information module LEFT -->
<?php }} ?>