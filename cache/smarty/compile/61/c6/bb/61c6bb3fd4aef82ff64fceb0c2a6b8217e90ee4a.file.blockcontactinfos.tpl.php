<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 09:01:12
         compiled from "/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockcontactinfos/blockcontactinfos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12768690295306f9b86a03d6-39215782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61c6bb3fd4aef82ff64fceb0c2a6b8217e90ee4a' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blockcontactinfos/blockcontactinfos.tpl',
      1 => 1392372062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12768690295306f9b86a03d6-39215782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockcontactinfos_address' => 0,
    'blockcontactinfos_phone' => 0,
    'blockcontactinfos_person' => 0,
    'blockcontactinfos_email' => 0,
    'blockcontactinfos_worktime' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306f9b86fa8b1_02856175',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306f9b86fa8b1_02856175')) {function content_5306f9b86fa8b1_02856175($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/pavel/public_html/clients/autoparts/tools/smarty/plugins/modifier.escape.php';
?><!-- MODULE Block contact infos -->
<div id="block_contact_infos">
  <div class="block_left">
    <p class="faddr">
      <?php echo smartyTranslate(array('s'=>'Address','mod'=>'blockcontactinfos'),$_smarty_tpl);?>
: <?php if ($_smarty_tpl->tpl_vars['blockcontactinfos_address']->value!=''){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['blockcontactinfos_address']->value, 'htmlall', 'UTF-8');?>
<?php }?><a href="http://alukard.vdovinlab.com/avto/#"><?php echo smartyTranslate(array('s'=>'Show on map','mod'=>'blockcontactinfos'),$_smarty_tpl);?>
</a>
    </p>
    <p class="ftel">
      <?php echo smartyTranslate(array('s'=>'Tel','mod'=>'blockcontactinfos'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['blockcontactinfos_phone']->value!=''){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['blockcontactinfos_phone']->value, 'htmlall', 'UTF-8');?>
<?php }?>
    </p>
    <p class="fcon">
      <?php echo smartyTranslate(array('s'=>'Contact','mod'=>'blockcontactinfos'),$_smarty_tpl);?>
: <?php if ($_smarty_tpl->tpl_vars['blockcontactinfos_person']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['blockcontactinfos_person']->value;?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['blockcontactinfos_email']->value!=''){?><a href="mailto:<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['blockcontactinfos_email']->value, 'htmlall', 'UTF-8');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['blockcontactinfos_email']->value, 'htmlall', 'UTF-8');?>
</a><?php }?>
    </p>
  </div>
  <div class="block_right">
    <p><?php if ($_smarty_tpl->tpl_vars['blockcontactinfos_worktime']->value!=''){?><?php echo $_smarty_tpl->tpl_vars['blockcontactinfos_worktime']->value;?>
<?php }?></p>
  </div>
</div>
<!-- /MODULE Block contact infos -->
<?php }} ?>