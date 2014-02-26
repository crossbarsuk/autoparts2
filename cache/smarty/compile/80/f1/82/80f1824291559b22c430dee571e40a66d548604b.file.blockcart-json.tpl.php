<?php /* Smarty version Smarty-3.1.14, created on 2014-02-21 10:19:14
         compiled from "/home/pavel/public_html/clients/autoparts/modules/blockcart/blockcart-json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34105947853070c02dec4a4-97512889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80f1824291559b22c430dee571e40a66d548604b' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/modules/blockcart/blockcart-json.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34105947853070c02dec4a4-97512889',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'link' => 0,
    'priceDisplay' => 0,
    'productAttributeId' => 0,
    'productId' => 0,
    'customizedDatas' => 0,
    'id_customization' => 0,
    'customization' => 0,
    'type' => 0,
    'datas' => 0,
    'index' => 0,
    'data' => 0,
    'discounts' => 0,
    'discount' => 0,
    'shipping_cost' => 0,
    'shipping_cost_float' => 0,
    'tax_cost' => 0,
    'wrapping_cost' => 0,
    'nb_total_products' => 0,
    'total' => 0,
    'product_total' => 0,
    'errors' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53070c030fa6f0_52021628',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53070c030fa6f0_52021628')) {function content_53070c030fa6f0_52021628($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/pavel/public_html/clients/autoparts/tools/smarty/plugins/modifier.replace.php';
?>
{
"products": [
<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['last'] = $_smarty_tpl->tpl_vars['product']->last;
?>
<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
	{
		"id":            <?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
,
		"link":          "<?php echo smarty_modifier_replace(addslashes($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute'])),'\\\'','\'');?>
",
		"quantity":      <?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity'];?>
,
		"priceByLine":   "<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==@constant('PS_TAX_EXC')){?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['total']),$_smarty_tpl);?>
<?php echo html_entity_decode(ob_get_clean(),2,'UTF-8')?><?php }else{ ?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['total_wt']),$_smarty_tpl);?>
<?php echo html_entity_decode(ob_get_clean(),2,'UTF-8')?><?php }?>",
		"name":          "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(html_entity_decode($_smarty_tpl->tpl_vars['product']->value['name'],2,'UTF-8'),15,'...',true), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
		"price":         "<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==@constant('PS_TAX_EXC')){?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['total']),$_smarty_tpl);?>
<?php echo html_entity_decode(ob_get_clean(),2,'UTF-8')?><?php }else{ ?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['total_wt']),$_smarty_tpl);?>
<?php echo html_entity_decode(ob_get_clean(),2,'UTF-8')?><?php }?>",
		"price_float":   "<?php echo $_smarty_tpl->tpl_vars['product']->value['total'];?>
",
		"idCombination": <?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?><?php echo $_smarty_tpl->tpl_vars['productAttributeId']->value;?>
<?php }else{ ?>0<?php }?>,
		"idAddressDelivery": <?php if (isset($_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])){?><?php echo $_smarty_tpl->tpl_vars['product']->value['id_address_delivery'];?>
<?php }else{ ?>0<?php }?>,
		"is_gift" : <?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])&&$_smarty_tpl->tpl_vars['product']->value['is_gift']){?>1<?php }else{ ?>0<?php }?>,
<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])){?>
		"hasAttributes": true,
		"attributes":    "<?php echo smarty_modifier_replace(addslashes($_smarty_tpl->tpl_vars['product']->value['attributes_small']),'\\\'','\'');?>
",
<?php }else{ ?>
		"hasAttributes": false,
<?php }?>
		"hasCustomizedDatas": <?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])){?>true<?php }else{ ?>false<?php }?>,
		"customizedDatas":[
		<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']])){?>
		<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['customization']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['customization']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value){
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
 $_smarty_tpl->tpl_vars['customization']->iteration++;
 $_smarty_tpl->tpl_vars['customization']->last = $_smarty_tpl->tpl_vars['customization']->iteration === $_smarty_tpl->tpl_vars['customization']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['customizedDatas']['last'] = $_smarty_tpl->tpl_vars['customization']->last;
?>{

			"customizationId":	<?php echo $_smarty_tpl->tpl_vars['id_customization']->value;?>
,
			"quantity":			"<?php echo $_smarty_tpl->tpl_vars['customization']->value['quantity'];?>
",
			"datas": [
				<?php  $_smarty_tpl->tpl_vars['datas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datas']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['datas']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['datas']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['datas']->key => $_smarty_tpl->tpl_vars['datas']->value){
$_smarty_tpl->tpl_vars['datas']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['datas']->key;
 $_smarty_tpl->tpl_vars['datas']->iteration++;
 $_smarty_tpl->tpl_vars['datas']->last = $_smarty_tpl->tpl_vars['datas']->iteration === $_smarty_tpl->tpl_vars['datas']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['customization']['last'] = $_smarty_tpl->tpl_vars['datas']->last;
?>
				{
					"type":	"<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
",
					"datas":
					[
					<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['data']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['data']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['data']->key;
 $_smarty_tpl->tpl_vars['data']->iteration++;
 $_smarty_tpl->tpl_vars['data']->last = $_smarty_tpl->tpl_vars['data']->iteration === $_smarty_tpl->tpl_vars['data']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['datas']['last'] = $_smarty_tpl->tpl_vars['data']->last;
?>
						{
						"index":			<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
,
						"value":			"<?php echo Tools::nl2br(smarty_modifier_replace(addslashes($_smarty_tpl->tpl_vars['data']->value['value']),'\\\'','\''));?>
",
						"truncatedValue":	"<?php echo Tools::nl2br(smarty_modifier_replace(addslashes($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['data']->value['value'],28,'...')),'\\\'','\''));?>
"
						}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['datas']['last']){?>,<?php }?>
					<?php } ?>]
				}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['customization']['last']){?>,<?php }?>
				<?php } ?>
			]
		}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['customizedDatas']['last']){?>,<?php }?>
		<?php } ?>
		<?php }?>
		]
	}<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['last']){?>,<?php }?>
<?php } ?><?php }?>
],
"discounts": [
<?php if ($_smarty_tpl->tpl_vars['discounts']->value){?><?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['discount']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['discount']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value){
$_smarty_tpl->tpl_vars['discount']->_loop = true;
 $_smarty_tpl->tpl_vars['discount']->iteration++;
 $_smarty_tpl->tpl_vars['discount']->last = $_smarty_tpl->tpl_vars['discount']->iteration === $_smarty_tpl->tpl_vars['discount']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['discounts']['last'] = $_smarty_tpl->tpl_vars['discount']->last;
?>
	{
		"id":              "<?php echo $_smarty_tpl->tpl_vars['discount']->value['id_discount'];?>
",
		"name":            "<?php echo smarty_modifier_replace(addslashes($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate((($_smarty_tpl->tpl_vars['discount']->value['name']).(' : ')).($_smarty_tpl->tpl_vars['discount']->value['description']),18,'...')),'\\\'','\'');?>
",
		"description":     "<?php echo smarty_modifier_replace(addslashes($_smarty_tpl->tpl_vars['discount']->value['description']),'\\\'','\'');?>
",
		"nameDescription": "<?php echo smarty_modifier_replace(addslashes($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate((($_smarty_tpl->tpl_vars['discount']->value['name']).(' : ')).($_smarty_tpl->tpl_vars['discount']->value['description']),18,'...')),'\\\'','\'');?>
",
		"code":            "<?php echo $_smarty_tpl->tpl_vars['discount']->value['code'];?>
",
		"link":            "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true,null,"deleteDiscount=".((string)$_smarty_tpl->tpl_vars['discount']->value['id_discount'])), ENT_QUOTES, 'UTF-8', true);?>
",
		"price":           "<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']),$_smarty_tpl);?>
<?php echo html_entity_decode(ob_get_clean(),2,'UTF-8')?><?php }else{ ?><?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']),$_smarty_tpl);?>
<?php echo html_entity_decode(ob_get_clean(),2,'UTF-8')?><?php }?>",
		"price_float":     "<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1){?><?php echo $_smarty_tpl->tpl_vars['discount']->value['value_tax_exc'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['discount']->value['value_real'];?>
<?php }?>"
	}
	<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['discounts']['last']){?>,<?php }?>
<?php } ?><?php }?>
],
"shippingCost": "<?php echo html_entity_decode($_smarty_tpl->tpl_vars['shipping_cost']->value,2,'UTF-8');?>
",
"shippingCostFloat": "<?php echo html_entity_decode($_smarty_tpl->tpl_vars['shipping_cost_float']->value,2,'UTF-8');?>
",
<?php if (isset($_smarty_tpl->tpl_vars['tax_cost']->value)){?>
"taxCost": "<?php echo html_entity_decode($_smarty_tpl->tpl_vars['tax_cost']->value,2,'UTF-8');?>
",
<?php }?>
"wrappingCost": "<?php echo html_entity_decode($_smarty_tpl->tpl_vars['wrapping_cost']->value,2,'UTF-8');?>
",
"nbTotalProducts": "<?php echo $_smarty_tpl->tpl_vars['nb_total_products']->value;?>
",
"total": "<?php echo html_entity_decode($_smarty_tpl->tpl_vars['total']->value,2,'UTF-8');?>
",
"productTotal": "<?php echo html_entity_decode($_smarty_tpl->tpl_vars['product_total']->value,2,'UTF-8');?>
",
<?php if (isset($_smarty_tpl->tpl_vars['errors']->value)&&$_smarty_tpl->tpl_vars['errors']->value){?>
"hasError" : true,
"errors" : [
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['error']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['error']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value){
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
 $_smarty_tpl->tpl_vars['error']->iteration++;
 $_smarty_tpl->tpl_vars['error']->last = $_smarty_tpl->tpl_vars['error']->iteration === $_smarty_tpl->tpl_vars['error']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['errors']['last'] = $_smarty_tpl->tpl_vars['error']->last;
?>
	"<?php echo html_entity_decode(addslashes($_smarty_tpl->tpl_vars['error']->value),2,'UTF-8');?>
"
	<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['errors']['last']){?>,<?php }?>
<?php } ?>
]
<?php }else{ ?>
"hasError" : false
<?php }?>
}<?php }} ?>