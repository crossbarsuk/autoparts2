{if $MENU != ''}
  <!-- blockuppermenu -->
  {*<div class="categories_left_menu clearfix">
    <div class="border_bot_red">
      <h1>{l s='Каталог товаров'}</h1>
    </div>
      {if $onsaleLink || $hitLink || $newLink}
          <ul class="clearfix margTop10">
              {if $newLink}<li class=""><a href="{$newLink}">{l s='new' mod='blockuppermenu'}<span class="cat_icon" style="background-image:url();"></span></a></li>{/if}
              {if $hitLink}<li class=""><a href="{$hitLink}">{l s='hit' mod='blockuppermenu'}<span class="cat_icon" style="background-image:url();"></span></a></li>{/if}
              {if $onsaleLink}<li class=""><a href="{$onsaleLink}">{l s='sale' mod='blockuppermenu'}<span class="cat_icon" style="background-image:url();"></span></a></li>{/if}
          </ul>
      {/if}
    <ul class="clearfix margTop10 sf-menu">
      {$MENU}
    </ul>
  </div>*}

  <nav class="main_menu margBot15 clearfix">
    <ul>
      {*{foreach from=$menulinks item=menulink}
        <li{if $menulink.selected eq '1'} class="selected"{/if}><a href="{$menulink.link|escape:'htmlall':'UTF-8'}">{$menulink.title|escape:html:'UTF-8'}</a></li>
      {/foreach}*}
      {$MENU}
    </ul>
  </nav>
  
  
  
  <!--/ blockuppermenu -->
{/if}