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
          zoom: 10,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqLFLF_usEETqFPtMNSAe6ZYjte6T15Rg&callback=initMap">
    </script>
  </body>
</html>