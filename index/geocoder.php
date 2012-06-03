
<?php

 $reponse = $bdd->query('SELECT * FROM restaurant2 WHERE id=\''. $_GET['id'].'\'');
    
   $donnees = $reponse->fetch(); ?>

<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	 <style type="text/css">

#map_canvas {
		width:100%; height:500px	 
}


</style>
<script type="text/javascript">
  var geocoder;
  var map;
	var markers = new Array();
	var i = 0;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(48.8566667, 2.3509871);
    var myOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.HYBRID
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
  }

  function codeAddress() {
    var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
				document.getElementById('lat').value = results[0].geometry.location.lat();
				document.getElementById('lng').value = results[0].geometry.location.lng();
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
            map: map, 
            position: results[0].geometry.location
        });
				markers.push(marker);
				if(markers.length > 1)
					markers[(i-1)].setMap(null);
				i++;
      } else {
        alert("Le geocodage n\'a pu etre effectue pour la raison suivante: " + status);
      }
    });
  }
  
  
  function geo() {
      initialize()
      codeAddress()
  }
</script>
</head>
<body onload="geo()" >
  <div>
 <input id="address" type="hidden" value="<?php echo $donnees['adresse'].' '.$donnees['codepostal'] ;?>" >       <input id="lat" type="hidden" value=""><input id="lng" type="hidden" value="">
  </div>
<div id="map_canvas"></div>
</body >
