<?php
$mysqli = new mysqli("localhost:3306", "root", "", "ukrabobus_db");
$query = $mysqli->query("SELECT id, name, sname, `e-mail` FROM passangers");
$res = array();
foreach($query as $user) {
	array_push($res, $user);
}
echo json_encode($res);