<!DOCTYPE html>
<html>
  <head>
    <title>Indosat Website</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <script src="<?php echo base_url('asset/jquery-3.2.1.slim.js'); ?>"></script>
    <script src="<?php echo base_url('asset/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <style>
       #map {
        height: 350px;
        width: 100%;
       }
    </style>
  </head>
  <body>

    <!--<h3>My Google Maps Demo</h3>-->
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
        <div class="block" style="background: #ff0000">
            VLR
            <br>
              <?php foreach ($vlr as $data)
                echo $data->vlr. "($data->persentase)";
                ;?>
            </br>
            <?php echo "date : " .$data->tanggal;?>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="block" style="background: #ffff00">
           Keterangan 2
        </div>
      </div>
      <div class="col-sm-4">
        <div class="block" style="background: #ffa000">
           Keterangan 3
        </div>
      </div>
      </div>
    <div id="map" onload="initMap()"></div>
      <div class="row">
        <div class="col-sm-6">
        <div class="block" style="background: #ffa000">
          5 LOWEST OCCUPANCY SITE (CELLID)
          <ul>
            <?php foreach ($occupancy as $data)
            echo "<li>".$data->CELLID."</li>";?>
          </ul>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="block" style="background: #ffa000">
           5 LOWEST TRANSAKSI OUTLET
           <ul>
             <?php foreach ($transaksi as $data)
            echo "<li>".$data->ORGANIZATION_NAME."</li>";?>

           </ul>
        </div>
      </div>
      </div>
    </div>

    
    <script>
      var kmlUrl = 'https://www.google.com/maps/d/u/0/kml?mid=1r8-CG_5EJqSi0-K8VAMzRc9COfQ';
      var kmlOptions = {
        suppressInfoWindows: false,
        preserveViewport: false,
        map:map
      };
  
      function initMap() {
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -7.289895, lng: 112.81520359999999},
          zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            //console.log(pos);
            map.setCenter(pos);
            var marker = new google.maps.Marker({
              position: pos,
              title: "you are here",
              map: map
            });
            var kmlLayer = new google.maps.KmlLayer({
              url: kmlUrl,
              infoWindowHtml:true,
              map: map,
              isclick: false
            });
            google.maps.event.addListener(kmlLayer, 'click', function(kmlEvent) {
              lastKmlEvent = kmlEvent;
                kmlEvent.featureData.infoWindowHtml += (!kmlEvent.featureData.isclick)? 
                `<br/><form action="<?php echo base_url('Welcome/detaildaily');?>" method="post">
                <button type="submit" class="btn btn-success btn-sm">Details</button></form>
                `:"";
                kmlEvent.featureData.isclick = true;
            });
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqLFLF_usEETqFPtMNSAe6ZYjte6T15Rg&callback=initMap">
    </script>
    
  </body>
</html>