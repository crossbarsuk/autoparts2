{capture name=path}{l s='My account'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}

<div class="my_account block">
<h1>{l s='My account'}</h1>
{if isset($account_created)}
	<p class="success">
		{l s='Your account has been created.'}
	</p>
{/if}
{*<p class="title_block">{l s='Welcome to your account. Here you can manage al of your personal information and orders. '}</p>*}
<div class="myaccount_lnk_list">
	<div class="row">
	  <div class="col"><a href="{$link->getPageLink('order', true)|escape:'html'}" title="{l s='Cart'}"><img src="{$img_dir}/pc_item1.png" alt="{l s='Cart'}" class="icon" /><span>{l s='Cart'}</span></a><p>{l s='Содержимое вашей виртуальной корзины. Срок хранения товаров в корзине ограничен - не более 3-х дней'}</p></div>
    <div class="col"><a href="{$link->getPageLink('history', true)|escape:'html'}" title="{l s='Orders'}"><img src="{$img_dir}/pc_item2.png" alt="{l s='Orders'}" class="icon" /><span>{l s='Orders'}</span></a><p>{l s='Мониторинг заказов, просмотр всех заказов, экспорт данных'}</p></div>
	{*{if $returnAllowed}
		<li><a href="{$link->getPageLink('order-follow', true)|escape:'html'}" title="{l s='Merchandise returns'}"><img src="{$img_dir}icon/return.gif" alt="{l s='Merchandise returns'}" class="icon" /><p>{l s='My merchandise returns'}</p></a></li>
	{/if}*}
  </div>
  <div class="row">
    <div class="col"><a href="{*{$link->getPageLink('history', true)|escape:'html'}*}" title="{l s='Автомобили'}"><img src="{$img_dir}/pc_item3.png" alt="{l s='Автомобили'}" class="icon" /><span>{l s='Автомобили'}</span></a><p>{l s='Сохраняйте ваши автомобили для быстрого поиска деталей в каталогах и запросов по наименованию.'}</p></div>
    <div class="col"><a href="{$link->getPageLink('history', true)|escape:'html'}" title="{l s='Запросы по VIN'}"><img src="{$img_dir}/pc_item4.png" alt="{l s='Запросы по VIN'}" class="icon" /><span>{l s='Запросы по VIN'}</span></a><p>{l s='Мониторинг заказов, просмотр всех заказов, экспорт данных'}</p></div>
  </div>
  <div class="row">
    <div class="col"><a href="{$link->getPageLink('addresses', true)|escape:'html'}" title="{l s='Addresses'}"><img src="{$img_dir}icon/addrbook.gif" alt="{l s='Addresses'}" class="icon" /><span>{l s='Addresses'}</span></a><p>{l s=''}</p></div>
    <div class="col"><a href="{$link->getPageLink('identity', true)|escape:'html'}" title="{l s='Settings'}"><img src="{$img_dir}/pc_item6.png" alt="{l s='Settings'}" class="icon" /><span>{l s='Settings'}</span></a><p>{l s='Settings'}</p></div>
  </div>
	{if $voucherAllowed}
    <div class="col"><a href="{$link->getPageLink('discount', true)|escape:'html'}" title="{l s='Vouchers'}"><img src="{$img_dir}icon/voucher.gif" alt="{l s='Vouchers'}" class="icon" /><span>{l s='Vouchers'}</span></a><p>{l s='My vouchers'}</p></div>
	{/if}
  {if $has_customer_an_address}
    <li><a href="{$link->getPageLink('address', true)|escape:'html'}" title="{l s='Add my first address'}"><img src="{$img_dir}/pc_item1.png" alt="{l s='Add my first address'}" class="icon" /> {l s='Add my first address'}</a></li>
  {/if}
	{$HOOK_CUSTOMER_ACCOUNT}
</div>
{*<p><a href="{$base_dir}" title="{l s='Home'}"><img src="{$img_dir}icon/home.gif" alt="{l s='Home'}" class="icon" /></a><a href="{$base_dir}" title="{l s='Home'}">{l s='Home'}</a></p>*}
</div>