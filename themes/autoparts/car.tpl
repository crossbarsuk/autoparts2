{if isset($edit_mode) && $edit_mode == 1}
<script type="text/javascript">
function ajaxQuery(params, callbackFunction) {
  $.ajax({
    type: 'POST',
    url: baseDir + 'index.php?controller=car&ajax&' + params,
    dataType: 'json',
    success: function(data) {
      console.log(data);
      if (data.status == 'ok') {
        callbackFunction(data);
      }
    }
  });
}

var updateModels = function(data) {
  $('#id_model').html(data.models);
  $('#id_model').trigger('refresh');
}

var updateYears = function(data) {
  $('#year').html(data.years);
}

function changeManufacturer(id_manufacturer) {
  ajaxQuery('action=getmodels&id_manufacturer=' + id_manufacturer, updateModels);
}

function changeModel(id_model) {
  ajaxQuery('action=getyears&id_model=' + id_model, updateYears);
}



$(document).ready(function() {
  $('#id_manufacturer').change(function() {
    changeManufacturer($(this).val());
  });

  $('#id_model').change(function() {
    changeModel($(this).val());
  });

  $('#id_manufacturer').trigger('change');
  $('#id_model').trigger('change');
});

</script>
{/if}


{capture name=path}{l s='Ваши автомобили'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}
<div class="block cars">
<h1>{l s='Ваши автомобили'}</h1>

{if isset($edit_mode) && $edit_mode}
<h3>
  {if isset($id_car)}
    {l s='Изменить автомобиль'}
    {if isset($car.name)}
      "{$car.name|escape:'html'}"
    {/if}
  {else}
    {l s='Чтобы добавить автомобиль, заполните форму ниже.'}
  {/if}
</h3>
{/if}

{include file="$tpl_dir./errors.tpl"}

{if isset($edit_mode) && $edit_mode == 1}  
<p class="required"><sup>*</sup> {l s='Required field'}</p>

<form action="{$link->getPageLink('car', true)|escape:'html'}" method="post" class="std" id="add_car">
	<fieldset>
		<h3>{if isset($id_car)}{l s='Ваш автомобили'}{else}{l s='Новый автомобили'}{/if}</h3>
	
		<p class="required select">
			<label for="id_manufacturer">{l s='Марка'} <sup>*</sup></label>
			<select id="id_manufacturer" name="id_manufacturer">{$manufacturerList}</select>
		</p>
    <p class="required select">
      <label for="id_model">{l s='Модель'} <sup>*</sup></label>
      <select id="id_model" name="id_model">{$modelList}</select>
    </p>
    <p class="required select">
      <label for="year">{l s='Год выпуска'} <sup>*</sup></label>
      <select id="year" name="year"></select>
    </p>
    <p class="required select">
      <label for="id_mod">{l s='Модификация'} <sup>*</sup></label>
      <select id="id_mod" name="id_mod"></select>
    </p>
    <p class="text">
      <span id="carname"></span>
    </p>
    <p class="text">
      <label for="vin">{l s='VIN'}</label>
      <input type="text" id="vin" name="vin" value="{if isset($car.vin)}{$car.vin}{/if}" />
    </p>
		
	</fieldset>
	<p class="submit2">
		{if isset($id_car)}<input type="hidden" name="id_car" value="{$id_car|intval}"/>{/if}
		{if isset($back)}<input type="hidden" name="back" value="{$back}"/>{/if}
		{if isset($mod)}<input type="hidden" name="mod" value="{$mod}"/>{/if}
		<input type="hidden" name="token" value="{$token}" />		
		<input type="submit" name="submitCar" id="submitCar" value="{l s='Save'}" class="button" />
	</p>
</form>
{else}
  <div class="car_head">
    <select id="car" name="car" style="position: absolute; opacity: 0; height: 27px;">
      <option>Mazda Mazda 6 универсал</option>
      <option>Mazda Mazda 6 универсал</option>
      <option>Mazda Mazda 6 универсал</option>
      <option>Mazda Mazda 6 универсал</option>
    </select>
  </div>
  <div class="car">
    <a href="#">
              <span>
                  <img alt="mazda 6" src="img/car1.png">
              </span>
      Mazda Mazda 6 универсал I 2.0 CiTD 4WD</a>
    <p>VIN: JMZGY19R241141858
      <br> 2003 г.</p>
    <div class="car_control">
      <a title="Характеристики" href="#" class="car_characteristics">Characteristics</a>
      <a title="Изменить" href="#" class="car_edit">Edit</a>
      <a title="Удалить" href="#" class="car_del">Delete</a>
    </div>
  </div>
  <div class="car_inf">
    <h3>Данные</h3>
    <div class="tabs">
      <a href="#" class="active_item">Каталоги</a>
      <a href="#">Заказы</a>
      <a href="#">Запросы по VIN</a>
      <a href="#">Блокнот</a>
    </div>
    <div class="catalogs">
      <ul>
        <li><a href="#">Оригинальный каталог</a></li>
        <li><a href="#">Открыть в новом окне</a></li>
        <li><a href="#">Общий каталог</a></li>
        <li><a href="#">Аксессуары</a></li>
        <li><a href="#">Шины</a></li>
        <li><a href="#">Диски колёсные</a></li>
        <li><a href="#">Автолитература</a></li>
      </ul>
      <ul>
        <li><a href="#">Масла и автохимия</a></li>
        <li><a href="#">Универсальные детали</a></li>
        <li><a href="#">Аккумуляторы</a></li>
        <li><a href="#">Обсуждение автомобиля</a></li>
      </ul>
    </div>
  </div>
{/if}
</div>