<?php
session_start();
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
                    <li class="active"><a href="index.php">Home</a>
                    </li>


                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="logincl.php">Client</a></li>
                          <li><a href="loginem.php">Employee</a></li>
                          <li><a href="loginmod.php">Moderator</a></li>
                        </ul>
                      </li>


                    <li>
                        <a href="register.html"><span class="glyphicon glyphicon-user"></span> Register</a>
                    </li>

                </ul>


                                  <ul class="nav navbar-nav navbar-right">
                                  <li><a href="logout.php"> Logout</a></li>

                                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



     <div class="container" >


<div class="row">

  <center>
    <h2>Hello User <?= $_SESSION['jojo'] ?></h2>


    <hr>

    <h3>Find us on map</h3>
    <br>


<div id="map" style="width:80%;height:500px"></div>
<script>
    var customLabel = {
      transithub: {
        label:'T'
      },
      localshop: {
        label: 'S'

            }
    };

      function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(38.008607,23.719482),
        zoom: 6
      });
      var infoWindow = new google.maps.InfoWindow;

        // TRANSIT HUB MARKERS
       downloadUrl('http://localhost/markers13.php', function(data) {
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


        //LOCAL SHOP MARKERS
        downloadUrl('http://localhost/markers21.php', function(data) {
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

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvjA2isunb5Uor0dYSHWKGdOwLdSswbI4&callback=initMap"></script> <!--MY GOOGLE API KEY -->


</center>


<div class="col-md-4">
<br><br>



</div><!--col md 4 //-->
</div><!--ROW//-->
<br><br><br>



<center>
<img src="higray.png" height="20px" width="100%">
</center>
<br>

<div class="row">

<center>
   <?php
   include('connection.php');
   $findorder = $_SESSION['jojo'];

   if(!isset($error_message)){

       $fioquery= "SELECT * FROM orders WHERE clientuser ='$findorder'";
       $fioresult = mysqli_query($con,$fioquery);

 }



   if (mysqli_num_rows($fioresult)> 0): ?>

<button type="button" class="btn btn-success btn-lg" onclick="window.location.href='packagemap.php'">Locate Your Package</button>

<?php else : ?>

<button type="button" class="btn btn-warning btn-lg" onclick="window.location.href='findpastpackage.php'">List Of Older Orders</button>

<?php endif; ?>


</center>
</div>

<br>
<center>
<img src="higray.png" height="20px" width="100%">
</center>
<br>

<div class='row'>



<center>
  <h4>Find our shops by name</h4>


  <div class="frmSearch">
	<input type="text" id="search-box" placeholder="Write here" />
	<div id="suggesstion-box"></div>
</div>


  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script>

  $(document).ready(function(){
  	$("#search-box").keyup(function(){
  		$("#search-box").css("background","#FFF url(loaderIcon.gif) no-repeat 165px");
  		$.ajax({
  		type: "POST",
  		url: "prediction.php",
  		data:'keyword='+$(this).val(),
  		success: function(data){
  			setTimeout(function() {
  				$("#suggesstion-box").show();
  				$("#suggesstion-box").html(data);
  				$("#search-box").css("background","#FFF");}
  				, 1000);
  		}
  		});
  	});
  });


  function selectName(val) {
  $("#search-box").val(val);
  $("#suggesstion-box").hide();
  }
  </script>


</center>
<br>

</div><!--row2//-->


<center>
<img src="higray.png" height="20px" width="100%">
</center>
<br>

<div class='row'>



<center>
<h3>Nearest localshop by Postal Code</h3>

<form action="">
    Your postal code :<br>
<input type="text" name="postalfinder" >
<br><br>
<input type="submit"  class="btn btn-info"  value="Search" >


</form><br>

</center>
</div><!--row-->




<center>
  <br>
<img src="higray.png" height="20px" width="100%">
</center>
<br>
</div><!--CONTAINER//-->





    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
