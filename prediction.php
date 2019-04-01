<?php
require_once("connection.php");

if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM localshops WHERE name like '" . $_POST["keyword"] . "%' ORDER BY name LIMIT 0,6";
$result = mysqli_query($con,$query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $namee) {
?>
<li onClick="selectCountry('<?php echo $namee["name"]; ?>');"><?php echo $namee["name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>
