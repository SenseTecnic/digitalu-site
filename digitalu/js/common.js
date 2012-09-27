$(document).ready( function(){
	$('.content').load('templates/what.html');
});



$('.nav-link').live('click', function(){
	var id = $(this).attr('id').split('-');
	id = id[1];
	$('.content').load('templates/' + id + '.html');
	
});