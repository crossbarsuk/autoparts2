$(document).ready(function () {
	$('select[name=id_order]').change(function () {
		showProductSelect($(this).attr('value'));
	});

  setTimeout("showProductSelect($('select[name=id_order]').attr('value'));", 500);
});

function showProductSelect(id_order)
{
  $('.product_select').attr('disabled', 'disabled').closest('.jq-selectbox-wrapper').hide();
  $('#'+id_order+'_order_products').closest('.jq-selectbox-wrapper').show();
  $('#'+id_order+'_order_products').prop('disabled', false).trigger('refresh');
}