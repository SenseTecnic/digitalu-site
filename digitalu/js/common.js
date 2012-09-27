$(document).ready( function(){
	$('.content').load('templates/what.html');
	$('#nav-what').addClass('active');
});



$('.nav-link').live('click', function(){
	$('.active').removeClass('active');
	var id = $(this).parent().addClass('active').attr('id').split('-');
	id = id[1];
	$('.content').load('templates/' + id + '.html');	
});