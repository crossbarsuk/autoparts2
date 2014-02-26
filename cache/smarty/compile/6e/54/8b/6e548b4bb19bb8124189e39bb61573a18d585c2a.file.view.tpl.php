<?php /* Smarty version Smarty-3.1.14, created on 2014-02-25 11:04:25
         compiled from "/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/controllers/import/helpers/view/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1385936848530c5c993d4f75-97089523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e548b4bb19bb8124189e39bb61573a18d585c2a' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/controllers/import/helpers/view/view.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
    'b22c1e6fda1157625bf214d14a6899457b0af989' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/view/view.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1385936848530c5c993d4f75-97089523',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_toolbar' => 0,
    'toolbar_btn' => 0,
    'toolbar_scroll' => 0,
    'title' => 0,
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_530c5c99517eb3_93448107',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530c5c99517eb3_93448107')) {function content_530c5c99517eb3_93448107($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['show_toolbar']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate ("toolbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('toolbar_btn'=>$_smarty_tpl->tpl_vars['toolbar_btn']->value,'toolbar_scroll'=>$_smarty_tpl->tpl_vars['toolbar_scroll']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value), 0);?>

<?php }?>

<div class="leadin"></div>


	<script type="text/javascript">
		var errorEmpty = '<?php echo smartyTranslate(array('s'=>'Please name your matching configuration to save.','js'=>1),$_smarty_tpl);?>
';
		var token = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
';
		var current = 0;
		function showTable(nb)
		{
			$('#btn_left').disabled = null;
			$('#btn_right').disabled = null;
			if (nb <= 0)
			{
				nb = 0;
				$('#btn_left').disabled = 'true';
			}
			if (nb >= <?php echo $_smarty_tpl->tpl_vars['nb_table']->value;?>
 - 1)
			{
				nb = <?php echo $_smarty_tpl->tpl_vars['nb_table']->value;?>
 - 1;
				$('#btn_right').disabled = 'true';
			}
			$('#table' + current).hide();
			current = nb;
			$('#table' + current).show();
		}
		$(document).ready(function(){
			var btn_save_import = $('span[class~="process-icon-save-import"]').parent();
			var btn_submit_import = $('#import');
			if (btn_save_import.length > 0 && btn_submit_import.length > 0)
			{
				btn_submit_import.hide();
				btn_save_import.find('span').removeClass('process-icon-save-import');
				btn_save_import.find('span').addClass('process-icon-save');
				btn_save_import.click(function(){
					btn_submit_import.before('<input type="hidden" name="' + btn_submit_import.attr("name") + '" value="1" />');
					$('#import_form').submit();
				});
			}
			showTable(current);
		});
	</script>
	<div id="container-customer">
	<h2><?php echo smartyTranslate(array('s'=>'View your data'),$_smarty_tpl);?>
</h2>
	<div>
		<b><?php echo smartyTranslate(array('s'=>'Save and load your configuration for importing files'),$_smarty_tpl);?>
 : </b><br/><br/>
		<input type="text" name="newImportMatchs" id="newImportMatchs" />
		<a id="saveImportMatchs" class="button" href="#"><?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
</a><br /><br />
		<div id="selectDivImportMatchs" <?php if (!$_smarty_tpl->tpl_vars['import_matchs']->value){?>style="display:none"<?php }?>>
			<select id="valueImportMatchs">
				<?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['import_matchs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
$_smarty_tpl->tpl_vars['match']->_loop = true;
?>
					<option id="<?php echo $_smarty_tpl->tpl_vars['match']->value['id_import_match'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['match']->value['match'];?>
"><?php echo $_smarty_tpl->tpl_vars['match']->value['name'];?>
</option>
				<?php } ?>
			</select>
			<a class="button" id="loadImportMatchs" href="#"><?php echo smartyTranslate(array('s'=>'Load'),$_smarty_tpl);?>
</a>
			<a class="button" id="deleteImportMatchs" href="#"><?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
</a>
		</div>
	</div>
	<h3><?php echo smartyTranslate(array('s'=>'Please set the value type of each column'),$_smarty_tpl);?>
</h3>
	<div id="error_duplicate_type" class="warning warn" style="display:none;">
		<h3><?php echo smartyTranslate(array('s'=>'Columns cannot have the same value type'),$_smarty_tpl);?>
</h3>
	</div>
	<div id="required_column" class="warning warn" style="display:none;">
		<h3><?php echo smartyTranslate(array('s'=>'Column'),$_smarty_tpl);?>
 <span id="missing_column">&nbsp;</span> <?php echo smartyTranslate(array('s'=>'must be set'),$_smarty_tpl);?>
</h3>
	</div>
	<form action="<?php echo $_smarty_tpl->tpl_vars['current']->value;?>
&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" method="post" id="import_form" name="import_form">
		<?php echo smartyTranslate(array('s'=>'Skip'),$_smarty_tpl);?>
 <input type="text" size="2" name="skip" value="1" /> <?php echo smartyTranslate(array('s'=>'lines'),$_smarty_tpl);?>

		<input type="hidden" name="csv" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['csv'];?>
" />
		<input type="hidden" name="convert" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['convert'];?>
" />
		<input type="hidden" name="regenerate" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['regenerate'];?>
" />
		<input type="hidden" name="entity" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['entity'];?>
" />
		<input type="hidden" name="iso_lang" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['iso_lang'];?>
" />
		<?php if ($_smarty_tpl->tpl_vars['fields_value']->value['truncate']){?>
			<input type="hidden" name="truncate" value="1" />
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['fields_value']->value['forceIDs']){?>
			<input type="hidden" name="forceIDs" value="1" />
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['fields_value']->value['match_ref']){?>
			<input type="hidden" name="match_ref" value="1" />
		<?php }?>
		<input type="hidden" name="separator" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['separator'];?>
" />
		<input type="hidden" name="multiple_value_separator" value="<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['multiple_value_separator'];?>
" />
		<table>
			<tr>
				<td colspan="3" align="center">
					<input name="import" type="submit" onclick="return (validateImportation(new Array(<?php echo $_smarty_tpl->tpl_vars['res']->value;?>
)));" id="import" value="<?php echo smartyTranslate(array('s'=>'Import .CSV data'),$_smarty_tpl);?>
" class="button" />
				</td>
			</tr>
			<tr>
				<td valign="top" align="center">
					<input id="btn_left" value="<?php echo smartyTranslate(array('s'=>'<<'),$_smarty_tpl);?>
" type="button" class="button" onclick="showTable(current - 1);" />
				</td>
				<td align="left">
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['name'] = 'nb_i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nb_table']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['nb_i']['total']);
?>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['nb_i']['index'], null, 0);?>
						<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->tpl_vars['i']->value];?>

					<?php endfor; endif; ?>
				</td>
				<td valign="top" align="center">
					<input id="btn_right" value="<?php echo smartyTranslate(array('s'=>'>>'),$_smarty_tpl);?>
" type="button" class="button" onclick="showTable(current + 1);" />
				</td>
			</tr>
		</table>
	</form>
	</div>


<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminView'),$_smarty_tpl);?>

<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)){?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }elseif(isset($_GET['controller'])){?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
View<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

<?php }?>
<?php }} ?>