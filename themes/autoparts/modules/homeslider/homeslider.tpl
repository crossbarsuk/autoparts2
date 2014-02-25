<!-- Module HomeSlider -->
{if isset($homeslider)}
<script type="text/javascript">
{if isset($homeslider_slides) && $homeslider_slides|@count > 1}
	{if $homeslider.loop == 1}
		var homeslider_loop = true;
	{else}
		var homeslider_loop = false;
	{/if}
{else}
	var homeslider_loop = false;
{/if}
var homeslider_speed = {$homeslider.speed};
var homeslider_pause = {$homeslider.pause};
</script>
{/if}
{if isset($homeslider_slides)}
<div class="block">
  <ul id="homeslider">
  {foreach from=$homeslider_slides item=slide}
    {if $slide.active}
      <li>
        <a href="{$slide.url|escape:'htmlall':'UTF-8'}" title="{$slide.description|escape:'htmlall':'UTF-8'}">
        <img src="{$link->getMediaLink("`$module_dir`images/`$slide.image|escape:'htmlall':'UTF-8'`")}" alt="{$slide.legend|escape:'htmlall':'UTF-8'}" height="{$homeslider.height|intval}" width="{$homeslider.width|intval}" />
        </a>
      </li>
    {/if}
  {/foreach}
  </ul>
</div>
{/if}
<!-- /Module HomeSlider -->
