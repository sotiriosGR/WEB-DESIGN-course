<?php session_start();
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
    <center>
  <?php
          include('connection.php');


          $accept=0;

          $mail_query="SELECT * FROM clients";

          $confirm_q = $con->query($mail_query);
          $user_found = false;

          while(($reg= mysqli_fetch_assoc($confirm_q)) && $user_found == false) {
          	if ($_POST["username"]==$reg['username'] && $_POST["password"]==$reg['password']) {
          		$user_found = true;
          		$accept=$accept + 1;
          		$_SESSION['client'] = 1;
          		$name = $reg['name'];
              $_SESSION['jojo'] = $reg['username']; 
          	}
          }
             if($accept>0){header ('Location: logedcl.php');}
                    else{echo 'Wrong Username or Password. Try again';}



           ?>
</center>
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
                      <li class="active"><a href="index.php">Home</a>
                      </li>


                      <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="logincl.php">Client</a></li>
                            <li><a href="loginem.php">Employee</a></li>
                            <li><a href="loginmod.php">Moderator</a></li>
                          </ul>
                        </li>


                      <li>
                          <a href="register.html"><span class="glyphicon glyphicon-user"></span> Register</a>
                      </li>

                  </ul>
                </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
      </nav>

</body>
</html>
