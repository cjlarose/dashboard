$(document).ready(function() {
	
	if ($('.host-table').length > 0) {
		col_span = $('.host-table tr')[0].children.length;
		console.log(col_span);
	}
	
	$('.host-table tbody tr')
		.hover(function() {$(this).addClass('hover');}, function() {$(this).removeClass('hover')})
		.after("<tr class=\"host-info\"><td colspan=\""+col_span+"\">yoyoyo</td></tr>")
		.click(function() {
			if (!$(this).hasClass('active')) {
				// set active class
				$('.host-table tbody tr.active').removeClass('active').next().hide();
				$(this).addClass('active');
				
				// show host info row
				$(this).next().show(); 
			} else {
				$(this).removeClass('active');
				$(this).next().hide();	
			}
		});

	$('tr.host-info').hide();
});
