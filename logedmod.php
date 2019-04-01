<?php
session_start();
if (empty($_SESSION['moderator'])) {
  $messagestopmod = "ACCESS TO AUTHORIZED PERSONEL ONLY ";
                echo"<script type='text/javascript'>alert('$messagestopmod');</script>";
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

  <div class="container">


      <div class="row">
          <div class="col-lg-12">
          <center><h1><b>Local Shop Management</b></h1></center>
          </div>
          <!-- /.col-lg-12 -->
      </div>




     <div class="row">
         <div class="col-md-4">
     <h2> Insert Local Shop</h2>
     <form action="insertlocal.php" method="post">

       Name:<br>
       <input type="text" name="localname" value=""  required>
       <br>
       Road:<br>
       <input type="text" name="localroad" value=""  required>
       <br>
       Number:<br>
       <input type="text" name="localnumber" value=""  required>
       <br>
       City:<br>
       <input type="text" name="localcity" value=""  required>
       <br>
       Postal Code:<br>
       <input type="text" name="localtk" value=""  required>
       <br>
       Phone Num:<br>
       <input type="text" name="localphone" value=""  required>
       <br>
       Latitude:<br>
       <input type="text" name="locallat" value=""  required>
       <br>
       Longitute:<br>
       <input type="text" name="locallong" value=""  required>
       <br>
       Transit Hub:<br>
      <?php
      include('connection.php');

        if(!isset($error_message)){
          $listquery= "SELECT city FROM transithubs";
          $listresult=mysqli_query($con,$listquery);
          echo '<select name="localhub">';

            while ($row =  mysqli_fetch_assoc($listresult)) {

             echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
          }

          echo '</select>';

      }

      ?>

<!--
       Transit Hub<br>
       <input list="localhubs" name="localhubs" required>
  <datalist id="localhubs">
    <option value="Alexandroupoli">
    <option value="Aspropyrgos">
    <option value="Heraklion">
    <option value="Ioannina">
    <option value="Kalamata">
    <option value="Larisa">
    <option value="Mytilini">
    <option value="Patra">
    <option value="Thessaloniki">
  </datalist>
  <br>
  //-->

  <br><br>
  <input type="submit" class="btn-success btn-lg" name="insdel" value="Insert">
</form>

</div>




  <div class="col-md-4">
    <h2> Delete Local Shop</h2>

    <form action="deletelocal.php" method="post">

      Name:<br>
      <?php
      include('connection.php');

        if(!isset($error_message)){
          $listquery= "SELECT name FROM localshops";
          $listresult=mysqli_query($con,$listquery);
          echo '<select name="delname">';
          echo '<option value="" selected="selected"></option>';
          while ($row =  mysqli_fetch_assoc($listresult)) {
             echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
          }

          echo '</select>';

      }

      ?>

    <!--  <input type="text" name="delname" value=""  required> //-->
      <br><br>


<input type="submit" class="btn-danger btn-lg" name="deletelocal" value="Delete">

</form>
</div>






    <div class="col-md-4">

        <h2>Update Local Shop</h2>

      <form action="updatelocal.php" method="post">

          Name:<br>
          <?php
          include('connection.php');

            if(!isset($error_message)){
              $listquery= "SELECT name FROM localshops";
              $listresult=mysqli_query($con,$listquery);
              echo '<select name="upname">';
              echo '<option value="" selected="selected"></option>';
              while ($row =  mysqli_fetch_assoc($listresult)) {
                 echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
              }

              echo '</select>';

          }

          ?>


          <!--<input type="text" name="upname" reguired>//-->
          <br><br>

          <br>

          <h4>Complete only the fields you want to change</h4>

          New Name:<br>
          <input type="text" name="newname">
          <br>

          New Road:<br>
          <input type="text" name="newroad">
          <br>

          New Number:<br>
          <input type="text" name="newnumbero">
          <br>

          New City:<br>
          <input type="text" name="newcity">
          <br>

          New Postal Code:<br>
          <input type="text" name="newtk">
          <br>

          New Phone Num:<br>
          <input type="text" name="newphone">
          <br>

          New Latitude:<br>
          <input type="text" name="newlat">
          <br>

          New Longitude:<br>
          <input type="text" name="newlong">
          <br>

          New Transit Hub:<br>
         <?php
         include('connection.php');

           if(!isset($error_message)){
             $listquery= "SELECT city FROM transithubs";
             $listresult=mysqli_query($con,$listquery);
             echo '<select name="newhub">';
             echo '<option value="" selected="selected"></option>';
           while ($row =  mysqli_fetch_assoc($listresult)) {

                echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
             }

             echo '</select>';

         }

         ?>


          <!--
                New Transit Hub<br>
                 <input list="newhubs" name="newhubs" >
            <datalist id="newhubs">
              <option value="Alexandroupoli">
              <option value="Aspropyrgos">
              <option value="Heraklion">
              <option value="Ioannina">
              <option value="Kalamata">
              <option value="Larisa">
              <option value="Mytilini">
              <option value="Patra">
              <option value="Thessaloniki">
            </datalist>
            <br>
            //-->

            <br><br><input type="submit" class="btn-warning btn-lg" name="updatelocal" value="Update">

        </form>
      </div><!--col-md-4//-->

</div><!--row//-->

<hr>


<div class="row">
    <div class="col-lg-12">
    <center><h1><b>Local Shop Employee Management</b></h1></center>
    </div>
    <!-- /.col-lg-12 -->
</div>




<div class="row">
   <div class="col-md-4">
<h2> Insert Employee</h2>
<form action="insertshopemp.php" method="post">

 Name:<br>
 <input type="text" name="shempname" value=""  required>
 <br>
 Surname:<br>
 <input type="text" name="shempsurname" value=""  required>
 <br>
 Username:<br>
 <input type="text" name="shempusername" value=""  required>
 <br>
 Password:<br>
 <input type="password" name="shemppassword" value=""  required>
 <br>
 Workplace:<br>
<?php
include('connection.php');

  if(!isset($error_message)){
    $listquery= "SELECT name FROM localshops";
    $listresult=mysqli_query($con,$listquery);
    echo '<select name="shemplocal">';

  while ($row =  mysqli_fetch_assoc($listresult)) {

       echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
    }

    echo '</select>';

}

?>
<br>
<br>
<input type="submit" class="btn-success btn-lg" name="insshemp" value="Insert">
</form>

</div>




<div class="col-md-4">
<h2> Delete Employee</h2>

<form action="deleteshopemp.php" method="post">

Username:<br>
<?php
include('connection.php');

  if(!isset($error_message)){
    $listquery= "SELECT username FROM shopemployees";
    $listresult=mysqli_query($con,$listquery);
    echo '<select name="delshemp">';
    echo '<option value="" selected="selected"></option>';
    while ($row =  mysqli_fetch_assoc($listresult)) {
       echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }

    echo '</select>';

}

?>
<!--<input type="text" name="delshemp" value=""  required>//-->
<br><br>

<input type="submit" class="btn-danger btn-lg" name="deleteshemp" value="Delete">

</form>
</div>






<div class="col-md-4">

  <h2>Update Employee's Info</h2>

<form action="updateshopemp.php" method="post">

    Username:<br>
    <?php
    include('connection.php');

      if(!isset($error_message)){
        $listquery= "SELECT username FROM shopemployees";
        $listresult=mysqli_query($con,$listquery);
        echo '<select name="upshemp">';
        echo '<option value="" selected="selected"></option>';
        while ($row =  mysqli_fetch_assoc($listresult)) {
           echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
        }

        echo '</select>';

    }

    ?>


    <!--<input type="text" name="upshemp" reguired>//-->
    <br><br>

    <br>

    <h4>Complete only the fields you want to change</h4>

    New Name:<br>
    <input type="text" name="newshempname">
    <br>

    New Surname:<br>
    <input type="text" name="newshempsurname">
    <br>

    New Username:<br>
    <input type="text" name="newshempusername">
    <br>

    New Password:<br>
    <input type="password" name="newshemppassword">
    <br>

    New Workplace:<br>
    <?php
    include('connection.php');

      if(!isset($error_message)){
        $listquery= "SELECT name FROM localshops";
        $listresult=mysqli_query($con,$listquery);
        echo '<select name="newshemplocal">';
        echo '<option value="" selected="selected"></option>';
        while ($row =  mysqli_fetch_assoc($listresult)) {
           echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }

        echo '</select>';

    }

    ?>


      <br><br><input type="submit" class="btn-warning btn-lg" name="updatelocal" value="Update">

  </form>
</div><!--col-md-4//-->

</div><!--row//-->

<hr>


<div class="row">
    <div class="col-lg-12">
    <center><h1><b>Transit Hub Employee Management</b></h1></center>
    </div>
    <!-- /.col-lg-12 -->
</div>




<div class="row">
   <div class="col-md-4">
<h2> Insert Employee</h2>
<form action="inserthubemp.php" method="post">

 Name:<br>
 <input type="text" name="hubname" value=""  required>
 <br>
 Surname:<br>
 <input type="text" name="hubsurname" value=""  required>
 <br>
 Username:<br>
 <input type="text" name="hubusername" value=""  required>
 <br>
 Password:<br>
 <input type="password" name="hubpassword" value=""  required>
 <br>
 Transit Hub:<br>
<?php
include('connection.php');

  if(!isset($error_message)){
    $listquery= "SELECT city FROM transithubs";
    $listresult=mysqli_query($con,$listquery);
    echo '<select name="hublocal">';

  while ($row =  mysqli_fetch_assoc($listresult)) {

       echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
    }

    echo '</select>';

}

?>
<br>
<br>
<input type="submit" class="btn-success btn-lg" name="inshub" value="Insert">
</form>

</div>




<div class="col-md-4">
<h2> Delete Employee</h2>

<form action="deletehubemp.php" method="post">

Username:<br>
<?php
include('connection.php');

  if(!isset($error_message)){
    $listquery= "SELECT username FROM hubemployees";
    $listresult=mysqli_query($con,$listquery);
    echo '<select name="delhubuser">';
    echo '<option value="" selected="selected"></option>';
    while ($row =  mysqli_fetch_assoc($listresult)) {
       echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
    }

    echo '</select>';

}

?>
<!--<input type="text" name="delhubuser" value=""  required>//-->
<br><br>

<input type="submit" class="btn-danger btn-lg" name="deletehub" value="Delete">

</form>
</div>






<div class="col-md-4">

  <h2>Update Employee's Info</h2>

<form action="updatehubemp.php" method="post">

    Username:<br>
    <?php
    include('connection.php');

      if(!isset($error_message)){
        $listquery= "SELECT username FROM hubemployees";
        $listresult=mysqli_query($con,$listquery);
        echo '<select name="uphub">';
        echo '<option value="" selected="selected"></option>';
        while ($row =  mysqli_fetch_assoc($listresult)) {
           echo '<option value="'.$row['username'].'">'.$row['username'].'</option>';
        }

        echo '</select>';

    }

    ?>

    <!--<input type="text" name="uphub" reguired>//-->
    <br><br>

    <br>

    <h4>Complete only the fields you want to change</h4>

    New Name:<br>
    <input type="text" name="newhubname">
    <br>

    New Surname:<br>
    <input type="text" name="newhubsurname">
    <br>

    New Username:<br>
    <input type="text" name="newhubusername">
    <br>

    New Password:<br>
    <input type="password" name="newhubpassword">
    <br>

    New Workplace:<br>
    <?php
    include('connection.php');

      if(!isset($error_message)){
        $listquery= "SELECT city FROM transithubs";
        $listresult=mysqli_query($con,$listquery);
        echo '<select name="newhublocal">';
        echo '<option value="" selected="selected"></option>';
        while ($row =  mysqli_fetch_assoc($listresult)) {
           echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
        }

        echo '</select>';

    }

    ?>


      <br><br><input type="submit" class="btn-warning btn-lg" name="updatelocal" value="Update">

  </form>
</div><!--col-md-4//-->

</div><!--row//-->

</div><!--container//-->



<br><br><br>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
