<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 13:24:54
         compiled from "/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/controllers/products/helpers/form/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170187921553073786de77e8-55459599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f951917e55324ff5c2a03966ad73148f9f44ba7c' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/controllers/products/helpers/form/form.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
    '6c7e6f2f0d883e91cf1fd289a3d71215c703f348' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/form/form.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
    '910934b713b3b466b8f4c1d78d5fb5d5414ed366' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/form/form_group.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
    'f79354e284bd28895bf4f1f93276a7bddd89a489' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/form/form_category.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170187921553073786de77e8-55459599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_toolbar' => 0,
    'toolbar_btn' => 0,
    'toolbar_scroll' => 0,
    'title' => 0,
    'fields' => 0,
    'table' => 0,
    'name_controller' => 0,
    'current' => 0,
    'submit_action' => 0,
    'token' => 0,
    'style' => 0,
    'form_id' => 0,
    'identifier' => 0,
    'f' => 0,
    'fieldset' => 0,
    'key' => 0,
    'field' => 0,
    'input' => 0,
    'fields_value' => 0,
    'contains_states' => 0,
    'languages' => 0,
    'language' => 0,
    'defaultFormLanguage' => 0,
    'value_text' => 0,
    'optiongroup' => 0,
    'option' => 0,
    'field_value' => 0,
    'value' => 0,
    'id_checkbox' => 0,
    'select' => 0,
    'k' => 0,
    'v' => 0,
    'asso_shop' => 0,
    'p' => 0,
    'hookName' => 0,
    'required_fields' => 0,
    'tinymce' => 0,
    'iso' => 0,
    'ad' => 0,
    'firstCall' => 0,
    'vat_number' => 0,
    'allowEmployeeFormLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53073787a1f518_67371222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53073787a1f518_67371222')) {function content_53073787a1f518_67371222($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/pavel/public_html/clients/autoparts/tools/smarty/plugins/modifier.escape.php';
?>

<?php if ($_smarty_tpl->tpl_vars['show_toolbar']->value){?>
	<?php echo $_smarty_tpl->getSubTemplate ("toolbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('toolbar_btn'=>$_smarty_tpl->tpl_vars['toolbar_btn']->value,'toolbar_scroll'=>$_smarty_tpl->tpl_vars['toolbar_scroll']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value), 0);?>

	<div class="leadin"></div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['fields']->value['title'])){?><h2><?php echo $_smarty_tpl->tpl_vars['fields']->value['title'];?>
</h2><?php }?>

	<div>
		<div class="productTabs" style="display:none;">
			<ul class="tab">
			
			<?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab']->_loop = false;
 $_smarty_tpl->tpl_vars['numStep'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
$_smarty_tpl->tpl_vars['tab']->_loop = true;
 $_smarty_tpl->tpl_vars['numStep']->value = $_smarty_tpl->tpl_vars['tab']->key;
?>
				<li class="tab-row">
					<a class="tab-page <?php if ($_smarty_tpl->tpl_vars['tab']->value['selected']){?>selected<?php }?>" id="link-<?php echo $_smarty_tpl->tpl_vars['tab']->value['id'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['tab']->value['href'];?>
&amp;updateproduct"><?php echo $_smarty_tpl->tpl_vars['tab']->value['name'];?>
</a>
				</li>
			<?php } ?>
			</ul>
		</div>
	</div>
	<script type="text/javascript">
		var token = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
';
		var id_product = <?php if (isset($_smarty_tpl->tpl_vars['product']->value->id)){?><?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
<?php }else{ ?>0<?php }?>;
		var id_lang_default = <?php echo $_smarty_tpl->tpl_vars['id_lang_default']->value;?>
;
		var product_type_pack = <?php echo Product::PTYPE_PACK;?>
;
		var product_type_virtual = <?php echo Product::PTYPE_VIRTUAL;?>
;
		var product_type_simple = <?php echo Product::PTYPE_SIMPLE;?>
;

		var has_combinations = <?php echo $_smarty_tpl->tpl_vars['has_combinations']->value;?>
;

		var toload = new Array();
		var empty_pack_msg = '<?php echo smartyTranslate(array('s'=>'This pack is empty. You will need to add at least one product to the pack before you can save.','slashes'=>1),$_smarty_tpl);?>
';
		var empty_name_msg = '<?php echo smartyTranslate(array('s'=>'The product name is empty. You will at least need to enter a name for the default language before you can save the product.','slashes'=>1),$_smarty_tpl);?>
';
		var empty_link_rewrite_msg = '<?php echo smartyTranslate(array('s'=>'The friendly URL is empty. You will at least need to enter a friendly URL for the default language before you can save the product.','slashes'=>1),$_smarty_tpl);?>
';
		var reload_tab_title = '<?php echo smartyTranslate(array('s'=>'Confirmation','slashes'=>1),$_smarty_tpl);?>
';
		var reload_tab_description = '<?php echo smartyTranslate(array('s'=>'Some tabs was not loaded correctly. Would you like to reload them?','slashes'=>1),$_smarty_tpl);?>
';

		$('#product-tab-content-wait').show();
		var post_data = <?php echo $_smarty_tpl->tpl_vars['post_data']->value;?>
;
		var save_error = <?php if ($_smarty_tpl->tpl_vars['save_error']->value){?>true<?php }else{ ?>false<?php }?>;

		var product_type = <?php echo $_smarty_tpl->tpl_vars['product_type']->value;?>
;
		
		<?php if (isset($_smarty_tpl->tpl_vars['display_multishop_checkboxes']->value)&&$_smarty_tpl->tpl_vars['display_multishop_checkboxes']->value){?>
			var display_multishop_checkboxes = true;
		<?php }else{ ?>
			var display_multishop_checkboxes = false;
		<?php }?>

		$(document).ready(function()
		{
			//product_type = $("input[name=type_product]:checked").val();
			if (product_type == product_type_pack)
			{
				$('li.tab-row a[id*="VirtualProduct"]').hide();
			}
			else if (product_type == product_type_virtual)
			{
				$('li.tab-row a[id*="Pack"]').hide();
				$('li.tab-row a[id*="Shipping"]').hide();
			}
			else
			{
				$('li.tab-row a[id*="Pack"]').hide();
				$('li.tab-row a[id*="VirtualProduct"]').hide();
			}

			$('#desc-product-newCombination').hide();

			
			$(".tab-page").click(function(e){
				e.preventDefault();

				// currentId is the current product tab id
				currentId = $(".productTabs a.selected").attr('id').substr(5);
				// id is the wanted producttab id
				id = $(this).attr('id').substr(5);

				// Update submit button value
				var split_position = id.indexOf('-') + 1;
				var btn_name = id.substr(split_position);

				$('#key_tab').val(btn_name);

				if ($(this).attr("id") != $(".productTabs a.selected").attr('id'))
				{
					$(".tab-page").removeClass('selected');
					$("#product-tab-content-"+currentId).hide();
				}

				// if the tab has not already been loaded, load it now
				tabs_manager.display(id, true);

				tabs_manager.onLoad(id, function(){
					$("#product-tab-content-"+id).show(0, function(){
						$(this).trigger('displayed');
					});
					$("#link-"+id).addClass('selected');
				});

				var languages = new Array();
				if (btn_name == "Combinations")
				{
					$('#desc-product-new').hide();
					$('#desc-product-newCombination').show();
					populate_attrs();
				}
				else if (btn_name == "Attachments")
				{
					handleSaveButtons();
				}
				else
				{
					$('#desc-product-newCombination').hide();
					// if pack is enabled, save button are visible only if pack is valid
					handleSaveButtons();
				}
			});

			$(".productTabs a.selected").click();

			// disable save if Associations tab is not loaded
			if ($('#product-tab-content-Associations').hasClass('not-loaded'))
				disableSave();

			tabs_manager.onLoad('Associations', function(){
				handleSaveButtons();
			});

			$('.confirm_leave').live('click', function(){
				// Double quotes are necessary when the translated string has single quotes
				return confirm("<?php echo smartyTranslate(array('s'=>'You will lose all unsaved modifications. Are you sure that you\'d like to proceed?','js'=>1),$_smarty_tpl);?>
");
			});

		});

		var tabs_preloaded = new Array();

		// Listen to the load event that is fired each time an ajax call to load a tab has completed
		$(window).bind("load", function() {
			
			var tabs_to_preload = new Array();
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['tab_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tabs_preloaded']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['tab_name']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				
				<?php if ((is_numeric($_smarty_tpl->tpl_vars['value']->value))){?>
					if ($("#product-tab-content-"+'<?php echo $_smarty_tpl->tpl_vars['tab_name']->value;?>
').hasClass('not-loaded'))
						tabs_to_preload.push('<?php echo $_smarty_tpl->tpl_vars['tab_name']->value;?>
');
				<?php }?>
			<?php } ?>

			// Recursively load tabs starting with the first element of stack
			tabs_manager.displayBulk(tabs_to_preload);
			$('.productTabs').show();
			$('#product_form').show();
			$('#product-tab-content-wait').hide();
		});
	</script>
	
	
	
	<script type="text/javascript">
		// <![CDATA[
			ThickboxI18nImage = "<?php echo smartyTranslate(array('s'=>'Image'),$_smarty_tpl);?>
";
			ThickboxI18nOf = "<?php echo smartyTranslate(array('s'=>'of'),$_smarty_tpl);?>
";
			ThickboxI18nClose = "<?php echo smartyTranslate(array('s'=>'Close'),$_smarty_tpl);?>
";
			ThickboxI18nOrEscKey = "<?php echo smartyTranslate(array('s'=>'(or "Esc")'),$_smarty_tpl);?>
";
			ThickboxI18nNext = "<?php echo smartyTranslate(array('s'=>'Next >'),$_smarty_tpl);?>
";
			ThickboxI18nPrev = "<?php echo smartyTranslate(array('s'=>'< Previous'),$_smarty_tpl);?>
";
			tb_pathToImage = "../img/loadingAnimation.gif";
		//]]>
	</script>

	<div id="product-tab-content-wait" style="display:none"><div id="loading"><?php echo smartyTranslate(array('s'=>'Loading...'),$_smarty_tpl);?>
</div></div>

	<form id="product_form" action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
" method="post" enctype="multipart/form-data" name="product" style="display:none;">
		<input type="hidden" name="id_product" value="<?php echo $_smarty_tpl->tpl_vars['id_product']->value;?>
" />
		<input type="hidden" id="is_virtual" name="is_virtual" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value->is_virtual, 'html', 'UTF-8');?>
" />
		<div class="tab-pane" id="tabPane1">
		<?php if (!$_smarty_tpl->tpl_vars['product']->value->active&&$_smarty_tpl->tpl_vars['product']->value->isAssociatedToShop()){?>
			<div class="warn draft" >
				<p>
					<span style="float: left">
					<?php echo smartyTranslate(array('s'=>'Your product will be saved as a draft.'),$_smarty_tpl);?>
</span>
					<span style="float:right"><a href="#" class="button" style="display: block" onclick="submitAddProductAndPreview()" ><?php echo smartyTranslate(array('s'=>'Save and preview.'),$_smarty_tpl);?>
</a></span>
					<input type="hidden" name="fakeSubmitAddProductAndPreview" id="fakeSubmitAddProductAndPreview" />
					<br />
				</p>
				</div>
		<?php }?>
		
			<?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab']->_loop = false;
 $_smarty_tpl->tpl_vars['numStep'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product_tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
$_smarty_tpl->tpl_vars['tab']->_loop = true;
 $_smarty_tpl->tpl_vars['numStep']->value = $_smarty_tpl->tpl_vars['tab']->key;
?>
				<div id="product-tab-content-<?php echo $_smarty_tpl->tpl_vars['tab']->value['id'];?>
" class="<?php if (!$_smarty_tpl->tpl_vars['tab']->value['selected']){?>not-loaded<?php }?> product-tab-content" <?php if (!$_smarty_tpl->tpl_vars['tab']->value['selected']){?>style="display:none"<?php }?>>
					<?php if ($_smarty_tpl->tpl_vars['tab']->value['selected']){?>
						<?php echo $_smarty_tpl->tpl_vars['custom_form']->value;?>

					<?php }?>
				</div>
			<?php } ?>
		</div>
		<input type="hidden" name="id_product_attribute" id="id_product_attribute" value="0" />
		<input type="hidden" name="key_tab" id="key_tab" value="Informations" />
		<input id="product_form_submit_btn"  type="submit" value="<?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
" name="submitAddproduct" class="button" />
	</form>
	
	<br/>



<?php if (isset($_smarty_tpl->tpl_vars['tinymce']->value)&&$_smarty_tpl->tpl_vars['tinymce']->value){?>
	<script type="text/javascript">

	var iso = '<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
';
	var pathCSS = '<?php echo @constant('_THEME_CSS_DIR_');?>
';
	var ad = '<?php echo $_smarty_tpl->tpl_vars['ad']->value;?>
';

	$(document).ready(function(){
		
	// Execute when tab Informations has finished loading
	tabs_manager.onLoad('Informations', function(){
		tinySetup({
			editor_selector :"autoload_rte",
			setup : function(ed) {
				ed.onInit.add(function(ed)
				{
					if (typeof ProductMultishop.load_tinymce[ed.id] != 'undefined')
					{
						if (typeof ProductMultishop.load_tinymce[ed.id])
							ed.hide();
						else
							ed.show();
					}
				});

				ed.onKeyUp.add(function(ed, e) {
					tinyMCE.triggerSave();
					textarea = $('#'+ed.id);
					max = textarea.parent('div').find('span.counter').attr('max');
					if (max != 'none')
					{
						textarea_value = textarea.val();
						count = stripHTML(textarea_value).length;
						rest = max - count;
						if (rest < 0)
							textarea.parent('div').find('span.counter').html('<span style="color:red;"><?php echo smartyTranslate(array('s'=>'Maximum'),$_smarty_tpl);?>
 '+max+' <?php echo smartyTranslate(array('s'=>'characters'),$_smarty_tpl);?>
 : '+rest+'</span>');
						else
							textarea.parent('div').find('span.counter').html(' ');
					}
				});
			}
		});
	});

	});
	</script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['firstCall']->value){?>
	<script type="text/javascript">
		var module_dir = '<?php echo @constant('_MODULE_DIR_');?>
';
		var id_language = <?php echo $_smarty_tpl->tpl_vars['defaultFormLanguage']->value;?>
;
		var languages = new Array();
		var vat_number = <?php if ($_smarty_tpl->tpl_vars['vat_number']->value){?>1<?php }else{ ?>0<?php }?>;
		// Multilang field setup must happen before document is ready so that calls to displayFlags() to avoid
		// precedence conflicts with other document.ready() blocks
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
			languages[<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
] = {
				id_lang: <?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
,
				iso_code: '<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
',
				name: '<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
',
				is_default: '<?php echo $_smarty_tpl->tpl_vars['language']->value['is_default'];?>
'
			};
		<?php } ?>
		// we need allowEmployeeFormLang var in ajax request
		allowEmployeeFormLang = <?php echo intval($_smarty_tpl->tpl_vars['allowEmployeeFormLang']->value);?>
;
		employee_token = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminEmployees'),$_smarty_tpl);?>
';
		displayFlags(languages, id_language, allowEmployeeFormLang);

		$(document).ready(function() {
			<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['id_state'])){?>
				if ($('#id_country') && $('#id_state'))
				{
					ajaxStates(<?php echo $_smarty_tpl->tpl_vars['fields_value']->value['id_state'];?>
);
					$('#id_country').change(function() {
						ajaxStates();
					});
				}
			<?php }?>

			if ($(".datepicker").length > 0)
				$(".datepicker").datepicker({
					prevText: '',
					nextText: '',
					dateFormat: 'yy-mm-dd'
				});

		});
	state_token = '<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminStates'),$_smarty_tpl);?>
';
	
	</script>
<?php }?>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 13:24:55
         compiled from "/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/form/form_group.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5307378759a239_66965204')) {function content_5307378759a239_66965204($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['groups']->value)&&isset($_smarty_tpl->tpl_vars['groups']->value)){?>
<table cellspacing="0" cellpadding="0" class="table" style="width:28em;">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'groupBox[]', this.checked)" />
		</th>
		<th><?php echo smartyTranslate(array('s'=>'ID'),$_smarty_tpl);?>
</th>
		<th><?php echo smartyTranslate(array('s'=>'Group name'),$_smarty_tpl);?>
</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2){?>class="alt_row"<?php }?>>
			<td>
				<?php $_smarty_tpl->tpl_vars['id_checkbox'] = new Smarty_variable((('groupBox').('_')).($_smarty_tpl->tpl_vars['group']->value['id_group']), null, 0);?>
				<input type="checkbox" name="groupBox[]" class="groupBox" id="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id_group'];?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]){?>checked="checked"<?php }?> />
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['group']->value['id_group'];?>
</td>
			<td><label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="t"><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</label></td>
		</tr>
	<?php } ?>
</table>
<?php }else{ ?>
<p><?php echo smartyTranslate(array('s'=>'No group created'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 13:24:55
         compiled from "/home/pavel/public_html/clients/autoparts/admin2605/themes/default/template/helpers/form/form_category.tpl" */ ?>
<?php if ($_valid && !is_callable('content_530737875fc0e6_33736009')) {function content_530737875fc0e6_33736009($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['categories']->value)&&isset($_smarty_tpl->tpl_vars['categories']->value)){?>
	<script type="text/javascript">
		var inputName = '<?php echo addcslashes($_smarty_tpl->tpl_vars['categories']->value['input_name'],'\'');?>
';
		var use_radio = <?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>1<?php }else{ ?>0<?php }?>;
		var selectedCat = <?php echo intval(implode($_smarty_tpl->tpl_vars['categories']->value['selected_cat']));?>
;
		var selectedLabel = '<?php echo addcslashes($_smarty_tpl->tpl_vars['categories']->value['trads']['selected'],'\'');?>
';
		var home = '<?php echo addcslashes($_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['name'],'\'');?>
';
		var use_radio = <?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>1<?php }else{ ?>0<?php }?>;
		var use_context = <?php if (isset($_smarty_tpl->tpl_vars['categories']->value['use_context'])){?>1<?php }else{ ?>0<?php }?>;
		$(document).ready(function(){
			buildTreeView(use_context);
		});
	</script>
	<div class="category-filter">
		<span><a href="#" id="collapse_all"><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Collapse All'];?>
</a>|&nbsp;</span>
	 	<span><a href="#" id="expand_all"><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Expand All'];?>
</a>|&nbsp;</span>		 
		<?php if (!$_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>
		<span><a href="#" id="check_all"><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Check All'];?>
</a>|&nbsp;</span>
		<span><a href="#" id="uncheck_all"><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Uncheck All'];?>
</a>|&nbsp;</span>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['categories']->value['use_search']){?>
			<span style="margin-left:20px">
				<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['search'];?>
:&nbsp;
				<form method="post" id="filternameForm">
					<input type="text" name="search_cat" id="search_cat"/>
				</form>
			</span>
		<?php }?>
	</div>
	<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(false, null, 0);?>
	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value['selected_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
		<?php if (is_array($_smarty_tpl->tpl_vars['cat']->value)){?>
			<?php if ($_smarty_tpl->tpl_vars['cat']->value['id_category']!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
				<input <?php if (in_array($_smarty_tpl->tpl_vars['cat']->value['id_category'],$_smarty_tpl->tpl_vars['categories']->value['disabled_categories'])){?>disabled="disabled"<?php }?> type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id_category'];?>
"/>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(true, null, 0);?>
			<?php }?>
		<?php }else{ ?>
			<?php if ($_smarty_tpl->tpl_vars['cat']->value!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
				<input <?php if (in_array($_smarty_tpl->tpl_vars['cat']->value,$_smarty_tpl->tpl_vars['categories']->value['disabled_categories'])){?>disabled="disabled"<?php }?> type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
"/>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(true, null, 0);?>
			<?php }?>
		<?php }?>
	<?php } ?>
	<ul id="categories-treeview" class="filetree">
		<li id="<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category'];?>
" class="hasChildren">
			<span class="folder">
				<?php if ($_smarty_tpl->tpl_vars['categories']->value['top_category']->id!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
					<input type="<?php if (!$_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>checkbox<?php }else{ ?>radio<?php }?>"
							name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
"
							value="<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category'];?>
"
							<?php if ($_smarty_tpl->tpl_vars['home_is_selected']->value){?>checked="checked"<?php }?>
							onclick="clickOnCategoryBox($(this));"/>
						<span class="category_label"><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['name'];?>
</span>
				<?php }else{ ?>
					&nbsp;
				<?php }?>
			</span>
			<ul>
				<li><span class="placeholder">&nbsp;</span></li>
		  	</ul>
		</li>
	</ul>
	<?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>
	<script type="text/javascript">
		searchCategory();
	</script>
	<?php }?>
<?php }?><?php }} ?>