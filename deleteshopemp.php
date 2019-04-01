<?php
include('connection.php');

      if(!isset( $error_message)) {

      $delusername = $_POST['delshemp'];
      $accepted=0;

      $enaquery = "SELECT * FROM shopemployees WHERE username='$delusername'";
      $enaresult=mysqli_query($con,$enaquery);

      while($skata=mysqli_fetch_assoc($enaresult)){
        if($delusername=$skata['username']){

          $accepted=$accepted+1;
          $delshempquery = "DELETE FROM shopemployees WHERE username='$delusername'";
          $dyoresult=mysqli_query($con,$delshempquery);

        }//if $delusername

      }//while

    }//if !isset
              $message1 = "Deleted Successfully !!!";
              $message2 = " Failed while deleting";

          if($accepted>0 && $dyoresult>0){echo"<script type='text/javascript'>alert('$message1');</script>";
                                        echo("<script>window.location = 'logedmod.php';</script>");}


              else{ echo"<script type='text/javascript'>alert('$message2');</script>";
                     echo("<script>window.location = 'logedmod.php';</script>");}
?>
