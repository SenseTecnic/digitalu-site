//TODO - remove after dev
$.ajaxSetup({
	// Disable caching of AJAX responses
	cache : false
});

$(document).ready(function() {

	$('#nav-what').addClass('active');
	truncateText();

});

$('#add-member').live(
		'click',
		function() {

			var numMembers = parseInt($('#num-members').val()) + 1;

			var memberItemString = [
					'<div class="control-group member-group">',
					'<label class="control-label" for="member-controls">Team member #'
							+ numMembers + '</label>',
					'<div class="controls member-controls">',
					'<div class="member-name-wrapper">',
					'<input type="text" class="input-name" name="inputName-'
							+ numMembers + '" placeholder="Name"></div>',
					'<div class="member-email-wrapper">',
					'<input type="text" class="input-email" name="inputEmail-'
							+ numMembers + '" placeholder="Email"></div>',
					'</div></div>' ].join('\n');
			$('.member-group-wrapper').append(memberItemString);
			$('#num-members').val(numMembers);
			return false;
		});

function toggleButtons(enabled) {

	if (enabled) {
		$('#submit').html('Submit <i class="icon-ok icon-white"></i>')
		$('#submit').removeAttr('disabled');
		$('#reset').removeAttr('disabled');
	} else {
		$('#submit').html("Submitting...")
		$('#submit').attr('disabled', 'disabled');
		$('#reset').attr('disabled', 'disabled');

	}
}

$("form").submit(function() {

	var formJSON = $('#registration-form').serializeObject();

	toggleButtons(false);

	if (formJSON.disclaimerBox != "on") {
		alert("Please read the disclaimer before registering!");
		toggleButtons(true);
		return false;
	}

	console.log(formJSON);

	if (validateForm(formJSON)) {
		submitForm(formJSON);
	} else {
		toggleButtons(true);
	}

	return false;
});

function validateForm(form) {

	var isValid = true;

	if (!form.projectName) {
		alert("Please enter a project name");
		isValid = false;
	}

	if (!form["inputEmail-1"] || form["inputEmail-1"] == "") {
		alert("Please enter at least one email address.");
		isValid = false;
	}

	if (!form.inputDescription || form.inputDescription == "") {
		alert("Please enter a proposal description.");
		isValid = false;
	}

	if (isValid)
		return true;

	else
		return false;
}

/**
 * Submits form via AJAX POST.
 * 
 * @param formJSON
 */
function submitForm(formJSON) {

	$
			.ajax({
				type : 'POST',
				url : "email_form.php",
				data : formJSON,
				dataType : "json",
				success : function(result) {
					console.log(result);
					if (result.success == "true") {

						$('#registration-form').remove();

						var successText = [
								'<h2 class="pixel">Thank you!</h2>',
								'<p>Thanks for registering! You will receive an email ',
								'explaining the next steps for your team within the next couple of days.',
								'If you don\'t receive an email, please contact us at ',
								'<a href="mailto:digitalu@magic.ubc.ca">digitalu@magic.ubc.ca</a></p>' ]
								.join('\n');

						$('.form-wrapper').removeClass('row').html(successText);
					}

					else {
						alert("Error: " + result.message);
					}
				}
			});
}

/**
 * Serializes registration form into JSON object.
 */
$.fn.serializeObject = function() {
	var o = {};
	var a = this.serializeArray();
	$.each(a, function() {
		if (o[this.name] !== undefined) {
			if (!o[this.name].push) {
				o[this.name] = [ o[this.name] ];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});

	o["inputDescription"] = $('#inputDescription').val();
	o["inputQuestions"] = $('#inputQuestions').val();
	return o;
};

$('.nav-link').live('click', function() {	
	

	var activeID = $('.active').attr('id').split('-');
	activeID = activeID[1];
	$('.active').removeClass('active');
	$('#' + activeID).hide();

	var id = $(this).parent().addClass('active').attr('id').split('-');
	$('#' + id[1]).show();
});

function truncateText() {
	
	if ($(window).width() < 500) {
		$("#nav-register").find('a').text("Reg.");
		$("#nav-how").find('a').text("View");
		$("#nav-schedule").find('a').text("Sched.");
		$("#nav-redirect").find('a').text("Contest");
		$('#form-message-mobile').show();
		$('.divider').hide();
		$('.form-wrapper').hide();
		$('.social-logos').hide();
	}

	else {
		$("#nav-register").find('a').text("Register");
		$("#nav-schedule").find('a').text("Schedule");
		$("#nav-how").find('a').text("Gallery");
		$("#nav-redirect").find('a').text("Digital*U");

		$('#form-message-mobile').hide();
		$('.divider').show();
		$('.form-wrapper').show();
		$('.social-logos').show();
	}
}

$(window).resize(function() {
	truncateText();
});
