var login_url = "";

var request;

function loginModal (id) {

	$( "#myModal" ).modal('show');

	if (request) {
		request.abort();
	}

	var form = $("#login");

	var inputs = form.find("input, select, button, textarea");

	var serializedData = form.serialize();

	inputs.prop("disabled", true);

	// fire off the request to /form.php
	request = $.ajax({
		url: login_url,
		type: "POST",
		data: serializedData
	});

	// callback handler that will be called on success
	request.done(function (response, textStatus, jqXHR){

		// console.log(response);
		var json = $.parseJSON(response);

		if ( json.valid == 'true' ) {
			// alert("Valido");
			// setTimeout( function(){
				location.reload();
			// },3000);

		}else{

			$("#form-username").addClass("has-error");
			$("#form-password").addClass("has-error");

		}

	});

	// callback handler that will be called on failure
	request.fail(function (jqXHR, textStatus, errorThrown){
		// log the error to the console
		// console.error(
		// 	"The following error occured: "+
		// 	textStatus, errorThrown
		// );

		setTimeout( function(){
			$('#myModal').modal('hide')
		},3000);

	});

	// callback handler that will be called regardless
	// if the request failed or succeeded
	request.always(function () {
		// reenable the inputs

		setTimeout( function(){
			$('#myModal').modal('hide')
		},3000);

		inputs.prop("disabled", false);
	});

	return false;

} // LOGIN



function inputFocus () {
	$("#form-username").removeClass("has-error");
	$("#form-password").removeClass("has-error");
}
