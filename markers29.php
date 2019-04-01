<?php
session_start();
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

include('connection.php');

if(!isset( $error_message)) {

 $findpackage = $_SESSION['jojo'];
 ;

// Select all the rows in the markers table
$equery = "SELECT patho FROM orders WHERE clientuser='$findpackage'";
$result = mysqli_query($con,$equery);
$rew = mysqli_fetch_assoc($result);
$findarray = array();
$findarray = json_decode($rew['patho']);

}
header("Content-type: text/xml");

echo '<markers>';

foreach ($findarray as $key => $value) {
/*  if ($key == '0') {
    $type= 'start';
  }
  else {
    $type='middle';
  } */

  $type = $key;

include('connection.php');

$eftaquery="SELECT * FROM transithubs WHERE city='$value'";

$eftaresult= mysqli_query($con,$eftaquery);


while ($row = mysqli_fetch_assoc($eftaresult)){
  // Add to XML document node

  echo '<marker ';

  echo 'name="' . parseToXML($row['city']) . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo 'type= "' .$type. '" ';
  echo '/>';

}//while
}//foreach
echo '</markers>';



?>
