<?php
session_start();

include('phpqrcode/qrlib.php');

QRcode::png($_SESSION['qrcodes'], 'qrimages/'.$_SESSION['qrcodes'].'.png'); // creates file

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

                      <button class="btn btn-warning navbar-btn" onclick="window.location.href='logedem.php'">Back</button>

                    </ul>



            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">
      <center>

    <p> Tracking Number : <?= $_SESSION['qrcodes'] ?> </p>


<?php

      echo "<img src='qrimages/".$_SESSION['qrcodes'].".png' alt='No Photo Found' height='300' width='300'>";

 ?>

</center>
  </div>




  </body>
  </html>
