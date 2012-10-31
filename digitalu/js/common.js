//TODO - remove after dev
$.ajaxSetup ({
    // Disable caching of AJAX responses
    cache: false
});

$(document).ready( function(){

	$('#nav-what').addClass('active');
	truncateText();
	
});


$('#add-member').live('click', function(){
	
	var numMembers = parseInt($('#num-members').val()) + 1;
	
	
	var memberItemString =  ['<div class="control-group member-group">',
	                         '<label class="control-label" for="member-controls">Team member #' + numMembers + '</label>',
	                         '<div class="controls member-controls">',
	                         '<div class="member-name-wrapper">',
	                         '<input type="text" class="input-name" name="inputName-' + numMembers + '" placeholder="Name"></div>',
	                         '<div class="member-email-wrapper">',
	                         '<input type="text" class="input-email" name="inputEmail-'+ numMembers +'" placeholder="Email"></div>',
	                         '</div></div>'      
	                        ].join('\n');
	
	//var memberFormItem = '<div class="control-group member-group"><label class="control-label" for="inputPassword">Team member #' + ++numMembers + '</label><div class="controls"><input type="text" id="inputPassword" placeholder="Name"><input type="text" id="inputEmail" placeholder="Email"></div> </div>';
	$('.member-group-wrapper').append(memberItemString);
	$('#num-members').val(numMembers);
	return false;
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
	if ($(window).width() < 500){
		$("#nav-register").find('a').text("Reg.");
		$('#form-message-mobile').show();
		$('#registration-form').hide();
	}
	
		
	else {
		$("#nav-register").find('a').text("Register");
		$('#form-message-mobile').hide();
		$('#registration-form').show();
	}
}

$(window).resize(function() {
	truncateText();
});


