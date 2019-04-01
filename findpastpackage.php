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


            <button class="btn btn-warning navbar-btn" onclick="window.location.href='logedcl.php'">Back</button>
                                      </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>




<div class="container">


  <center>
<h2> Delivered Packages </h2>
<br>

<?php
  include('connection.php');
  $findpastorder = $_SESSION['jojo'];

  if(!isset($error_message)){

      $fiquery= "SELECT * FROM pastorders WHERE pastclientuser ='$findpastorder'";
      $firesult = mysqli_query($con,$fiquery);

}
  if(mysqli_num_rows($firesult)> 0 ){
  while ($row = mysqli_fetch_assoc($firesult)) {


       echo "<tr> ";
       echo "<td> ".$row['pastclientuser']. " / ".$row['pasttrackno']. " / Receiver ".$row['pastreceivername']. " ".$row['pastreceiversurname']."</td>";
       echo "</tr> ";
       echo "<br />";
       echo "--------------------------------------------------------------------------------------------";
       echo "<br />";



}
}
else {
  echo "NO DELIVERED PACKAGES FOUND !!!";
}
?>
<br><br>
<center>
<img src="higray.png" height="20px" width="100%">
</center>

</center>
</div><!--container-->



</body>
</html>
