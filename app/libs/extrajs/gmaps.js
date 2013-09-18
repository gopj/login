var lat = 19.256;
var lng = -103.730;
var zoom = 13;
var mapType = google.maps.MapTypeId.ROADMAP;
var marker = new google.maps.Marker();
var map;

function loadMap () {
	console.log('loadmap');

	var mapOptions = {
		center: new google.maps.LatLng(lat,lng),
		zoom: zoom,
		disableDefaultUI: true,
		mapTypeId: mapType
	};

	map = new google.maps.Map( document.getElementById('map-canvas') , mapOptions );
	
	console.log('end - loadmap');
}

function markerSetMap (map) {
	if (map == null)
		marker.setMap(this.map);
	else
		marker.setMap(map);
}

function listenerClickMarker () {
	google.maps.event.addListener(map, 'click', function(event) {
		marker.setPosition(event.latLng);
		$("[name='lat']").val(event.latLng.lat());
		$("[name='lng']").val(event.latLng.lng());
	});
}

function markerSetLatLng (lat,lng) {
	latlng = new google.maps.LatLng(lat,lng);
	marker.setPosition(latlng);
}

function markerSetDraggable(){
	this.marker.setDraggable (true);
	google.maps.event.addListener (this.marker, 'drag', function (event) 
      {
      // Pan to this position (doesn't work!)
      this.map.panTo (this.marker.getPosition());
      });
}