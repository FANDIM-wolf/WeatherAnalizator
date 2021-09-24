 


<?php 

// Create connection
$conn = new mysqli('localhost', 'mikhail', 'root');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Weather analyzer";
$name_town = $_GET['town_name'];
$temperature_town = $_GET['temperature'];

if($name_town != null && $temperature_town == null){
	
	echo "<br>";
	echo $name_town." "."town";
	
}



?>