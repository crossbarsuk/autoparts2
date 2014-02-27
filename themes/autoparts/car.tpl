<script type="text/javascript">
var linkEdit = '{$link->getPageLink('car', null, null, 'edit_mode=1&id_car=')}';
var linkDelete = '{$link->getPageLink('car', null, null, 'edit_mode=1&delete&id_car=')}';
var id_car = '{if isset($car->id_car)}{$car->id_car}{else}0{/if}';
var linkCatalog = 'http://www.elcats.ru/';
  
function ajaxQuery(params, callbackFunction) {
  $.ajax({
    type: 'POST',
    url: baseDir + 'index.php?controller=car&ajax&' + params,
    dataType: 'json',
    success: function(data) {
      if (data.status == 'ok') {
        callbackFunction(data);
      }
    }
  });
}

var updateModels = function(data) {
  $('#id_model').html(data.models);
  $('#id_model').trigger('refresh');
  $('#id_model').trigger('change');
}

var updateTypes = function(data) {
  $('#id_type').html(data.types);
  $('#id_type').trigger('refresh');
  $('#id_type').trigger('change');
}

var updateYears = function(data) {
  console.log(data);
  $('#year').html(data.years);
  $('#year').trigger('refresh');
  updateName();
}

var updateCar = function(data) {
  $('#carname').text(data.car.name);
  $('#vin').text(data.car.vin);
  $('#year').text(data.car.year);
  $('#linkEdit').prop('href', linkEdit + data.car.id_car);
  $('#linkDelete').prop('href', linkDelete + data.car.id_car);
  $('#linkCatalog').prop('href', data.car.manufacturer != '' ? linkCatalog + data.car.manufacturer + '/?carvin=' + data.car.vin : '#');
  
}

function changeManufacturer(id_manufacturer) {
  ajaxQuery('action=getmodels&id_car=' + id_car + '&id_manufacturer=' + id_manufacturer, updateModels);
}

function changeModel(id_model) {
  ajaxQuery('action=gettypes&id_car=' + id_car + '&id_model=' + id_model, updateTypes);
}

function changeType(id_type) {
  ajaxQuery('action=getyears&id_car=' + id_car + '&id_type=' + id_type, updateYears);
}

function updateName() {
  var name = $('#id_manufacturer > option:selected').text() + ' ' + $('#id_model > option:selected').text();
  
  $('#carname').html(name + ' ' + $('#year > option:selected').text() + ' {l s='г'}');
  $('#name').val(name);
}

function changeCar(id_car) {
  ajaxQuery('action=getcar&id_car=' + id_car, updateCar);
}

$(document).ready(function() {
  $('#id_manufacturer').change(function() {
    changeManufacturer($(this).val());
  });

  $('#id_model').change(function() {
    changeModel($(this).val());
  });

  $('#id_type').change(function() {
    changeType($(this).val());
  });

  $('#year').change(function() {
    updateName();
  });

  $('#id_car').change(function() {
    changeCar($(this).val());
  });

  $('#id_manufacturer').trigger('refresh');
  $('#id_manufacturer').trigger('change');
  $('#id_car').trigger('change');
});
</script>

{capture name=path}{l s='Ваши автомобили'}{/capture}
{include file="$tpl_dir./breadcrumb.tpl"}
<div class="block cars">
<h1><a href="{$link->getPageLink('car')}">{l s='Ваши автомобили'}</a></h1>

{if isset($edit_mode) && $edit_mode}
<h3>
  {if isset($car->id_car)}
    {l s='Изменить автомобиль'}
    {if isset($car->name)}
      "{$car->name|escape:'html'}"
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
      <select id="id_model" name="id_model"></select>
    </p>
    <p class="required select">
      <label for="id_type">{l s='Модификация'} <sup>*</sup></label>
      <select id="id_type" name="id_type"></select>
    </p>
    <p class="required select">
      <label for="year">{l s='Год выпуска'} <sup>*</sup></label>
      <select id="year" name="year"></select>
    </p>
    <p class="text">
      <span id="carname"></span>
      <input type="hidden" id="name" name="name" value=""/>
    </p>
    <p class="text">
      <label for="vin">{l s='VIN'}</label>
      <input type="text" id="vin" name="vin" value="{if isset($car->vin)}{$car->vin}{/if}" />
    </p>
		
	</fieldset>
	<p class="submit2">
		{if isset($car->id_car)}<input type="hidden" name="id_car" value="{$car->id_car|intval}"/>{/if}
		{if isset($back)}<input type="hidden" name="back" value="{$back}"/>{/if}
		{if isset($mod)}<input type="hidden" name="mod" value="{$mod}"/>{/if}
		<input type="hidden" name="token" value="{$token}" />		
		<input type="submit" name="submitCar" id="submitCar" value="{l s='Save'}" class="button" />
	</p>
</form>
{else}
  <p class="car_head">
    <select id="id_car" name="id_car">{$carList}</select>
  </p>
  <div class="car">
    <a href="#"><span class="img"><img id="img" alt="mazda 6" src="/themes/autoparts/img/car1.png"></span><span id="carname"></span></a>
    <p>VIN: <span id="vin"></span><br><span id="year"></span>{l s=' г'}</p>
    <div class="car_control">
      <a {*id=""*} title="Характеристики" href="#" class="car_characteristics">{l s='Характеристики'}</a>
      <a id="linkEdit" title="Изменить" href="#" class="car_edit">{l s='Изменить'}</a>
      <a id="linkDelete" title="Удалить" href="#" class="car_del">{l s='Удалить'}</a>
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
        <li><a id="linkCatalog" href="http://www.elcats.ru/hyundai/?carvin={$car->vin}">{l s='Оригинальный каталог'}</a></li>
        <li><a href="#">{l s='Открыть в новом окне'}</a></li>
        <li><a href="#">{l s='Общий каталог'}</a></li>
        <li><a href="#">{l s='Аксессуары'}</a></li>
        <li><a href="#">{l s='Шины'}</a></li>
        <li><a href="#">{l s='Диски колёсные'}</a></li>
        <li><a href="#">{l s='Автолитература'}</a></li>
      </ul>
      <ul>
        <li><a href="#">{l s='Масла и автохимия'}</a></li>
        <li><a href="#">{l s='Универсальные детали'}</a></li>
        <li><a href="#">{l s='Аккумуляторы'}</a></li>
        <li><a href="#">{l s='Обсуждение автомобиля'}</a></li>
      </ul>
    </div>
  </div>
{/if}
</div>