<?php
$connection = new mysqli("localhost:3306", "root", "", "web_audio");
$query = "SELECT id, name, surname, username FROM authors";
$authors = $connection->query($query);
foreach ($authors as $row) {
	echo 'Автор: ' . $row["name"] . " " . $row["surname"]. ', нікнейм: ' . $row["username"] . '. Пісні:<ul>';
	$query2 = "SELECT * FROM songs WHERE author_id = ". $row['id'];
	$songs = $connection->query($query2);
	foreach ($songs as $song) {
		$songdesc = ($song["description"] == "") ? "." : (". Description: " . $song["description"]);
		echo '<li> ' . $song["name"] . $songdesc . '</li>';
	}
	echo '</ul>';
}
?>