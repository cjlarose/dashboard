$(document).ready(function() {
	
	if ($('.host-table').length > 0) {
		col_span = $('.host-table tr')[0].children.length;
		console.log(col_span);
	}
	
	$('.host-table tbody tr')
		.each(function(index, element) {
			$(element).data('host_address', $(this).children('td:first-child').contents().last().text())
		})
		.hover(function() {$(this).addClass('hover');}, function() {$(this).removeClass('hover')})
		.after("<tr class=\"host-info\"><td colspan=\""+col_span+"\"></td></tr>")
		.click(function() {
			if (!$(this).hasClass('active')) {
				// set active class
				$('.host-table tbody tr.active').removeClass('active').next().hide();
				$(this).addClass('active');
				
				// show host info row
				host_address = $(this).data('host_address');
				console.log(host_address);
				$(this).next().show().find('td')
					.load('http://128.196.142.26/nagios-dashboard/services/ajax_view/' + host_address);
			} else {
				$(this).removeClass('active');
				$(this).next().hide();	
			}
		});

	$('tr.host-info').hide();
});
