<?php
session_start();

        include('connection.php');


        $accept=0;

        $mail_query="SELECT * FROM hubemployees";

        $confirm_q = $con->query($mail_query);
        $user_found = false;

        while(($reg= mysqli_fetch_assoc($confirm_q)) && $user_found == false) {
          if ($_POST["hubusername"]==$reg['username'] && $_POST["hubpassword"]==$reg['password']) {
            $user_found = true;
            $accept=$accept + 1;
            $_SESSION['hubem'] = 1;
            $_SESSION['wannahub'] = $reg['transithub'];
            $name = $reg['name'];
          }
        }
           if($accept>0){header ('Location: hubsite.php');}
                  else{ $messagehubnot = "Wrong Username or Password, please try again.";
                                echo"<script type='text/javascript'>alert('$messagehubnot');</script>";
                                echo("<script>window.location = 'hublogin.php';</script>");}
?>
