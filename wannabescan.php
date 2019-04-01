<?php
session_start();
if (empty($_SESSION['hubem'])) {
  $messagestopmod = "ACCESS TO AUTHORIZED PERSONEL ONLY ";
                echo"<script type='text/javascript'>alert('$messagestopmod');</script>";
                echo("<script>window.location = 'hublogin.php';</script>");
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
                    <a class="navbar-brand" href="">Courier Project  Transit Hub Site</a>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                <li><a href="hublogout.php"> Logout</a></li>

              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



      <div class="container">
<br><br>
<center>
        <?php

            include('connection.php');
            if(!isset($error_message)){

              $wannatrack = $_POST['wannatrack'];
              $pathfinder= "SELECT * FROM orders WHERE clientuser = '$wannatrack'";
              $pathresult=mysqli_query($con,$pathfinder);


              if(mysqli_num_rows($pathresult)> 0 ){

              while ($raw =  mysqli_fetch_assoc($pathresult)) {

               $pathooo = $raw['patho'];
            }


            $wannahub = $_SESSION['wannahub'];
            $decoded = array();
            $decoded = json_decode($pathooo);
            array_push($decoded,  $wannahub );
            $addpathJSON = json_encode($decoded);


            $upquery = "UPDATE orders SET patho='$addpathJSON' WHERE clientuser = '$wannatrack'";
              $update=mysqli_query($con,$upquery);

              $messageok="Package Scanned";
              echo"<script type='text/javascript'>alert('$messageok');</script>";
                            echo("<script>window.location = 'hubsite.php';</script>");;
            }
            else {
              echo "WE ARE SORRY, NO ORDERS FOUND";
            }


          }

         ?>

</center>

      </div>





    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
