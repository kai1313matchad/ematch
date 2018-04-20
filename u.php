<!DOCTYPE html>

<html>

     <head>
     <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
     </head>

     <body>
         <!--  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->

        <script>
            
            

        </script>

       

        <span id="latitude"></span>
        <br>
        <span id="longlitude"></span>

        
        <input type="text" name="" id="lat2">
      <?php
        $opo = '<span id="lat2"></span>';
        echo $opo;
      ?>  
        <br>
        <div id="result"></div>baru

        <script>
          var apiGeolocationSuccess = function(position) {
              alert("API geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
          };

          var tryAPIGeolocation = function() {
              jQuery.post( "https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyCfXY2npHNq_B_GVvTL0c6fJ-iL2tdN3Ug", function(success) {
                  apiGeolocationSuccess({coords: {latitude: success.location.lat, longitude: success.location.lng}});
            })
            .fail(function(err) {
              alert("API Geolocation error! \n\n"+err);
            });
          };

          var browserGeolocationSuccess = function(position) {
              alert("Browser geolocation success!\n\nlat = " + position.coords.latitude + "\nlng = " + position.coords.longitude);
              document.getElementById('latitude').innerHTML = position.coords.latitude;
              document.getElementById('longlitude').innerHTML = position.coords.longitude;

              setTimeout(function() {
                            $.ajax({
                              url: 'ajax.php',
                              type: 'POST',
                              data: {lat: position.coords.latitude, lng: position.coords.longitude},
                              success: function(data){
                                $('#result').html(data);
                              },
                              error: function(){
                                alert('error!');
                              }
                            })
                        }
                        , 3000);
          };

          var browserGeolocationFail = function(error) {
            switch (error.code) {
              case error.TIMEOUT:
                alert("Browser geolocation error !\n\nTimeout.");
                break;
              case error.PERMISSION_DENIED:
                if(error.message.indexOf("Only secure origins are allowed") == 0) {
                  tryAPIGeolocation();
                }
                break;
              case error.POSITION_UNAVAILABLE:
                alert("Browser geolocation error !\n\nPosition unavailable.");
                break;
            }
          };

          var tryGeolocation = function() {
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(
                  browserGeolocationSuccess,
                browserGeolocationFail,
                {maximumAge: 50000, timeout: 20000, enableHighAccuracy: true});
            }
          };

          tryGeolocation();
        </script>

        <!-- BEDA -->
     
<script type="text/javascript"> 

            
            function showlocation() {
               // One-shot position request.
               navigator.geolocation.getCurrentPosition(callback);
            }

            function callback(position) {
               document.getElementById('latitude').innerHTML = position.coords.latitude;
               document.getElementById('longlitude').innerHTML = position.coords.longitude;



              //getAddress(position.coords.latitude, position.coords.longitude);

              // setTimeout(function() {
              //     $.ajax({
              //       url: 'ajax.php',
              //       type: 'POST',
              //       data: {lat: position.coords.latitude, lng: position.coords.longitude},
              //       success: function(data){
              //         $('#result').html(data);
              //       },
              //       error: function(){
              //         alert('error!');
              //       }
              //     })
              // }
              // , 3000);
            };

            // function getAddress(lat, lng) {
            //     var geocoder = new google.maps.Geocoder();
            //     var latitude = lat;
            //     var longitude = lng;
            //     var latLng = new google.maps.LatLng(latitude,longitude);
            //     geocoder.geocode({latLng: latLng}, function(responses) {     
            //                if (responses && responses.length > 0) 
            //                {        
            //                    // alert(responses[0].formatted_address);  
            //                    $('#lat2').val(responses[0].formatted_address);   
            //                    $('#result').html(responses[0].formatted_address);
            //                } 
            //                else 
            //                {       
            //                  alert('Not getting Any address for given latitude and longitude.');     
            //                }   
            //             }
            //     );
            // }

         // showlocation();
        </script>



<!-- beda -->
        



     </body>
</html>