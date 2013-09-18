function changeCalendar (type) {
	this.currentView = type;
	if ( type === 'day') {
		getDay( dateToString() ); 
	}else if ( type === 'week') {
		getWeek( dateToString() ); 
	}else if ( type === 'month') {
		getMonth( dateToString() ); 
	}
}

function dateToString () {
	var r = now.getFullYear() + "-" + ( now.getMonth() + 1 ) + "-" + now.getDate();
	return r;
}

function stringToDate (date) {
	now = new Date(date);
	now.setDate(now.getDate()+1);
}

function changeDay(days) {
	now.setDate( now.getDate() + days );
	console.log( dateToString() );
}

function changeMonth(months){
	now.setMonth( now.getMonth() + months );
	console.log( dateToString() );
}

function changeDate(date){
	if (date == "today") {
		now = new Date();
		switch(currentView){
			case "day":
				getDay( dateToString() );
				break;
			case "week":
				getWeek( dateToString() );
				break;
			case "month":
				getMonth( dateToString() );
				break;
		}
		
	}
}


function nextDate () {
	if (currentView == 'day') {
		changeDay(1);
		getDay( dateToString() );
	}else if ( currentView == 'week' ){
		changeDay(7);
		getWeek( dateToString() );
	}else if ( currentView == 'month' ){
		changeMonth(1);
		getMonth( dateToString() );
	}
}

function prevDate () {
	if (currentView == 'day') {
		changeDay(-1);
		getDay( dateToString() );
	}else if ( currentView == 'week' ){
		changeDay(-7);
		getWeek( dateToString() );
	}else if ( currentView == 'month' ){
		changeMonth(-1);
		getMonth( dateToString() );
	}
}


function changeViewToDay (date) {
	stringToDate( date );
	getDay( dateToString() );
}


function dataTable_f () {
	$('#tabla').dataTable( {
		"oLanguage": {
			"sSearch": "Filtrar datos:",
			"sZeroRecords": "Ningún registro con ese nombre.",
			"sEmptyTable": "Tabla vacia.",
			"sLengthMenu": "Mostrar _MENU_ filas",
			"sLoadingRecords": "Espera un momento - cargando...",
			"sInfo": "Mostrando _TOTAL_ datos de ver (_START_ a _END_)",
			"sInfoEmpty": "Ninguna entrada para mostrar.",
			"sInfoFiltered": "(filtrado de _MAX_ datos)",

			"oPaginate": {
				"sFirst": "Primera página",
				"sLast": "Ultima página",
				"sPrevious": "Anterior",
				"sNext": "Siguiente",
			}
		}
	} );	
}



/*
function eventsCreate () {
	console.log( $("#dateStart").attr('value') );
	
	event.preventDefault();

	if ( !$("#title").val() || !$("#description").val() || $("#dateStart").val() == ""  ) {
		$( "#myModal" ).modal('show');
		setTimeout(function () {
			$( "#myModal" ).modal('hide');
		},3000);
	};

}*/