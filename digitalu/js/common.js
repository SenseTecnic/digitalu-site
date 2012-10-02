//TODO - remove after dev
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});

$(document).ready( function(){
	
	if (isTouchDevice()){
		initSlider();
	}
	
	//$('.content').load('templates/what.html');
	$('#nav-what').addClass('active');
	
});



$('.nav-link').live('click', function(){
	
	var activeID = $('.active').attr('id').split('-');
	activeID = activeID[1];	
	$('.active').removeClass('active');
	$('#' + activeID).hide();	
	
	var id = $(this).parent().addClass('active').attr('id').split('-');
	id = id[1];
	$('#' + id).show();
	//$('.content').load('templates/' + id + '.html');	
});

// Detects if the phone is a touch device
function isTouchDevice() {
	return !!('ontouchstart' in window);
}

function initSlider(){
	
	//Load the Javascript file
	$.getScript('lib/swipe.min.js', function() {
		//callback
	});	
}