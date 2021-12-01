<?php
$connection = new mysqli("localhost:3306", "root", "", "laba7");
$query1 = "SELECT id_photo, id_archive FROM adding";
$adding = $connection->query($query1);
foreach ($adding as $row){
    $query3 = "SELECT * FROM photos WHERE id = ". $row['id_photo']. "AND id_archive =" .$row['id_archive'];
if (!$photos = $connection->query($query3)){
 echo("Error description: photo" . $connection -> error);
}
    foreach ($photos as $photo){
       echo 'Назва фото:' .$photo["name"]. "<br>";
    }}
?>