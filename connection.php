<?php
$hostname = "localhost"; //local server name default localhost
$username = "root";  //mysql username default is root.
$password = "";       //blank if no password is set for mysql.
$database = "courierdb";  //database name which you created
$con = new mysqli($hostname,$username,$password,$database);

if($con->connect_error) {
	 die("Connection failed: " . $con->connect_error);
}


?>
