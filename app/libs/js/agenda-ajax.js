
var calendar_request;

function getDay (_date) {

	$("#selectDay").addClass("active");
	$("#selectWeek").removeClass("active");
	$("#selectMonth").removeClass("active");

	if (calendar_request){
		calendar_request.abort();
	}
	
	console.log(base_url + "calendar/day/" + _date);

	request = $.ajax({
		url: base_url + "calendar/day/" + _date
		// url: base_url + "calendar/day/2013-08-13"
	});

	request.done( function (response, textStatus, jqXHR) {
		// console.log(response);
		$("#agenda-container").html(response);
	});

	request.fail(function (jqXHR, textStatus, errorThrown){
		// log the error to the console
		console.error(
			"The following error occured: "+
			textStatus, errorThrown
		);

	});
}

function getWeek (_date) {
	$("#selectDay").removeClass("active");
	$("#selectWeek").addClass("active");
	$("#selectMonth").removeClass("active");

	if (calendar_request){
		calendar_request.abort();
	}
	
	console.log(base_url + "calendar/week/" + _date);

	request = $.ajax({
		url: base_url + "calendar/week/" + _date
		// url: base_url + "calendar/week/2013-08-05"
	});

	request.done( function (response, textStatus, jqXHR) {
		// console.log(response);
		$("#agenda-container").html(response);
	});

	request.fail(function (jqXHR, textStatus, errorThrown){
		// log the error to the console
		console.error(
			"The following error occured: "+
			textStatus, errorThrown
		);

	});
}


function getMonth (_date) {

	$("#selectDay").removeClass("active");
	$("#selectWeek").removeClass("active");
	$("#selectMonth").addClass("active");
	
	if (calendar_request){
		calendar_request.abort();
	}
	
	console.log(base_url + "calendar/month/" + _date);

	request = $.ajax({
		url: base_url + "calendar/month/" + _date
		// url: base_url + "calendar/month/2013-08-05"
	});

	request.done( function (response, textStatus, jqXHR) {
		// console.log(response);
		$("#agenda-container").html(response);
	});

	request.fail(function (jqXHR, textStatus, errorThrown){
		// log the error to the console
		console.error(
			"The following error occured: "+
			textStatus, errorThrown
		);

	});
}