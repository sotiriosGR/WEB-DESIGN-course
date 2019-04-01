<?php

        include('connection.php');

        $uphub = $_POST['uphub'];
        $messageif="Please enter the username of the local shop employee you want to update.";

        if(!empty($uphub)){

        if(!isset($error_message)){



          $findshquery = "SELECT * FROM hubemployees WHERE username='$uphub'";

          $resulta=mysqli_query($con,$findshquery);


    if( mysqli_num_rows($resulta) >0 ){

        while($rea = mysqli_fetch_assoc($resulta)){


          if(empty($_POST['newhubname'])){

            $newhubname = $rea['name'];

            }
            else {
              $newhubname = $_POST['newhubname'];
            }



            if(empty($_POST['newhubsurname'])){

              $newhubsurname = $rea['surname'];

              }
              else {
                $newhubsurname = $_POST['newhubsurname'];
              }


              if(empty($_POST['newhubusername'])){

                $newhubusername = $rea['username'];

                }
                else {
                  $newhubusername = $_POST['newhubusername'];
                }



                if(empty($_POST['newhubpassword'])){

                  $newhubpassword = $rea['password'];

                  }
                  else {
                    $newhubpassword = $_POST['newhubpassword'];
                  }





                         if(empty($_POST['newhublocal'])){

                            $newhublocal = $rea['transithub'];

                            }
                            else {
                              $newhublocal = $_POST['newhublocal'];
                            }





                            } //while


                $uphubquery= "UPDATE hubemployees SET name='$newhubname',surname='$newhubsurname', username='$newhubusername', password='$newhubpassword',transithub='$newhublocal' WHERE username='$uphub'";

                                $updatehub=mysqli_query($con,$uphubquery);




                                $message1= "Update Successfull";
                                $message2= "Fail in Update";

                                if($updatehub>0){echo"<script type='text/javascript'>alert('$message1');</script>";
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
