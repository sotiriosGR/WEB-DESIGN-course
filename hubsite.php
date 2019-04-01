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
        <div class="jumbotron">
<br><br>
<center>

  <h3>Camera not found, please enter Username.</h3>
<br>

        <form  action="wannabescan.php" method="post">
          Username: <br>
          <input type="text" name="wannatrack" required>
          <br><br>

          <input type="submit" class="btn btn-primary"  value="Scan">

        </form>

<hr>
</center>
  </div>
      </div>





    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
