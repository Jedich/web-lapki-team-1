<?php
$message = array();
$mysqli = new mysqli("localhost:3306", "root", "", "ukrabobus_db") or die(mysqli_error($mysqli));
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$sname = mysqli_real_escape_string($mysqli, $_POST['surname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$pwd = mysqli_real_escape_string($mysqli, $_POST['pwd']);

if (empty($name)) { array_push($message,"Name is required"); }
if (empty($sname)) { array_push($message,"Surname is required"); }
if (empty($email)) { array_push($message,"surname is required"); }
if (empty($pwd)) { array_push($message,"Password is required"); }

if (count($message) != 0) {
}
if ($_POST["isLogin"] == "true") {

} else {
	$res = $mysqli->query("SELECT * FROM ukrabobus_db.passangers
	WHERE `e-mail` = '$email' AND password = '$pwd';") or die(mysqli_error($mysqli));
	if ($res === null) {
		$mysqli->query("INSERT INTO ukrabobus_db.passangers(name, sname, `e-mail`, password)
	VALUES ('$name', '$sname', '$email', '$pwd')") or die(mysqli_error($mysqli));
	} else {
		array_push($message, "User already exists");
	}
}
