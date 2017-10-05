<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>

    <!--<h3>My Google Maps Demo</h3>-->
    
    <div id="map"></div>
    
    <script>
      var x = document.getElementById("demo");
      function getLocation() {
          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(initMap);
          } else {
              x.innerHTML = "Geolocation is not supported by this browser.";
          }
      }
      function initMap(position) {
        //var uluru = {lat: -25.363, lng: 131.044};
        getLocation();
        var uluru = {lat: position.coords.latitude, lng: position.coords.longitude};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          title: "you are here",
          //icon: 'B:\Proyek\bts.png',
          map: map
        });
        var image = "B:\Proyek\bts.png";
        <?php foreach ($locations as $loc)
        {
            $latitude =  $loc->LAT;
            $longitude =  $loc->LONG;
            ?>
            var btsposition = {lat: <?php echo $latitude; ?>, lng:<?php echo $longitude; ?> };

            var marker = new google.maps.Marker({
              position: btsposition,
              //icon: "B:\Proyek\bts.png",
              map: map
            });
            <?php
        }?>
      } 
    </script>
<!--
    <?php
      foreach ($locations as $variable){
        echo $variable->LONG;
        echo $variable->LAT;
      }
    ?> -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqLFLF_usEETqFPtMNSAe6ZYjte6T15Rg&callback=initMap">
    </script>
  </body>
</html>