{if isset($orderby) AND isset($orderway)}

{* On 1.5 the var request is setted on the front controller. The next lines assure the retrocompatibility with some modules *}
{if !isset($request)}
	<!-- Sort products -->
	{if isset($smarty.get.id_category) && $smarty.get.id_category}
		{assign var='request' value=$link->getPaginationLink('category', $category, false, true)}
	{elseif isset($smarty.get.id_manufacturer) && $smarty.get.id_manufacturer}
		{assign var='request' value=$link->getPaginationLink('manufacturer', $manufacturer, false, true)}
	{elseif isset($smarty.get.id_supplier) && $smarty.get.id_supplier}
		{assign var='request' value=$link->getPaginationLink('supplier', $supplier, false, true)}
	{else}
		{assign var='request' value=$link->getPaginationLink(false, false, false, true)}
	{/if}
{/if}
{if !isset($paginationId) || $paginationId == ''}
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	if($('#layered_form').length == 0)
	{
 		$('.selectProductSort').change(function(){
			var requestSortProducts = '{$request}';
 			var splitData = $(this).val().split(':');
			document.location.href = requestSortProducts + ((requestSortProducts.indexOf('?') < 0) ? '?' : '&') + 'orderby=' + splitData[0] + '&orderway=' + splitData[1];
    	});
  	}
});
//]]>
</script>
{/if}
<form id="productsSortForm{if isset($paginationId)}_{$paginationId}{/if}" action="{$request|escape:'htmlall':'UTF-8'}" class="productsSortForm">
	<p class="select">
		
		<select id="selectPrductSort{if isset($paginationId)}_{$paginationId}{/if}" class="selectProductSort">
			<option value="{$orderbydefault|escape:'htmlall':'UTF-8'}:{$orderwaydefault|escape:'htmlall':'UTF-8'}" {if $orderby eq $orderbydefault}selected="selected"{/if}>{l s='--'}</option>
			{if !$PS_CATALOG_MODE}
				<option value="price:asc" {if $orderby eq 'price' AND $orderway eq 'asc'}selected="selected"{/if}>{l s='Price: Lowest first'}</option>
				<option value="price:desc" {if $orderby eq 'price' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='Price: Highest first'}</option>
			{/if}
			<option value="name:asc" {if $orderby eq 'name' AND $orderway eq 'asc'}selected="selected"{/if}>{l s='Product Name: A to Z'}</option>
			<option value="name:desc" {if $orderby eq 'name' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='Product Name: Z to A'}</option>
			{if $PS_STOCK_MANAGEMENT && !$PS_CATALOG_MODE}
				<option value="quantity:desc" {if $orderby eq 'quantity' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='In stock'}</option>
			{/if}
			<option value="reference:asc" {if $orderby eq 'reference' AND $orderway eq 'asc'}selected="selected"{/if}>{l s='Reference: Lowest first'}</option>
			<option value="reference:desc" {if $orderby eq 'reference' AND $orderway eq 'desc'}selected="selected"{/if}>{l s='Reference: Highest first'}</option>
		</select>
    <label for="selectPrductSort{if isset($paginationId)}_{$paginationId}{/if}">{l s='Sort by'}</label>
	</p>
</form>
<!-- /Sort products -->
{/if}
