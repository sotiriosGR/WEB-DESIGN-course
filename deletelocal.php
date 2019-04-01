<?php
include('connection.php');

      if(!isset( $error_message)) {
      $delname = $_POST['delname'];
      $accepted=0;

      $triaquery = "SELECT * FROM localshops WHERE name='$delname'";
      $triaresult=mysqli_query($con,$triaquery);

      while ($poutses=mysqli_fetch_assoc($triaresult)) {
        if($delname == $poutses['name']){

          $accepted=$accepted +1;
          $delquery = "DELETE FROM localshops WHERE name='$delname'";
          $result=mysqli_query($con,$delquery);


    }//if $delname
    }//while
    }//if isset

      $message1 = "Deleted Successfully !!!";
      $message2 = " Failed while deleting";

          if($accepted>0 && $result>0){echo"<script type='text/javascript'>alert('$message1');</script>";
                        echo("<script>window.location = 'logedmod.php';</script>");}


              else{ echo"<script type='text/javascript'>alert('$message2');</script>";
                     echo("<script>window.location = 'logedmod.php';</script>");}
?>
