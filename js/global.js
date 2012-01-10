function base_url(destination) {
	if (!destination) destination = "";
	var url = window.location.href;
	var url_parts = url.split('/');
	//var domain_name_parts = url_parts[2].split(':');
	//var domain_name = domain_name_parts[0];
	return url_parts[0] + "//" + url_parts[2] + "/" + url_parts[3] + "/" + destination;
}

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
					.load(base_url('services/ajax_view/' + host_address));
			} else {
				$(this).removeClass('active');
				$(this).next().hide();	
			}
		});

	$('tr.host-info').hide();
});
