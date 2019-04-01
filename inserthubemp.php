<?php
include('connection.php');

      if(!isset( $error_message)) {
      $inshubquery = "INSERT INTO hubemployees(name,surname,username,password,transithub)
 VALUES ('" .$_POST['hubname']. "','" .$_POST['hubsurname']. "','"  .$_POST['hubusername']. "','" .$_POST['hubpassword']. "','"  .$_POST['hublocal']. "')";
      $result = mysqli_query($con,$inshubquery);
      $message1 = "New Transit Hub Employee Successfully Added !!!";
      $message2 = "Problem while shitting";
      }
          if($result>0){echo"<script type='text/javascript'>alert('$message1');</script>";
                        echo("<script>window.location = 'logedmod.php';</script>");}


              else{ echo"<script type='text/javascript'>alert('$message2');</script>";
                     echo("<script>window.location = 'logedmod.php';</script>");}
?>
