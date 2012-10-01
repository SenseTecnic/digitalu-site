$(document).ready( function(){
	
	if (isTouchDevice()){
		initSlider();
	}
	
	$('.content').load('templates/what.html');
	$('#nav-what').addClass('active');
	
});



$('.nav-link').live('click', function(){
	$('.active').removeClass('active');
	var id = $(this).parent().addClass('active').attr('id').split('-');
	id = id[1];
	$('.content').load('templates/' + id + '.html');	
});

// Detects if the phone is a touch device
function isTouchDevice() {
	return !!('ontouchstart' in window);
}

function initSlider(){
	
	alert("Loading slider...");
	//Load the Javascript file
	$.getScript('lib/swipe.min.js', function() {
        alert("Script loaded!");
    });	
}