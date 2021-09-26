<?php

include "ClassTown.php";
include "config.php";
include 'phpQuery-onefile.php';



 ?>
 <center>
 <img src="webpic1.png">
 <div style="margin-right:100px;">
 <form action = "index.php" name="form_search" method="get">
	<input type="text" size="60" name="town" >
	<input type="number" size="60" name="temperature" >
	<input type="submit" >
 </form>
 </div> 
 </center>
 <?php
$name_town = $_GET['town'];
$country = 'USA';
$sql = 'SELECT * FROM towns WHERE name=:name';
$query = $connection->prepare($sql);
$query->execute(['name'=>$name_town]);

while($row = $query->fetch(PDO::FETCH_ASSOC)){
    echo '<b>'.$row['country'].'</b>';
}
 

//start of parsing 
$str0 = 'https://yandex.ru/search/?lr=9&text=погода+в+';
$str1 = $name_town;
$str2 = '&src=suggest_B';


$ggf = file_get_contents($str0.$str1.$str2);

$yandex_document = phpQuery::newDocument($ggf);

$temperature_in_town = $yandex_document->find('div.weather-forecast__current-temp');
$description_in_town = $yandex_document->find('div.weather-forecast__current-details');

echo $name_town.$temperature_in_town.'<br>'.$description_in_town;

 ?>