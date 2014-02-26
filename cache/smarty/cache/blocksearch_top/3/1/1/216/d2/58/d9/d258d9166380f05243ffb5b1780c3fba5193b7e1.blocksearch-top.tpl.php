<?php /*%%SmartyHeaderCode:14099189865306fa9d0c29a5-43201416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd258d9166380f05243ffb5b1780c3fba5193b7e1' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/themes/autoparts/modules/blocksearch/blocksearch-top.tpl',
      1 => 1392377601,
      2 => 'file',
    ),
    'dea7072bf7357b772c0d5742903b37b796379f91' => 
    array (
      0 => '/home/pavel/public_html/clients/autoparts/modules/blocksearch/blocksearch-instantsearch.tpl',
      1 => 1390208060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14099189865306fa9d0c29a5-43201416',
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_530c8fff246be3_88379761',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530c8fff246be3_88379761')) {function content_530c8fff246be3_88379761($_smarty_tpl) {?><!-- block seach mobile -->
<!-- Block search module TOP -->
<div id="search_block_top">
	<form method="get" action="http://auto.int/index.php?controller=search" id="searchbox">
		
			
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query" type="text" id="search_query_top" name="search_query" value="" placeholder="Введите номер запчасти"/>
			<input type="submit" name="submit_search" />
      <select>
        <option>Полное совпадение</option>
        <option>Произвольно</option>
      </select>
		
	</form>
</div>
	<script type="text/javascript">
	// <![CDATA[
		$('document').ready( function() {
			$("#search_query_top")
				.autocomplete(
					'http://auto.int/index.php?controller=search', {
						minChars: 3,
						max: 10,
						width: 500,
						selectFirst: false,
						scroll: false,
						dataType: "json",
						formatItem: function(data, i, max, value, term) {
							return value;
						},
						parse: function(data) {
							var mytab = new Array();
							for (var i = 0; i < data.length; i++)
								mytab[mytab.length] = { data: data[i], value: data[i].cname + ' > ' + data[i].pname };
							return mytab;
						},
						extraParams: {
							ajaxSearch: 1,
							id_lang: 1
						}
					}
				)
				.result(function(event, data, formatted) {
					$('#search_query_top').val(data.pname);
					document.location.href = data.product_link;
				})
		});
	// ]]>
	</script>

<!-- /Block search module TOP -->
<?php }} ?>