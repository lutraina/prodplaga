function gerarMapa(endereco){
	var geocoder;
    var map;
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(0,0);
    var mapOptions = {
      zoom: 16,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);      

	var infowindow = new google.maps.InfoWindow();  
	var address = endereco;
	geocoder.geocode( { 'address': address}, function(results, status) {
	  if (status == google.maps.GeocoderStatus.OK) {
	    map.setCenter(results[0].geometry.location);
	    var marker = new google.maps.Marker({
	        map: map,
	        position: results[0].geometry.location
	    });
	    infowindow.setContent();
	    infowindow.open(map, marker);
	
	    google.maps.event.addListener(marker, 'click', function() {            
	        infowindow.open(map, this);
	    });
	    
	  } else {
	    alert('Geocode was not successful for the following reason: ' + status);
	  }
	});
}
