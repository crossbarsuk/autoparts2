<!-- block seach mobile -->
{if isset($hook_mobile)}
<div class="input_search" data-role="fieldcontain">
	<form method="get" action="{$link->getPageLink('search')|escape:'html'}" id="searchbox">
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query" type="search" id="search_query_top" name="search_query" placeholder="{l s='Search' mod='blocksearch'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" />
	</form>
</div>
{else}
<!-- Block search module TOP -->
<div id="search_block_top">
	<form method="get" action="{$link->getPageLink('search')|escape:'html'}" id="searchbox">
		{*<p>*}
			{*<label for="search_query_top"><!-- image on background --></label>*}
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query" type="text" id="search_query_top" name="search_query" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" placeholder="{l s='Введите номер запчасти' mod='blocksearch'}"/>
			<input type="submit" name="submit_search"{* value="{l s='Search' mod='blocksearch'}" class="button"*} />
      <select>
        <option>Полное совпадение</option>
        <option>Произвольно</option>
      </select>
		{*</p>*}
	</form>
</div>
{include file="$self/blocksearch-instantsearch.tpl"}
{/if}
<!-- /Block search module TOP -->
