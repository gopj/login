//
// LAYOUT
//

function layout(x){

	$('#left-menu').sidr({
		name: 'sidr-left',
		side: 'left'
	});

	$('#right-menu').sidr({
		name: 'sidr-right',
		side: 'right'
	});

	if (x) $.sidr('open','sidr-left');
}





//
// CLIENTS
//



//
// USER /CLIENT / INDEX
//

function clientIndex() {
	$("[name='query']").focus();
	$("[name='query']").keyup(function(e){
		clientsLists();

	});
}




//
// USER / CLIENT / NEWCLIENT
//

function clientNew(){
	loadMap();
	markerSetMap();
	listenerClickMarker();
}




//
// USER / CLIENT / EDITCLIENT
//

function clientEdit(lat,lng){
	this.lat = lat;
	this.lng = lng;
	loadMap();
	markerSetMap();
	markerSetLatLng(lat,lng);
	listenerClickMarker();
}




//
// INVENTORY
//


//
// USER / INVENTORY / CLIENT
//

function inventoryIndex(){
	$("[name='query']").focus();
	$("[name='query']").keyup(function(e){
		inventoryLists();
	});
}


//
// USER / INVENTORY / LOTES NEW
//

function lotesNew () {
	$("#fec_caducidad").datepicker( { format: 'yyyy-mm-dd' } );
}






//
// SELL
//



//
// SELL / INDEX
//

function sellIndex () {
	$("[name='password']").focus();
}


//
// SELL / ACTIVE
//

function sellActive(){
	$('[name="product"]').keypress( function(e) {
		if ( e.which == 13 ) {
			e.preventDefault();
			alert('enter');
		}
	});
}



//
// ROUTES / NEWROUTE
//

function newRoute () {
	$("#data").tableDnD();
}