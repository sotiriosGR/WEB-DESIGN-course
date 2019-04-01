<?php

        include('connection.php');

        $upname = $_POST['upname'];
        $messageif="Please enter the name of the local shop you want to update";

        if(!empty($upname)){

        if(!isset($error_message)){



          $findquery = "SELECT * FROM localshops WHERE name='$upname'";

          $result=mysqli_query($con,$findquery);


    if( mysqli_num_rows($result) > 0 ){

        while($row = mysqli_fetch_assoc($result)){


          if(empty($_POST['newname'])){

            $newname = $row['name'];

            }
            else {
              $newname = $_POST['newname'];
            }



            if(empty($_POST['newroad'])){

              $newroad = $row['road'];

              }
              else {
                $newroad = $_POST['newroad'];
              }


              if(empty($_POST['newnumbero'])){

                $newnumbero = $row['numbero'];

                }
                else {
                  $newnumbero = $_POST['newnumbero'];
                }



                if(empty($_POST['newcity'])){

                  $newcity = $row['city'];

                  }
                  else {
                    $newcity = $_POST['newcity'];
                  }



                  if(empty($_POST['newtk'])){

                    $newtk = $row['tk'];

                    }
                    else {
                      $newtk = $_POST['newtk'];
                    }



                    if(empty($_POST['newphone'])){

                      $newphone = $row['phone'];

                      }
                      else {
                        $newphone = $_POST['newphone'];
                      }



                      if(empty($_POST['newlat'])){

                        $newlat = $row['latitude'];

                        }
                        else {
                          $newlat = $_POST['newlat'];
                        }


                        if(empty($_POST['newlong'])){

                          $newlong = $row['longitude'];

                          }
                          else {
                            $newlong = $_POST['newlong'];
                          }


                         if(empty($_POST['newhub'])){

                            $newhub = $row['transithub'];

                            }
                            else {
                              $newhub = $_POST['newhub'];
                            }





                            } //while


    $upquery = "UPDATE localshops SET name='$newname',road='$newroad', numbero='$newnumbero', city='$newcity', tk='$newtk', phone='$newphone', latitude='$newlat', longitude='$newlong',transithub='$newhub' WHERE name='$upname'";

                                $update=mysqli_query($con,$upquery);




                                $message1= "Update Successfull";
                                $message2= "Fail in Update";

                                if($update>0){echo"<script type='text/javascript'>alert('$message1');</script>";
                                              echo("<script>window.location = 'logedmod.php';</script>");}


                                    else{ echo"<script type='text/javascript'>alert('$message2');</script>";
                                           echo("<script>window.location = 'logedmod.php';</script>");}

                                         } //if num_rows>0
                                         else {
                                           $messagenota="Given local shop does NOT exist";
                                           echo"<script type='text/javascript'>alert('$messagenota');</script>";
                                                         echo("<script>window.location = 'logedmod.php';</script>");}


                                          } //if isset
                                          }//if !empty

                                          else {
                                            echo"<script type='text/javascript'>alert('$messageif');</script>";
                                                   echo("<script>window.location = 'logedmod.php';</script>");
                                          }


?>
