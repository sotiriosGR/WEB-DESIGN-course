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






<div class="container">
  <div class="jumbotron">
<center>
<?php

        if (isset($_POST['expressor']) && ($_POST['expressor']) == "0") {


include('connection.php');
$from=$_POST['shipfrom'];
$to=$_POST['shipto'];



$trackingnum =$from .time(). $to;
echo '<img src="enadyo.ico">';

echo "Your tracking number is: " .$trackingnum;

$_SESSION['qrcodes'] = $trackingnum ;




if(!isset($error_message)){
  $finderfr= "SELECT transithub FROM localshops WHERE name='$from'";
  $finderfrresult=mysqli_query($con,$finderfr);}

  while ($rew =  mysqli_fetch_assoc($finderfrresult)) {

   $finderfrom = $rew['transithub'];
}


if(!isset($error_message)){
  $finderto= "SELECT transithub FROM localshops WHERE name='$to'";
  $findertoresult=mysqli_query($con,$finderto);}

  while ($raw =  mysqli_fetch_assoc($findertoresult)) {

   $findertooo = $raw['transithub'];
}




                                                          //FIND PATH JSON ARRAAAAAAAAAAY

                                                          $patharray = array();
                                                          array_push($patharray, "$finderfrom");
                                                          $mypathJSON = json_encode($patharray);







    //BASED ON COST C
    //set the distance array
    $_distArr = array();
    $_distArr['Alexandroupoli']['Aspropyrgos'] = 10;
    $_distArr['Alexandroupoli']['Heraklion'] = 15;
    $_distArr['Alexandroupoli']['Thessaloniki'] = 3;
    $_distArr['Aspropyrgos']['Alexandroupoli'] = 10;
    $_distArr['Aspropyrgos']['Heraklion'] = 10;
    $_distArr['Aspropyrgos']['Kalamata'] = 3;
    $_distArr['Aspropyrgos']['Larisa'] = 2;
    $_distArr['Aspropyrgos']['Mytilini'] = 8;
    $_distArr['Aspropyrgos']['Patra'] = 2;
    $_distArr['Aspropyrgos']['Thessaloniki'] = 5;
    $_distArr['Heraklion']['Alexandroupoli'] = 15;
    $_distArr['Heraklion']['Aspropyrgos'] = 10;
    $_distArr['Heraklion']['Kalamata'] = 4;
    $_distArr['Ioannina']['Patra'] = 3;
    $_distArr['Ioannina']['Thessaloniki'] = 1;
    $_distArr['Kalamata']['Aspropyrgos'] = 3;
    $_distArr['Kalamata']['Heraklion'] = 4;
    $_distArr['Kalamata']['Patra'] = 2;
    $_distArr['Larisa']['Aspropyrgos'] = 2;
    $_distArr['Larisa']['Thessaloniki'] = 1;
    $_distArr['Mytilini']['Aspropyrgos'] = 8;
    $_distArr['Patra']['Aspropyrgos'] = 2;
    $_distArr['Patra']['Ioannina'] = 3;
    $_distArr['Patra']['Kalamata'] = 2;
    $_distArr['Thessaloniki']['Alexandroupoli'] = 3;
    $_distArr['Thessaloniki']['Aspropyrgos'] = 5;
    $_distArr['Thessaloniki']['Ioannina'] = 1;
    $_distArr['Thessaloniki']['Larisa'] = 1;

    //the start and the end
    $a = $finderfrom;
    $b = $findertooo;

    //initialize the array for storing
    $S = array();//the nearest path with its parent and weight
    $Q = array();//the left nodes without the nearest path
    foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
    $Q[$a] = 0;


    //start calculating
    while(!empty($Q)){
        $min = array_search(min($Q), $Q);//the most min weight
        if($min == $b) break;
        foreach($_distArr[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
            $Q[$key] = $Q[$min] + $val;
            $S[$key] = array($min, $Q[$key]);
        }
        unset($Q[$min]);
    }

    //list the path
    $path = array();
    $pos = $b;
    while($pos != $a){
        $path[] = $pos;
        $pos = $S[$pos][0];
    }
    $path[] = $a;
    $path = array_reverse($path);

    //print result
    echo "<img src='enadyo.ico'>";
    echo "<br />From $from to $to";
    echo "<br />Cost is ".$S[$b][1]. " &#8364";
    $mustpathJSON = json_encode($path);



    if (($finderfrom =='Alexandroupoli' && $findertooo =='Aspropyrgos') || ($finderfrom == 'Aspropyrgos' && $findertooo == 'Alexandroupoli') ) {

                $simpletime="3";
    }

    elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Heraklion') || ($finderfrom == 'Heraklion' && $findertooo == 'Alexandroupoli')) {

                  $simpletime="6";
      }


      elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Ioannina') || ($finderfrom == 'Ioannina' && $findertooo == 'Alexandroupoli')) {

                    $simpletime="2";
        }

        elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Alexandroupoli')) {

                      $simpletime="4";
          }

          elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Alexandroupoli')) {

                        $simpletime="2";
            }

            elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Alexandroupoli')) {

                          $simpletime="4";
              }

      elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Alexandroupoli')) {

                    $simpletime="1";
        }

        elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Alexandroupoli')) {

                      $simpletime="3";
          }

        elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Heraklion') || ($finderfrom == 'Heraklion' && $findertooo == 'Aspropyrgos')) {

                      $simpletime="3";
          }

          elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Aspropyrgos')) {

                        $simpletime="1";
            }

            elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Aspropyrgos')) {

                          $simpletime="1";
              }

              elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Aspropyrgos')) {

                            $simpletime="1";
                }

                elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Aspropyrgos')) {

                              $simpletime="1";
                  }

                  elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Ioannina') || ($finderfrom == 'Ioannina' && $findertooo == 'Aspropyrgos')) {

                                $simpletime="3";
                    }

                    elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Aspropyrgos')) {

                                  $simpletime="2";
                      }

                      elseif (($finderfrom =='Heraklion' && $findertooo =='Ioannina') || ($finderfrom == 'Ioannina' && $findertooo == 'Heraklion')) {

                                    $simpletime="4";
                        }

                      elseif (($finderfrom =='Heraklion' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Heraklion')) {

                                    $simpletime="2";
                        }

                        elseif (($finderfrom =='Heraklion' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Heraklion')) {

                                      $simpletime="4";
                          }

                          elseif (($finderfrom =='Heraklion' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Heraklion')) {

                                        $simpletime="4";
                            }

                            elseif (($finderfrom =='Heraklion' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Heraklion')) {

                                          $simpletime="3";
                              }

                              elseif (($finderfrom =='Heraklion' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Heraklion')) {

                                            $simpletime="5";
                                }


                                elseif (($finderfrom =='Ioannina' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Ioannina')) {

                                              $simpletime="2";
                                  }

                                  elseif (($finderfrom =='Ioannina' && $findertooo =='Larisa') || ($finderfrom == 'Laris' && $findertooo == 'Ioannina')) {

                                                $simpletime="2";
                                    }

                                    elseif (($finderfrom =='Ioannina' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Ioannina')) {

                                                  $simpletime="4";
                                      }

                        elseif (($finderfrom =='Ioannina' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Ioannina')) {

                                      $simpletime="1";
                          }

                          elseif (($finderfrom =='Ioannina' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Ioannina')) {

                                        $simpletime="1";
                            }

                            elseif (($finderfrom =='Kalamata' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Kalamata')) {

                                          $simpletime="2";
                              }

                          elseif (($finderfrom =='Kalamata' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Kalamata')) {

                                          $simpletime="2";
                              }

                            elseif (($finderfrom =='Kalamata' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Kalamata')) {

                                          $simpletime="1";
                              }

                              elseif (($finderfrom =='Kalamata' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Kalamata')) {

                                            $simpletime="3";
                                }

                                elseif (($finderfrom =='Larisa' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Larisa')) {

                                              $simpletime="2";
                                  }

                                  elseif (($finderfrom =='Larisa' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Larisa')) {

                                                $simpletime="2";
                                    }

                              elseif (($finderfrom =='Larisa' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Larisa')) {

                                            $simpletime="1";
                                }

                                elseif (($finderfrom =='Mytilini' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Mytilini')) {

                                              $simpletime="2";
                                  }

                                elseif (($finderfrom =='Mytilini' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Mytilini')) {

                                              $simpletime="3";
                                  }

                                  elseif (($finderfrom =='Patra' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Patra')) {

                                                $simpletime="2";
                                    }


    echo "<br />est. time of delivery is $simpletime days.";
    echo "<br />Receiver: " .$_POST['recname']." ".$_POST['recsurname'];




      if(!isset( $error_message)) {
      $shipquery = "INSERT INTO orders(cityfrom,cityto,trackno,express,predtime,predcost,clientuser,receivername,receiversurname,pathmust,patho)
 VALUES ('" .$_POST['shipfrom']. "','" .$_POST['shipto']. "','  $trackingnum ','" .$_POST['expressor']. "',' $simpletime ','" .$S[$b][1]. "','"  .$_POST['shipuser']. "','"  .$_POST['recname']. "','"  .$_POST['recsurname']. "','$mustpathJSON',' $mypathJSON ')";
    $result = mysqli_query($con,$shipquery);
  }




} //if expressor





//EXPREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEESS







else {
  include('connection.php');
  $from=$_POST['shipfrom'];
  $to=$_POST['shipto'];



  $trackingnum =$from .time(). $to;
  echo '<img src="enadyo.ico">';

  echo "Your tracking number is: " .$trackingnum;
  $_SESSION['qrcodes'] = $trackingnum ;

  if(!isset($error_message)){
    $finderfr= "SELECT transithub FROM localshops WHERE name='$from'";
    $finderfrresult=mysqli_query($con,$finderfr);}

    while ($rew =  mysqli_fetch_assoc($finderfrresult)) {

     $finderfrom = $rew['transithub'];
  }


  if(!isset($error_message)){
    $finderto= "SELECT transithub FROM localshops WHERE name='$to'";
    $findertoresult=mysqli_query($con,$finderto);}

    while ($raw =  mysqli_fetch_assoc($findertoresult)) {

     $findertooo = $raw['transithub'];
  }


                                                                    //FIND PATH JSON ARRAAAAAAAAAAY

                                                                    $patharray = array();
                                                                    array_push($patharray, "$finderfrom");
                                                                    $mypathJSON = json_encode($patharray);





      //BASED ON COST C
      //set the distance array
      $_distArr = array();
      $_distArr['Alexandroupoli']['Aspropyrgos'] = 1;
      $_distArr['Alexandroupoli']['Heraklion'] = 1;
      $_distArr['Alexandroupoli']['Thessaloniki'] = 1;
      $_distArr['Aspropyrgos']['Alexandroupoli'] = 1;
      $_distArr['Aspropyrgos']['Heraklion'] = 1;
      $_distArr['Aspropyrgos']['Kalamata'] = 1;
      $_distArr['Aspropyrgos']['Larisa'] = 1;
      $_distArr['Aspropyrgos']['Mytilini'] = 1;
      $_distArr['Aspropyrgos']['Patra'] = 1;
      $_distArr['Aspropyrgos']['Thessaloniki'] = 1;
      $_distArr['Heraklion']['Alexandroupoli'] = 1;
      $_distArr['Heraklion']['Aspropyrgos'] = 1;
      $_distArr['Heraklion']['Kalamata'] = 2;
      $_distArr['Ioannina']['Patra'] = 1;
      $_distArr['Ioannina']['Thessaloniki'] = 1;
      $_distArr['Kalamata']['Aspropyrgos'] = 1;
      $_distArr['Kalamata']['Heraklion'] = 2;
      $_distArr['Kalamata']['Patra'] = 1;
      $_distArr['Larisa']['Aspropyrgos'] = 1;
      $_distArr['Larisa']['Thessaloniki'] = 1;
      $_distArr['Mytilini']['Aspropyrgos'] = 1;
      $_distArr['Patra']['Aspropyrgos'] = 1;
      $_distArr['Patra']['Ioannina'] = 1;
      $_distArr['Patra']['Kalamata'] = 1;
      $_distArr['Thessaloniki']['Alexandroupoli'] = 1;
      $_distArr['Thessaloniki']['Aspropyrgos'] = 1;
      $_distArr['Thessaloniki']['Ioannina'] = 1;
      $_distArr['Thessaloniki']['Larisa'] = 1;

      //the start and the end
      $a = $finderfrom;
      $b = $findertooo;

      //initialize the array for storing
      $S = array();//the nearest path with its parent and weight
      $Q = array();//the left nodes without the nearest path
      foreach(array_keys($_distArr) as $val) $Q[$val] = 99999;
      $Q[$a] = 0;


      //start calculating
      while(!empty($Q)){
          $min = array_search(min($Q), $Q);//the most min weight
          if($min == $b) break;
          foreach($_distArr[$min] as $key=>$val) if(!empty($Q[$key]) && $Q[$min] + $val < $Q[$key]) {
              $Q[$key] = $Q[$min] + $val;
              $S[$key] = array($min, $Q[$key]);
          }
          unset($Q[$min]);
      }

      //list the path
      $path = array();
      $pos = $b;
      while($pos != $a){
          $path[] = $pos;
          $pos = $S[$pos][0];
      }
      $path[] = $a;
      $path = array_reverse($path);

      //print result
      echo "<img src='enadyo.ico'>";
      echo "<br />From $from to $to";
      echo "<br />est. time of delivery is ".$S[$b][1]. " day(s).";

    $mustpathJSON = json_encode($path);





      if (($finderfrom =='Alexandroupoli' && $findertooo =='Aspropyrgos') || ($finderfrom == 'Aspropyrgos' && $findertooo == 'Alexandroupoli') ) {

                  $expresscost="10";
      }

      elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Heraklion') || ($finderfrom == 'Heraklion' && $findertooo == 'Alexandroupoli')) {

                    $expresscost="15";
        }


        elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Ioannina') || ($finderfrom == 'Ioannina' && $findertooo == 'Alexandroupoli')) {

                      $expresscost="4";
          }

          elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Alexandroupoli')) {

                        $expresscost="13";
            }

            elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Alexandroupoli')) {

                          $expresscost="4";
              }

              elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Alexandroupoli')) {

                            $expresscost="18";
                }

        elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Alexandroupoli')) {

                      $expresscost="3";
          }

          elseif (($finderfrom =='Alexandroupoli' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Alexandroupoli')) {

                        $expresscost="13";
            }

          elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Heraklion') || ($finderfrom == 'Heraklion' && $findertooo == 'Aspropyrgos')) {

                        $expresscost="10";
            }

            elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Aspropyrgos')) {

                          $expresscost="3";
              }

              elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Aspropyrgos')) {

                            $expresscost="2";
                }

                elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Aspropyrgos')) {

                              $expresscost="8";
                  }

                  elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Aspropyrgos')) {

                                $expresscost="2";
                    }

                    elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Ioannina') || ($finderfrom == 'Ioannina' && $findertooo == 'Aspropyrgos')) {

                                  $expresscost="5";
                      }

                      elseif (($finderfrom =='Aspropyrgos' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Aspropyrgos')) {

                                    $expresscost="5";
                        }

                        elseif (($finderfrom =='Heraklion' && $findertooo =='Ioannina') || ($finderfrom == 'Ioannina' && $findertooo == 'Heraklion')) {

                                      $expresscost="15";
                          }

                        elseif (($finderfrom =='Heraklion' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Heraklion')) {

                                      $expresscost="4";
                          }

                          elseif (($finderfrom =='Heraklion' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Heraklion')) {

                                        $expresscost="12";
                            }

                            elseif (($finderfrom =='Heraklion' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Heraklion')) {

                                          $expresscost="18";
                              }

                              elseif (($finderfrom =='Heraklion' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Heraklion')) {

                                            $expresscost="12";
                                }

                                elseif (($finderfrom =='Heraklion' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Heraklion')) {

                                              $expresscost="15";
                                  }


                                  elseif (($finderfrom =='Ioannina' && $findertooo =='Kalamata') || ($finderfrom == 'Kalamata' && $findertooo == 'Ioannina')) {

                                                $expresscost="5";
                                    }

                                    elseif (($finderfrom =='Ioannina' && $findertooo =='Larisa') || ($finderfrom == 'Laris' && $findertooo == 'Ioannina')) {

                                                  $expresscost="2";
                                      }

                                      elseif (($finderfrom =='Ioannina' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Ioannina')) {

                                                    $expresscost="13";
                                        }

                          elseif (($finderfrom =='Ioannina' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Ioannina')) {

                                        $expresscost="3";
                            }

                            elseif (($finderfrom =='Ioannina' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Ioannina')) {

                                          $expresscost="1";
                              }

                              elseif (($finderfrom =='Kalamata' && $findertooo =='Larisa') || ($finderfrom == 'Larisa' && $findertooo == 'Kalamata')) {

                                            $expresscost="5";
                                }

                            elseif (($finderfrom =='Kalamata' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Kalamata')) {

                                            $expresscost="11";
                                }

                              elseif (($finderfrom =='Kalamata' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Kalamata')) {

                                            $expresscost="2";
                                }

                                elseif (($finderfrom =='Kalamata' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Kalamata')) {

                                              $expresscost="8";
                                  }

                                  elseif (($finderfrom =='Larisa' && $findertooo =='Mytilini') || ($finderfrom == 'Mytilini' && $findertooo == 'Larisa')) {

                                                $expresscost="10";
                                    }

                                    elseif (($finderfrom =='Larisa' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Larisa')) {

                                                  $expresscost="4";
                                      }

                                elseif (($finderfrom =='Larisa' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Larisa')) {

                                              $expresscost="1";
                                  }

                                  elseif (($finderfrom =='Mytilini' && $findertooo =='Patra') || ($finderfrom == 'Patra' && $findertooo == 'Mytilini')) {

                                                $expresscost="10";
                                    }

                                  elseif (($finderfrom =='Mytilini' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Mytilini')) {

                                                $expresscost="13";
                                    }

                                    elseif (($finderfrom =='Patra' && $findertooo =='Thessaloniki') || ($finderfrom == 'Thessaloniki' && $findertooo == 'Patra')) {

                                                  $expresscost="4";
                                      }

                                      echo "<br />Cost is: $expresscost &#8364 .";
                                      echo "<br />Receiver: " .$_POST['recname']." ".$_POST['recsurname'];



        if(!isset( $error_message)) {
        $shipquery = "INSERT INTO orders(cityfrom,cityto,trackno,express,predtime,predcost,clientuser,receivername,receiversurname,pathmust,patho)
   VALUES ('" .$_POST['shipfrom']. "','" .$_POST['shipto']. "','  $trackingnum ','" .$_POST['expressor']. "','" .$S[$b][1]. "',' $expresscost ','"  .$_POST['shipuser']. "','"  .$_POST['recname']. "','"  .$_POST['recsurname']. "' ,'$mustpathJSON',' $mypathJSON ')";
      $result = mysqli_query($con,$shipquery);
}
} // else expressor

?>
<br><br>
  <button class="btn btn-success  btn-lg" onclick="window.location.href='qrprinter.php'">PRINT QR CODE</button>

</div> <!--container-->
</div> <!--jumbotron-->
</center>
