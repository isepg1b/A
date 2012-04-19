
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<!-- Inclusion de l'API Google MAPS -->
		<!-- Le paramètre "sensor" indique si cette application utilise détecteur pour déterminer la position de l'utilisateur -->
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			function initialiser() {
                            
                            var geocoder = new GClientGeocoder();
                                                        
                            if (geocoder) {
		geocoder.getLatLng(address,
		function(point) {
			if (!point) {
				alert(address + ' could not be found');
			} else {
				map.setCenter(point, 13);
				if ( marker != null )
					map.removeOverlay( marker );
				marker = new GMarker(point);
				map.addOverlay(marker);
				marker.openInfoWindowHtml(
					'<b>Lat x Lon : </b>' + point.lat()+', '+point.lng()+'<br />'+
					'<b>Address : </b>' + address
				);

				var lat = document.getElementById('lat');
				var lon = document.getElementById('lon');
				lat.value = point.lat();
				lon.value = point.lng();

				intGps2GpsDeg();
			}
		}
	);
	}
                            
				var latlng = new google.maps.LatLng(46.779231, 6.659431);
				//objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
				//de définir des options d'affichage de notre carte
				var options = {
					center: latlng,
					zoom: 15,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				
				//constructeur de la carte qui prend en paramêtre le conteneur HTML
				//dans lequel la carte doit s'afficher et les options
				var carte = new google.maps.Map(document.getElementById("carte"), options);
			}
		</script>
	
	<body onload="initialiser()">
		<div id="carte" style="width:100%; height:500px"></div>
	</body>
