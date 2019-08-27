<?php
$markersfolder = get_stylesheet_directory_uri() . '/googlemaps/markers';
$static_marker = $markersfolder . '/static.png';
$digital_marker = $markersfolder . '/digital.png';
$google_maps_javascript = get_stylesheet_directory_uri() . '/googlemaps/googlemaps.js';
echo $markersfolder;
?>

<style>
#the-map{
	min-height: 1200px;
	min-width: 100vw;
	background: orangered;
}
</style>

<div id="the-map" class="map"></div>

<script src="<?php echo $google_maps_javascript; ?>"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0MDoRSgplGB61I9jYOk9wFBGzoUb7QLs&callback=initMap">
</script>