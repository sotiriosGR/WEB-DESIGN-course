<?php
include('connection.php');

      if(!isset( $error_message)) {
      $insquery = "INSERT INTO localshops(name,road,numbero,city,tk,phone,latitude,longitude,transithub)
 VALUES ('" .$_POST['localname']. "','" .$_POST['localroad']. "','"  .$_POST['localnumber']. "','" .$_POST['localcity']. "','"  .$_POST['localtk']. "','"  .$_POST['localphone']. "','"  .$_POST['locallat']. "','"  .$_POST['locallong']. "','".$_POST['localhub']."')";
      $result = mysqli_query($con,$insquery);
      $message1 = "Success !!!";
      $message2 = "Insertion Fail NOOB";
      }
          if($result>0){echo"<script type='text/javascript'>alert('$message1');</script>";
                        echo("<script>window.location = 'logedmod.php';</script>");}


              else{ echo"<script type='text/javascript'>alert('$message2');</script>";
                     echo("<script>window.location = 'logedmod.php';</script>");}
?>
