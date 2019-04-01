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

                    <button class="btn btn-warning navbar-btn" onclick="window.location.href='logedem.php'">Back</button>

                  </ul>



          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
<center>
  <br><br><br>

<?php
include('connection.php');
$deltrack = $_POST['deltrack'];

if(!isset($error_message)){

    $delquery= "SELECT * FROM orders WHERE clientuser ='$deltrack'";
    $delresult = mysqli_query($con,$delquery);



      if(mysqli_num_rows($delresult)> 0 ){


      while ($row = mysqli_fetch_assoc($delresult)) {

        echo "$deltrack's shipment successfully delivered to " .$row['receivername']. " " .$row['receiversurname']. ".";
        echo "<br />";

        $pastfrom = $row['cityfrom'];
        $pastto = $row['cityto'];
        $pasttrackno = $row['trackno'];
        $pastexpress = $row['express'];
        $pastpredtime = $row['predtime'];
        $pastpredcost = $row['predcost'];
        $pastclientuser = $row['clientuser'];
        $pastreceivername = $row['receivername'];
        $pastreceiversurname = $row['receiversurname'];
        $pastpathmust = $row['pathmust'];
        $pastpatho = $row['patho'];

        $inspastquery = "INSERT INTO pastorders(pastcityfrom,pastcityto,pasttrackno,pastexpress,pastpredtime,pastpredcost,pastclientuser,pastreceivername,pastreceiversurname,pastpathmust,pastpatho)
   VALUES ('$pastfrom','$pastto','$pasttrackno','$pastexpress','$pastpredtime', '$pastpredcost', '$pastclientuser','$pastreceivername','$pastreceiversurname','$pastpathmust','$pastpatho')";
        $inspastresult = mysqli_query($con,$inspastquery);


        $delquery = "DELETE FROM orders WHERE clientuser ='$deltrack'";
        $result=mysqli_query($con,$delquery);




    }//while

}//rows
else {
  echo "Wrong Client Username OR Package already delivered";
}

}//isset



?>
<br><br><br>
<center>
<img src="higray.png" height="20px" width="60%">
</center>
<br>
</center>
</body>
</html>
