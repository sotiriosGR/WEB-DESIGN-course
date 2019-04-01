<?php
session_start();

 ;

if (empty($_SESSION['client'])) {
  $messagestopcl = "LOGIN AS CLIENT TO ACCESS THIS PAGE";
                echo"<script type='text/javascript'>alert('$messagestopcl');</script>";
                echo("<script>window.location = 'index.php';</script>");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="enatria.ico" type="image/ico" />

    <title>GS COURIER</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/small-business.css" rel="stylesheet">



</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


              <ul class="nav navbar-nav">

                <button class="btn btn-warning navbar-btn" onclick="window.location.href='logedcl.php'">Back</button>

              </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



     <div class="container" >


<div class="row">

  <center>


    <h3>Your package's route</h3>
    <br>


<div id="map" style="width:80%;height:500px"></div>
<script>
    var customLabel = {
      0: {
        label:'S'
      },

      1: {
        label:'1'
      },
      2: {
        label:'2'
      },
      3: {
        label: '3'

      },
      4: {
        label:'4'
      },

      5: {
        label:'5'
      },

      6: {
        label:'6'
      },

      7: {
        label:'7'
      },

      8: {
        label:'8'
      }
    };

      function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(38.008607,23.719482),
        zoom: 6
      });
      var infoWindow = new google.maps.InfoWindow;

        // TRANSIT HUB MARKERS
       downloadUrl('http://localhost/markers29.php', function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');
          Array.prototype.forEach.call(markers, function(markerElem) {
            var id = markerElem.getAttribute('id');
            var name = markerElem.getAttribute('name');
            var address = markerElem.getAttribute('address');
            var type = markerElem.getAttribute('type');
            var point = new google.maps.LatLng(
                parseFloat(markerElem.getAttribute('lat')),
                parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('strong');
            strong.textContent = name
            infowincontent.appendChild(strong);
            infowincontent.appendChild(document.createElement('br'));

            var text = document.createElement('text');
            text.textContent = address
            infowincontent.appendChild(text);
            var icon = customLabel[type] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              label: icon.label
            });
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
          });
        });





      }



    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvjA2isunb5Uor0dYSHWKGdOwLdSswbI4&callback=initMap"></script>


</center>
</div>

<center><br>
<img src="higray.png" height="20px" width="100%">
</center>
<br>


<div class="row">
  <br><br>
  <center>

  <?php
  include('connection.php');
  $findtrack = $_SESSION['jojo'];

  if(!isset($error_message)){

      $findquery= "SELECT * FROM orders WHERE clientuser ='$findtrack'";
      $findresult = mysqli_query($con,$findquery);





      while ($row = mysqli_fetch_assoc($findresult)) {

       $pathon = $row['patho'];
       $decoded = array();
       $decoded = json_decode($pathon);
       echo "This package passed from:";
       echo "<br />";
       echo "<br />";
       foreach ($decoded as $key => $value) {

      echo "{$key} => {$value} ";
      echo "<br />";
    }

     }//while


  }//isset



  ?>
</center>

</div>


</div>



</body>
<html>
