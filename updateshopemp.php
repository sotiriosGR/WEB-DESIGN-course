<?php

        include('connection.php');

        $upshemp = $_POST['upshemp'];
        $messageif="Please enter the username of the local shop employee you want to update.";

        if(!empty($upshemp)){

        if(!isset($error_message)){



          $findshquery = "SELECT * FROM shopemployees WHERE username='$upshemp'";

          $resulta=mysqli_query($con,$findshquery);


    if( mysqli_num_rows($resulta) >0 ){

        while($rea = mysqli_fetch_assoc($resulta)){


          if(empty($_POST['newshempname'])){

            $newshempname = $rea['name'];

            }
            else {
              $newshempname = $_POST['newshempname'];
            }



            if(empty($_POST['newshempsurname'])){

              $newshempsurname = $rea['surname'];

              }
              else {
                $newshempsurname = $_POST['newshempsurname'];
              }


              if(empty($_POST['newshempusername'])){

                $newshempusername = $rea['username'];

                }
                else {
                  $newshempusername = $_POST['newshempusername'];
                }



                if(empty($_POST['newshemppassword'])){

                  $newshemppassword = $rea['password'];

                  }
                  else {
                    $newshemppassword = $_POST['newshemppassword'];
                  }





                         if(empty($_POST['newshemplocal'])){

                            $newshemplocal = $rea['localshop'];

                            }
                            else {
                              $newshemplocal = $_POST['newshemplocal'];
                            }





                            } //while


                $upshquery= "UPDATE shopemployees SET name='$newshempname',surname='$newshempsurname', username='$newshempusername', password='$newshemppassword',localshop='$newshemplocal' WHERE username='$upshemp'";

                                $updatesh=mysqli_query($con,$upshquery);




                                $message1= "Update Successfull";
                                $message2= "Fail in Update";

                                if($updatesh>0){echo"<script type='text/javascript'>alert('$message1');</script>";
                                              echo("<script>window.location = 'logedmod.php';</script>");}


                                    else{ echo"<script type='text/javascript'>alert('$message2');</script>";
                                           echo("<script>window.location = 'logedmod.php';</script>");}

                                         } //if num_rows>0
                                         else {
                                           $messagenot="Given Username does NOT exist";
                                           echo"<script type='text/javascript'>alert('$messagenot');</script>";
                                                         echo("<script>window.location = 'logedmod.php';</script>");}




                                       }//if isset
                                          }//if !empty

                                          else {
                                            echo"<script type='text/javascript'>alert('$messageif');</script>";
                                                   echo("<script>window.location = 'logedmod.php';</script>");
                                          }


?>
