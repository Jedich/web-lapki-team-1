<?php

if(isset($_POST["user_id"])) {
	if($_POST["user_id"] == "") {
		echo json_encode(array('msg' => 'Id is not set!', 'code' => 400));
		return;
	}
	$mysqli = new mysqli("localhost:3306", "root", "", "ukrabobus_db");
	$q = $mysqli->query("DELETE FROM passangers WHERE id=".$_POST["user_id"]);
	$query = $mysqli->query("SELECT id, name, sname, `e-mail` FROM passangers");
	$res = array();
	foreach($query as $user) {
		array_push($res, $user);
	}
	echo json_encode($res);
}