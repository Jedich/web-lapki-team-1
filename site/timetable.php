<!DOCTYPE html>
<html>
	<head>
		<title>UkrAbobus</title>
		<meta charset="utf-8" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="style.css" />
		<link
			rel="stylesheet"
			href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css"
		/>
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
		<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
		<script src="js/digital_clock.js"></script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">
					<img
						src="logo.svg"
						alt=""
						width="120"
						height="42"
						class="d-inline-block align-text-top"
					/>
					UkrAbobus
				</a>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<a class="nav-item nav-link" style="font-size: 18pt;" href="about.php">Про нас</a>
						<a class="nav-item nav-link active" style="font-size: 18pt;" href="#">Квиток</a>
						<a class="nav-item nav-link" style="font-size: 18pt;" href="archive.php">Архів</a>
						<div class="time"></div>
					</ul>
					
				</div>
			</div>
		</nav>
		<?php
		$letters = "AMNGHETDA";
		$var = substr(str_shuffle($letters), -2)."-".rand(10000, 99999);
		?>
		<div class="main-content" style="font-size:30px; text-align:center">
			Дякуємо за замовлення, <?php echo $_POST["name"] . " " . $_POST["surname"]; ?><br>
			Номер квитка: <?= $var ?><br> Дата: <?php echo $_POST["date"]; ?>
		</div>

		<form action="confirm.php" method="post">
		<?php
$mysqli = new mysqli("localhost:3306", "root", "", "ukrabobus_db");

$trip = $_POST["trip"];
$name= $_POST["name"];
$surname= $_POST["surname"];
$email = $_POST["email"];
$document_type = $_POST["document_type"];
$departure = $_POST["departure"];
$arrival = $_POST["arrival"];
$class_type = $_POST["class_type"];
$numbers_of_passangers = $_POST["numbers_of_passangers"];
$date = $_POST["date"];
$formattedDate = new DateTime($date);
$trip = $_POST["trip"];
echo $date;
$len_name = strlen ($name);
$len_surnae = strlen ($surname);
$len_email = strlen ($email);
$len_date = strlen ($date);

if($len_name>0 & $len_platform > 0 & $len_surname >0 & $len_email > 0 & $len_date > 0 & $departure != $arrival)

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
$sql = "UPDATE timetables SET  date = '{$formattedDate->format(DATE_RFC3339)}' WHERE city_to='$arrival' AND id_transport=".$trip."";
if ($mysqli->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $mysqli->error;
}

?>
		</form>
		
	</body>
</html>
