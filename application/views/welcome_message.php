<!DOCTYPE html>
<html>
  <head>
    <title>Indosat Website</title>
    <style>
       #map {
        height: 350px;
        width: 100%;
       }
    </style>
  </head>
  <body>

    <!--<h3>My Google Maps Demo</h3>-->
    
    <div id="map"></div>
    
    <script>
      var kmlUrl = 'https://www.google.com/maps/d/u/0/kml?mid=1r8-CG_5EJqSi0-K8VAMzRc9COfQ';
      var kmlOptions = {
        suppressInfoWindows: false,
        preserveViewport: false,
        map:map
      };
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
          map: map
        });
        var kmlLayer = new google.maps.KmlLayer({
          url: kmlUrl,
          infoWindowHtml:true,
          map: map
        });
        google.maps.event.addListener(kmlLayer, 'click', function(kmlEvent) {
          lastKmlEvent = kmlEvent;
          var text = kmlEvent.featureData.name;
            kmlEvent.featureData.infoWindowHtml += '<br/><button onclick="linked()" class="btn btn-success btn-sm">Details</button>';
        });
      }
      function linked()
      {
        window.location = "<?php echo base_url('Welcome/detail');?>";
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqLFLF_usEETqFPtMNSAe6ZYjte6T15Rg&callback=initMap">
    </script>
  </body>
</html>