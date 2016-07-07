<?php
/**
 * @package WordPress
 * @subpackage Conexão Inteligente
 * @since Conexão Inteligente 1.0
**/
?>

<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
<script type="text/javascript">
	(function($){
		function new_map($el){	
			// var
			var $markers = $el.find('.marker');	
			
			// vars
			var isDraggable = $(document).width() > 769 ? true : false;
			var args = {
				zoom		: 18,
				center		: new google.maps.LatLng(0, 0),
				scrollwheel: false,
				draggable: isDraggable,				 
      			scrollwheel: false,
      			panControl: true,
      			scaleControl: true,
				mapTypeId	: google.maps.MapTypeId.ROADMAP
			};
			
			// create map	        	
			var map = new google.maps.Map( $el[0], args);
			
			// add a markers reference
			map.markers = [];
			
			// add markers
			$markers.each(function(){		
		    	add_marker($(this), map);		
			});
			
			// center map
			center_map( map );
			
			// return
			return map;
		}

		function add_marker($marker, map){
			// var
			var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});

			// add to array
			map.markers.push( marker );

			// if marker contains HTML, add it to an infoWindow
			if($marker.html()){		
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
				});

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function(){
					infowindow.open( map, marker );
				});
			}
		}

		function center_map(map){
			// vars
			var bounds = new google.maps.LatLngBounds();

			// loop through all markers and create bounds
			$.each(map.markers, function( i, marker){
				var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
				bounds.extend( latlng );
			});

			// only 1 marker?
			if(map.markers.length == 1){
				// set center of map
			    map.setCenter(bounds.getCenter());
			    map.setZoom(18);
			}else{
				// fit to bounds
				map.fitBounds(bounds);
			}
		}

		// global var
		var map = null;

		$(document).ready(function(){
			$('#main > .map').each(function(){
				map = new_map($(this));
				google.maps.event.trigger(map, 'resize');
			});
		
			$(".nav-tabs a[href='#mapa']").one( "click", function(){
	          	$('.map').each(function(){
					new_map( $(this) );
					google.maps.event.trigger(map, 'resize');
            		map.setCenter(latlng);
				});											
			});
		});

	})(jQuery);
</script>