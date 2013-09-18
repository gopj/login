//
// UTIL FUNCTIONS
//



//
// REDIRECT PAGE
//

function redirect( view ) {

	var url = base_url + view ;

	window.location = url ;

}


//
// CLIENT LIST SEARCH QUERY
//

function clientsLists(){
	event.preventDefault();
	var query = $("[name='query']").val();
	var page = base_url + 'user/clients/query/' + query;
	console.log(page);
	$.ajax(page)

		.done(function(data) {
			$(".table tbody").html(data);
			console.log(data);
		})

		.fail(function() {
			console.log('fail - clientsLists');
		});

}




//
// INVENTORY LIST SEARCH QUERY
//

function inventoryLists(){
	event.preventDefault();
	var query = $("[name='query']").val();
	var page = base_url + 'user/inventory/query/' + query;
	console.log(page);
	$.ajax(page)

		.done(function(data) {
			$(".table tbody").html(data);
			console.log(data);
		})

		.fail(function() {
			console.log('fail - inventoryLists');
		});

}



//
// ROUTES ADD CLIENT TO ROUTE
//

function addClientRoute(){
	client = $("[name='client'] option:selected");
	
	htmlToAdd = "<tr> <td> " + client.val() + " </td> <td> " + client.text() + " </td> <td> <button class = 'btn btn-small btn-danger' onclick = deleteClientRoute('1');> &times; </button> </td> </tr>";

	$(".table tbody").append(htmlToAdd);

	newRoute();
}


//
// ROUTES DELETE CLIENT TO ROUTE
//

function deleteClientRoute(idClient) {
	rows = $(".table tbody tr");

	alert( rows.html() + " --- 123") ;

	rows.each(function(tr){

		alert( $( "td" , tr ).html() );
			
		if ( $( "td" , tr ).html() == idClient ){
			alert("igual");
		}

	});
}
