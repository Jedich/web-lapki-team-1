<?php

$message = array();
$mysqli = new mysqli("localhost:3306", "root", "", "ukrabobus_db") or die(mysqli_error($mysqli));
$name = '';
$sname = '';
$email = '';
$pwd = '';
$isLogin = '';

if (isset($_POST['reg_user'])) {
	session_start();
	$name = $_POST['name'];
	$sname = $_POST['surname'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];

	if (empty($email)) {
		array_push($message, "Email is required");
	}
	if (empty($pwd)) {
		array_push($message, "Password is required");
	}

	$user = new User($email, $pwd);

	$isLogin = $_POST["isLogin"];

	if ($isLogin == 'true') {
		$a = login($mysqli, $user);
		if ($a !== '') {
			array_push($message, $a);
		}
	} else {
		if (($name) === '') {
			array_push($message, "Name is required");
		}
		if (($sname) === '') {
			array_push($message, "Surname is required");
		}
		if (count($message) > 0) {
			return;
		} else {
		}
		$res = $mysqli->query("SELECT * FROM ukrabobus_db.passangers WHERE `e-mail` = '$email';") or die(mysqli_error($mysqli));
		if (mysqli_num_rows($res) == 0) {
			$mysqli->query("INSERT INTO ukrabobus_db.passangers(name, sname, `e-mail`, password) VALUES ('$name', '$sname', '$email', '$pwd')") or die(mysqli_error($mysqli));
			$a = login($mysqli, $user);
			if ($a !== '') {
				array_push($message, $a);
			}
		} else {
			array_push($message, "User already exists");
		}
	}
}
//foreach ($message as $m) {
//	echo $m;
//}

function login($mysqli, $user) {
	$res = $mysqli->query("SELECT * FROM ukrabobus_db.passangers WHERE `e-mail` = '$user->email'") or die(mysqli_error($mysqli));
	if (mysqli_num_rows($res) != 0) {
		//echo 'ok';
		foreach($res as $queryuser) {
			//echo "{$queryuser['password']} {$user->password}";
			if($queryuser["password"] !== $user->password) {
				return "Incorrect input or user does not exist";
			} else {
				//$user->name = $queryuser["name"];
				//$user->surname = $queryuser["sname"];
				$arr = [];
				$arr['name'] = $queryuser["name"];
				$arr['sname'] = $queryuser["sname"];
				$arr['email'] = $queryuser["e-mail"];
				$arr['password'] = $queryuser["password"];
				$_SESSION["user"] = $arr;
				header("location:index.php");
				return '';
			}
		}
	} else {
		return "Incorrect input or user does not exist";
	}
}

class User {
	public $name = '';
	public $surname = '';
	public $email = '';
	public $password = '';

	public function __construct($email, $password) {
		$this->email = $email;
		$this->password = $password;
	}
}