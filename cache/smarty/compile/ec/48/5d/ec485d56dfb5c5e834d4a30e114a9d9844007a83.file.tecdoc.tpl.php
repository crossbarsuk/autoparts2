<?php /* Smarty version Smarty-3.1.14, created on 2014-02-25 18:51:18
         compiled from "/home/pavel/public_html/clients/autoparts/modules/tecdoc/tecdoc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:867931635306fd7c904c69-19124027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec485d56dfb5c5e834d4a30e114a9d9844007a83' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/modules/tecdoc/tecdoc.tpl',
      1 => 1393346720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '867931635306fd7c904c69-19124027',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5306fd7c931e24_57734273',
  'variables' => 
  array (
    'aManufacturers' => 0,
    'aManufacturer' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5306fd7c931e24_57734273')) {function content_5306fd7c931e24_57734273($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/pavel/public_html/clients/autoparts/tools/smarty/plugins/modifier.escape.php';
?><!-- MODULE tecdoc -->
<div class="tecdoc_search block" id="tecdoc_search">
  <p class="title_block"><?php echo smartyTranslate(array('s'=>'Поиск по авто','mod'=>'tecdoc'),$_smarty_tpl);?>
</p>
  <form class="std" id="ajax_tecdoc_form" method="post" action="http://auto.int/index.php">
    <div class="form_content clearfix">
      <p class="text">
        <label for="tecdoc_manufacturer"><?php echo smartyTranslate(array('s'=>'Производитель','mod'=>'tecdoc'),$_smarty_tpl);?>
</label>
        <select id="tecdoc_manufacturer" name="manufacturer">
<?php  $_smarty_tpl->tpl_vars["aManufacturer"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["aManufacturer"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aManufacturers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["aManufacturer"]->key => $_smarty_tpl->tpl_vars["aManufacturer"]->value){
$_smarty_tpl->tpl_vars["aManufacturer"]->_loop = true;
?>
          <option value="<?php echo $_smarty_tpl->tpl_vars['aManufacturer']->value['id'];?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['aManufacturer']->value['name'], 'htmlall', 'UTF-8');?>
</option>
<?php } ?>
        </select>
      </p>
      <p class="text">
        <label for="tecdoc_model"><?php echo smartyTranslate(array('s'=>'Модель','mod'=>'tecdoc'),$_smarty_tpl);?>
</label>
        <select id="tecdoc_model" name="model"></select>
      </p>
      <a href="#" id="SubmitFind" name="SubmitFind" class="button" onclick=""/><?php echo smartyTranslate(array('s'=>'Search','mod'=>'tecdoc'),$_smarty_tpl);?>
</a>
    </div>
  </form>
</div>

<script>
  
</script>
<!-- /MODULE tecdoc -->

<?php }} ?>