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
                <a class="navbar-brand" href="">Courier Project  Transit Hub Site</a>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                  <button class="btn btn navbar-btn" onclick="window.location.href='index.php'">BACK TO MAIN PAGE</button>

                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



    <div class="jumbotron">
      <center>
      <br>
    <h2> Push The Button !!!</h2>
      <br><br>
    </center>
    </div>

<div class="container">


<center>
  <button type="button" class="btn btn-primary btn-lg" data-toggle="collapse" data-target="#hublog"><span class="glyphicon glyphicon-user"></span> Transit Hub Employees</button>
    <div id="hublog" class="collapse">
<br><br>
      <form action="hubloginform.php" method="post">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input  type="text" class="form-control" name="hubusername" placeholder="Username" required>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input  type="password" class="form-control" name="hubpassword" placeholder="Password" required>
      </div>
      <br>
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    </div>
</center>
<hr>
</div> <!--container-->
<div class="jumbotron">
  <center>
  <br><br>
<h2> Access Granted for Transit Hub Employees Only </h2>
  <br><br>
</center>
</div>





    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
