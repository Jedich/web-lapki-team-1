<?php
$connection = new mysqli("localhost:3306", "root", "", "laba7");
$query1 = "SELECT * FROM archives";
$archives = $connection->query($query1);
foreach ($archives as $row){
    $query3 = "SELECT * FROM photos WHERE id_archive =" .$row['id'];
if (!$photos = $connection->query($query3)){
 echo("Error description: photo" . $connection -> error);
} echo 'Архів фотографій №' .$row['id']. ':<ul>';
    foreach ($photos as $photo){
       echo 'Назва фото: ' .$photo["name"]. "<br>";
    }
    echo '</ul>';
    }
?>