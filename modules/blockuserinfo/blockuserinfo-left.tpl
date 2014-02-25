<!-- Block user information module LEFT -->
<div id="user_info" class="block informations_block_left">
  <h4 class="title_block">{l s='Ваше меню' mod='blockuserinfo'}</h4>
  <div class="profile_inf">
    <p class="balance">{l s='Баланс:' mod='blockuserinfo'} 60.00 {$context->currency->sign}</p>
    <p class="discount">{l s='Уровень скидки:' mod='blockuserinfo'} <b>опт 2</b></p>
  </div>
  <ul class="block_content">
    <li class="bullet"><a href="{$link->getPageLink('my-account')|escape:'html'}" title="{l s='Личный кабинет' mod='blockuserinfo'}">{l s='Личный кабинет' mod='blockuserinfo'}</a>
    </li>
    <li class="bullet"><a href="{$link->getPageLink('order')|escape:'html'}" title="{l s='Корзина' mod='blockuserinfo'}">{l s='Корзина' mod='blockuserinfo'}</a>
    </li>
    <li class="bullet"><a href="{$link->getPageLink('history')|escape:'html'}" title="{l s='Заказы' mod='blockuserinfo'}">{l s='Заказы' mod='blockuserinfo'}</a>
    </li>
    <li class="bullet"><a href="{$link->getPageLink('history')|escape:'html'}" title="{l s='Автомобили' mod='blockuserinfo'}">{l s='Автомобили' mod='blockuserinfo'}</a>
    </li>
    <li class="bullet"><a href="{$link->getPageLink('history')|escape:'html'}" title="{l s='Запросы по VIN' mod='blockuserinfo'}">{l s='Запросы по VIN' mod='blockuserinfo'}</a>
    </li>
    <li class="bullet"><a href="{$link->getPageLink('history')|escape:'html'}" title="{l s='Баланс' mod='blockuserinfo'}">{l s='Баланс' mod='blockuserinfo'}</a>
    </li>
  </ul>
</div>
<!-- /Block user information module LEFT -->
