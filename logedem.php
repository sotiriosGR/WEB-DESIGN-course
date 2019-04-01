<?php
session_start();
if (empty($_SESSION['employee'])) {
  $messagestopem = "LOGIN AS AN EMPLOYEE TO ACCESS THIS PAGE";
                echo"<script type='text/javascript'>alert('$messagestopem');</script>";
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

    <center>
    <img src="higray.png" height="20px" width="60%">
    </center>
    <br>

    <div class="container">
      <div class="jumbotron">
<center>

  <h2>Create New Shipment</h2>
  <br>
  <form action="shipmentsimple.php" method="post">

    Username:<br>
    <?php
    include('connection.php');

      if(!isset($error_message)){
        $listquery= "SELECT username FROM clients";
        $listresult=mysqli_query($con,$listquery);
        echo '<select name="shipuser">';


          while ($row =  mysqli_fetch_assoc($listresult)) {

           echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
        }

        echo '</select>';

    }

    ?>
    <br><br>
    From:<br>
    (the localshop of the logged employee only)<br>
    <?php
    include('connection.php');

      if(!isset($error_message)){
        $monadikos = $_SESSION['monadikos'];
        $listquery= "SELECT localshop FROM shopemployees WHERE username='$monadikos'";
        $listresult=mysqli_query($con,$listquery);
        echo '<select name="shipfrom">';


          while ($row =  mysqli_fetch_assoc($listresult)) {

           echo '<option value="'.$row['localshop'].'">'.$row['localshop'].'</option>';
        }

        echo '</select>';

    }

    ?>
    <br><br>
    To:<br>
    <?php
    include('connection.php');

      if(!isset($error_message)){
        $listquery= "SELECT name FROM localshops";
        $listresult=mysqli_query($con,$listquery);
        echo '<select name="shipto">';


          while ($row =  mysqli_fetch_assoc($listresult)) {

           echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }

        echo '</select>';

    }

    ?>
    <br><br>
    Type:<br>
    <input type="radio" name="expressor" value="0" checked> Simple<br>
    <input type="radio" name="expressor" value="1" > Express<br>
    <br>
    Receiver Name:<br>
    <input type="text" name="recname" value="" required>
    <br><br>

    Receiver Surname:<br>
    <input type="text" name="recsurname" value=""  required>
    <br><br>


    <input type="submit" class="btn btn-primary" value="Proceed">
</form>

</center>
  </div><!--jumbotron-->
  </div><!--container-->






<center>
<img src="higray.png" height="20px" width="60%">
</center>
<br><br>
  <div class="container">
    <div class="jumbotron">
    <center>

  <h2> Delivery</h2>

<form action="deliverorder.php" method="post">

  Username:<br>
  <input type="text" name="deltrack" value="" required>
  <br><br>

<input type="submit" class="btn btn-primary " value="Delivery">
<br><br>



</form>
  </center>
</div>
</div> <!--container-->









<center>
<img src="higray.png" height="20px" width="60%">
</center>
<br><br>

<div class="container">
  <div class="jumbotron">
  <center>
    <h2>Find an order</h2>

    <form action="emfindpackage.php" method="post">

      Username:<br>
      <input type="text" name="findtrack"  required>
      <br><br>

    <input type="submit" class="btn btn-primary " value="Find">
    <br><br>

  </center>
  </div>
</div>


<center>
<img src="higray.png" height="20px" width="60%">
</center>

<hr>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
