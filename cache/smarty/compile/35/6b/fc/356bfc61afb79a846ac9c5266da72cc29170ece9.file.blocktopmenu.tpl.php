<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 09:01:12
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20042657475306f9b80d0b90-00550803%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '356bfc61afb79a846ac9c5266da72cc29170ece9' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1392310327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20042657475306f9b80d0b90-00550803',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
    'MENU_SEARCH' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306f9b80faec5_43558079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306f9b80faec5_43558079')) {function content_5306f9b80faec5_43558079($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/pavel/public_html/clients/autoparts/tools/smarty/plugins/modifier.escape.php';
?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!=''){?>
	<!-- Menu -->
<div class="menu_wrap">
  <div class="container_9">
    <div class="sf-contener clearfix">
      <ul class="sf-menu clearfix">
        <?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

        <?php if ($_smarty_tpl->tpl_vars['MENU_SEARCH']->value){?>
          <li class="sf-search noBack" style="float:right">
            <form id="searchbox" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" method="get">
              <p>
                <input type="hidden" name="controller" value="search" />
                <input type="hidden" value="position" name="orderby"/>
                <input type="hidden" value="desc" name="orderway"/>
                <input type="text" name="search_query" value="<?php if (isset($_GET['search_query'])){?><?php echo smarty_modifier_escape($_GET['search_query'], 'htmlall', 'UTF-8');?>
<?php }?>" />
              </p>
            </form>
          </li>
        <?php }?>
      </ul>
    </div>
    <div class="course">Курс € 11.35</div>
    <div class="sf-right">&nbsp;</div>
  </div>
</div>
	<!--/ Menu -->
<?php }?><?php }} ?>