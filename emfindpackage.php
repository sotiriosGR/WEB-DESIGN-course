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
$findtrack = $_POST['findtrack'];

if(!isset($error_message)){

    $findquery= "SELECT * FROM orders WHERE clientuser ='$findtrack'";
    $findresult = mysqli_query($con,$findquery);


    if(mysqli_num_rows($findresult)> 0 ){


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

<hr>

</body>
</html>
