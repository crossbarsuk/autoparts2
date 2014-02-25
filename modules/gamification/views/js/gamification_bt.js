$(document).ready( function () {
	gamificationTasks();
});

function gamificationTasks()
{
	$('#gamification_notif').remove();
	$('#customer_messages_notif').after('<div id="gamification_notif" class="notifs"></div>');
	$.ajax({
		type: 'POST',
		url: admin_gamification_ajax_url,
		dataType: 'json',
		data: {
			controller : 'AdminGamification',
			action : 'gamificationTasks',
			ajax : true,
			id_tab : current_id_tab
		},
		success: function(jsonData)
		{
			for (var i in jsonData.advices_to_display.advices)
				if (jsonData.advices_to_display.advices[i].location == 'after')
					$(jsonData.advices_to_display.advices[i].selector).after(jsonData.advices_to_display.advices[i].html);
				else
					$(jsonData.advices_to_display.advices[i].selector).before(jsonData.advices_to_display.advices[i].html);
				
			//display close button only for last version of the module
			$('.gamification_close').show();
			
			$('.gamification_close').on('click', function () {
				if (confirm(hide_advice))
					adviceCloseClick($(this).attr('id'));
				return false;
			});
			
			initHeaderNotification(jsonData.header_notification);
			
			$('.gamification_fancybox').fancybox();
			
			$(".preactivationLink").on('click', function() {
				preactivationLinkClick($(this).attr("rel"));
			});
		}
	});
}

function initHeaderNotification(html)
{
	$('#gamification_notif').remove();
	$('#customer_messages_notif').after(html);
	$('.gamification_notif').click(function () {
		if ($('#gamification_notif_wrapper').parent().css('display') == 'none')
		{
			disabledGamificationNotification();
			$('#gamification_notif_value').html(0);
			$('#gamification_notif_number_wrapper').hide();

			if (typeof(admintab_gamification) != "undefined")
			{
				$('#gamification_progressbar').progressbar({
					change: function() {
				        if (current_level_percent)
				        	$( ".gamification_progress-label" ).html( gamification_level+' '+current_level+' : '+$('#gamification_progressbar').progressbar( "value" ) + "%" );
				        else
				        	$( ".gamification_progress-label" ).html('');
				      },
		     	});
				$('#gamification_progressbar').progressbar("value", current_level_percent );
			}
		}
	});

	if (parseInt($('#gamification_notif_value').html()) == 0)
		$('#gamification_notif_number_wrapper').hide();
	
	if ($('.dropdown-toggle').length)
		$('.dropdown-toggle').dropdown();
}

function disabledGamificationNotification()
{
	$.ajax({
		type: 'POST',
		url: admin_gamification_ajax_url,
		data: {
			controller : 'AdminGamification',
			action : 'disableNotification',
			ajax : true
		},
		success: function(jsonData)
		{
			$('#gamification_notif_value').html(0);
			$('#gamification_notif_number_wrapper').hide();
		}
	});
}

function initBubbleDescription()
{
	$('.badge_square').each( function () {
		if ($(this).children('.gamification_badges_description').text().length)
		{
			$(this).CreateBubblePopup({
				position : 'top',
				openingDelay:0,
				alwaysVisible: false,
				align	 : 'center',
				innerHtml: $(this).children('.gamification_badges_description').text(),
				innerHtmlStyle: { color:'#000',  'text-align':'center' },
				themeName: 'black',
				themePath: '../modules/gamification/views/jquerybubblepopup-themes'		 
			});
		}
	});
}


function filterBadge(type)
{
	group = '.'+$('#group_select_'+type+' option:selected').val();
	status = '.'+$('#status_select_'+type+' option:selected').val();
	level = '.'+$('#level_select_'+type+' option:selected').val();

	if (group == '.undefined')
		group = '';
	if (status == '.undefined')
		status = '';
	if (level == '.undefined')
		level = '';
	
	$('#list_'+type).isotope({filter: '.badge_square'+group+status+level, animationEngine : 'css'});
	
	if (!$('#list_'+type+' li').not('.isotope-hidden').length)
		$('#no_badge_'+type).fadeIn();
	else
		$('#no_badge_'+type).fadeOut();
}


function preactivationLinkClick(module) {
	$.ajax({
		url : admin_gamification_ajax_url,
		data : {
			ajax : "1",
			controller : "AdminGamification",
			action : "savePreactivationRequest",
			module : module,
		},
		type: 'POST',
		success : function(jsonData){

		}
	});
}

function adviceCloseClick(id_advice) {
	$.ajax({
		url : admin_gamification_ajax_url,
		data : {
			ajax : "1",
			controller : "AdminGamification",
			action : "closeAdvice",
			id_advice : id_advice,
		},
		type: 'POST',
		success : function(jsonData){
			
		}	
	});
	$('#wrap_id_advice_'+id_advice).fadeOut();
	$('#wrap_id_advice_'+id_advice).html('<img src="'+advice_hide_url+id_advice+'.png"/>');
}
