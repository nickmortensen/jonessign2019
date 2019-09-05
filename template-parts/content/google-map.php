<?php
$markersfolder          = get_stylesheet_directory_uri() . '/googlemaps/markers';
$static_marker          = $markersfolder . '/static.png';
$digital_marker         = $markersfolder . '/digital.png';
$google_maps_javascript = get_stylesheet_directory_uri() . '/googlemaps/googlemaps.js';
// echo GOOGLE_MAPS_API;
?>

<style>

img.popup {
  float:left;
  width:260px;
  margin-top:30px;
  border:5px solid white;
  box-shadow: 4px 4px 12px black;
}

div.popup{
  max-width: 320px;
  float: right;
  padding-left: 20px;
  margin-left: 10px;
  border-left: 6px solid red;
  }

#map-container {
	min-height:1440px;
}

      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		height: 100%;
		min-height:1440px;

      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #floating-panel {
        margin-left: -52px;
      }
    </style>
<div id="map-container">
<!-- a floating panel for dropping markers
<div id="floating-panel">
      <button id="drop" onclick="drop()">Drop Markers</button>
</div>
-->
  <div id="map"></div><!-- end div#map -->
</div><!-- end div#map-container -->


<!--

TO DO

1. Register and enqueue only on this page both of the scripts below the WordPress way.

2. Try and do the whole shebang as a class & how it was taught in the WPRig
3. Finish the Billboard custom fields and upload all of the data to the database for practice.


-->

<!-- prevents us from exposing the apiKey for google maps to the world -->
<script>
var apiKey = "<?php echo GOOGLE_MAPS_API; ?>";
</script>
<script src="<?php echo $google_maps_javascript; ?>"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAPS_API; ?>&callback=initMap">
</script>