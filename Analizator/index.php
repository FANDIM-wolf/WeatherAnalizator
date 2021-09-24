<?php

include "ClassTown.php";
include "config.php";


 ?>
 <center>
 <img src="webpic1.png">
 <form action = "index.php" name="form_search" method="get">
	<input type="text" size="60" name="town" >
	<input type="number" size="60" name="temperature" >
	<input type="submit" >
 </form> 
 </center>
 <?php
$country = 'USA';
$name_town = $_GET['town'];
$sql = 'SELECT * FROM towns WHERE name=:name';
$query = $connection->prepare($sql);
$query->execute(['name'=>$name_town]);

while($row = $query->fetch(PDO::FETCH_ASSOC)){
    echo '<b>'.$row['country'].'</b>';
}
 
 ?>