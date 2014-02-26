<?php /* Smarty version Smarty-3.1.14, created on 2014-02-03 15:50:18
         compiled from "/home/pavel/public_html/clients/autoparts/modules/gamification/views/templates/hook/notification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38540821452ef9e9ad2fba2-75971055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7a1e4c7d568e0547a58d9268866275e2a8c300f' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/modules/gamification/views/templates/hook/notification.tpl',
      1 => 1391435375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38540821452ef9e9ad2fba2-75971055',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_id_tab' => 0,
    'current_level_percent' => 0,
    'current_level' => 0,
    'notification' => 0,
    'badges_to_display' => 0,
    'badge' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52ef9e9ade1a76_80957358',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ef9e9ade1a76_80957358')) {function content_52ef9e9ade1a76_80957358($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/pavel/public_html/clients/autoparts/tools/smarty/plugins/modifier.escape.php';
?><script>
	var current_id_tab = <?php echo intval($_smarty_tpl->tpl_vars['current_id_tab']->value);?>
;
	var current_level_percent = <?php echo intval($_smarty_tpl->tpl_vars['current_level_percent']->value);?>
;
	var current_level = <?php echo intval($_smarty_tpl->tpl_vars['current_level']->value);?>
;
	var gamification_level = '<?php echo smartyTranslate(array('s'=>'Level','js'=>1),$_smarty_tpl);?>
';
</script>
<style>
	.gamification_progress-label {top:-1px!important;-moz-border-radius: 15px;-o-border-radius: 15px;-webkit-border-radius: 15px;border-radius: 15px;height:19px;background-image: url(../modules/gamification/views/img/gamification-bar-bg.png) ;width: <?php echo $_smarty_tpl->tpl_vars['current_level_percent']->value;?>
%}
</style>
<div id="gamification_notif" class="notifs">
		<?php if ($_smarty_tpl->tpl_vars['notification']->value){?>
		<span id="gamification_notif_number_wrapper" class="number_wrapper" style="display: inline;">
			<span id="gamification_notif_value"><?php echo intval($_smarty_tpl->tpl_vars['notification']->value);?>
</span>
		</span>
		<?php }?>
	<div id="gamification_notif_wrapper" class="notifs_wrapper" style="width:340px">
		<div id="gamification_top">
			<h3><?php echo smartyTranslate(array('s'=>'Your Merchant Expertise','mod'=>'gamification'),$_smarty_tpl);?>
</h3>
		</div>
		<span style="font-size: 15px;color: #585A69;text-shadow: 0 1px 0 #fff;"><?php echo smartyTranslate(array('s'=>'Level','mod'=>'gamification'),$_smarty_tpl);?>
 <?php echo intval($_smarty_tpl->tpl_vars['current_level']->value);?>
 : <?php echo intval($_smarty_tpl->tpl_vars['current_level_percent']->value);?>
 %</span>
		<div id="gamification_progressbar">
			<span class="gamification_progress-label"></span>
		</div>
		<div id="gamification_badges_container">
			<ul id="gamification_badges_list" style="<?php if (count($_smarty_tpl->tpl_vars['badges_to_display']->value)<=2){?> height:140px;<?php }?>">
				<?php  $_smarty_tpl->tpl_vars['badge'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['badge']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['badges_to_display']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['badge_list']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['badge']->key => $_smarty_tpl->tpl_vars['badge']->value){
$_smarty_tpl->tpl_vars['badge']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['badge_list']['iteration']++;
?>
				<?php if ($_smarty_tpl->tpl_vars['badge']->value->id){?>
					<li class="<?php if ($_smarty_tpl->tpl_vars['badge']->value->validated){?> unlocked <?php }else{ ?> locked <?php }?>" style="float:left;">
						<span class="<?php if ($_smarty_tpl->tpl_vars['badge']->value->validated){?> unlocked_img <?php }else{ ?> locked_img <?php }?>"></span>
						<div class="gamification_badges_title"><span><?php if ($_smarty_tpl->tpl_vars['badge']->value->validated){?> <?php echo smartyTranslate(array('s'=>'Last badge :','mod'=>'gamification'),$_smarty_tpl);?>
 <?php }else{ ?> <?php echo smartyTranslate(array('s'=>'Next badge :','mod'=>'gamification'),$_smarty_tpl);?>
 <?php }?></span></div>
						<div class="gamification_badges_img"><img src="<?php echo $_smarty_tpl->tpl_vars['badge']->value->getBadgeImgUrl();?>
"></div>
						<div class="gamification_badges_name"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['badge']->value->name, 'html', 'UTF-8');?>
</div>
					</li>
				<?php }else{ ?>
					<li style="height:130px"></li>
				<?php }?>
				<?php if (!(1 & $_smarty_tpl->getVariable('smarty')->value['foreach']['badge_list']['iteration'])&&count($_smarty_tpl->tpl_vars['badges_to_display']->value)>2){?>
						<div class="clear">&nbsp;</div>
					<?php }?>
				<?php } ?>
			</ul>
		</div>
		<a id="gamification_see_more" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminGamification');?>
"><?php echo smartyTranslate(array('s'=>'View my complete profile','mod'=>'gamification'),$_smarty_tpl);?>
</a>
	</div>
</div>
<?php }} ?>