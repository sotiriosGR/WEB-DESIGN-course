<?php

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


// Select all the rows in the markers table
$equery = "SELECT * FROM localshops WHERE 1";
$result = mysqli_query($con,$equery);

}
header("Content-type: text/xml");


// Start XML file, echo parent node
echo '<markers>';



// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
      $type="localshop";
      $space=" ";
  // Add to XML document node
  echo '<marker ';
//  echo 'id="' . $row['id'] . '" ';
  echo 'name="' . parseToXML($row['city']) . '" ';
  echo 'address="' . parseToXML($row['road']) . ' '.$space.' ' . parseToXML($row['numbero']) . '" ';
  //echo 'numbero="' . parseToXML($row['numbero']) . '" ';
  echo 'lat="' . $row['latitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  echo 'type= "' .$type. '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
