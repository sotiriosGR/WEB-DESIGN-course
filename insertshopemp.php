<?php
include('connection.php');

      if(!isset( $error_message)) {
      $insshempquery = "INSERT INTO shopemployees(name,surname,username,password,localshop)
 VALUES ('" .$_POST['shempname']. "','" .$_POST['shempsurname']. "','"  .$_POST['shempusername']. "','" .$_POST['shemppassword']. "','"  .$_POST['shemplocal']. "')";
      $result = mysqli_query($con,$insshempquery);
      $message1 = "New Local Shop Employee Successfully Added !!!";
      $message2 = "Problem while shitting";
      }
          if($result>0){echo"<script type='text/javascript'>alert('$message1');</script>";
                        echo("<script>window.location = 'logedmod.php';</script>");}


              else{ echo"<script type='text/javascript'>alert('$message2');</script>";
                     echo("<script>window.location = 'logedmod.php';</script>");}
?>
