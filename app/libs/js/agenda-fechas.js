var login_url = "";

var request;

function nameEvent(name) {
	//console.log(name);
	$("#event_currentName").html(name);
}

function activeDateTimePicker() {
	
	$('#dpDesktopI').datepicker({
		format: 'yyyy-mm-dd'

	});

 	$('#tpDesktopI').timepicker({
		minuteStep: 5,
		showInputs: true,
		disableFocus: true,
		defaultTime: false
	});

	$('#dpDesktopT').datepicker({
		format: 'yyyy-mm-dd'
	});

 	$('#tpDesktopT').timepicker({
		minuteStep: 5,
		showInputs: true,
		disableFocus: true,
		defaultTime: false
	});

	$('#dpTabletT').datepicker({
		format: 'yyyy-mm-dd'

	});

 	$('#tpTabletT').timepicker({
		minuteStep: 5,
		showInputs: true,
		disableFocus: true,
		defaultTime: false
	});

	$('#dpPhoneI').datepicker({
		format: 'yyyy-mm-dd'

	});

 	$('#tpPhoneI').timepicker({
		minuteStep: 5,
		showInputs: true,
		disableFocus: true,
		defaultTime: false
	});

	$('#dpPhoneT').datepicker({
		format: 'yyyy-mm-dd'

	});

 	$('#tpPhoneT').timepicker({
		minuteStep: 5,
		showInputs: true,
		disableFocus: true,
		defaultTime: false
	});

}
