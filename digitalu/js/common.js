//TODO - remove after dev
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});

$(document).ready( function(){

	$('#nav-what').addClass('active');
	truncateText();
	
});



$('.nav-link').live('click', function(){
	
	var activeID = $('.active').attr('id').split('-');
	activeID = activeID[1];	
	$('.active').removeClass('active');
	$('#' + activeID).hide();	
	
	var id = $(this).parent().addClass('active').attr('id').split('-');
	id = id[1];
	$('#' + id).show();
});

function truncateText(){
	if ($(window).width() < 500)
		$("#nav-register").find('a').text("Reg.");
	else 
		$("#nav-register").find('a').text("Register");
}

$(window).resize(function() {
	truncateText();
});
