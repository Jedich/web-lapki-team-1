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

		<form action="confirm.php" method="post">
		<?php
$mysqli = new mysqli("localhost:3306", "root", "", "ukrabobus_db");

$trip = $_POST["trip"];
$name= $_POST["name"];
$surname= $_POST["surname"];
$email = $_POST["email"];
$document = $_POST["document_type"];
$departure = $_POST["departure"];
$arrival = $_POST["arrival"];
$class_type = $_POST["class_type"];
$numbers_of_passangers = $_POST["numbers_of_passangers"];
$date = $_POST["date"];
$formattedDate = new DateTime($date);
$trip = $_POST["trip"];

if($document=="Дорослий"){
    $document_type = 1;
}elseif($document=="Студентський"){
    $document_type = 3;
}elseif($document=="Дитячий"){
    $document_type = 2;
}elseif($document=="Пільговий"){
    $document_type = 4;
}

$len_name = strlen ($name);
$len_surnae = strlen ($surname);
$len_email = strlen ($email);
$len_date = strlen ($date);

if($departure == $arrival) {
	echo "Ви обрали два однакових міста";
}

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
$sql = "UPDATE timetables SET  date = '{$formattedDate->format(DATE_RFC3339)}' WHERE city_to='$arrival' AND id_transport=".$trip."";

if (!$mysqli->query("INSERT INTO passangers(name, sname, email) VALUES
('$name', '$surname', '$email');")){
echo("Error description:" . $mysqli -> error);
}

if (!$mysqli->query("INSERT INTO tickets(id_passanger, number_of_passangers, id_type, id_document) VALUES
({$mysqli->insert_id}, $numbers_of_passangers, $class_type, $document_type);")){
echo("Error description:" . $mysqli -> error);
}
echo 'Поточний розклад на '.$date.' з міста '.$departure.' до міста '.$arrival.'<br>';
if($departure != $arrival)
{
  if ($mysqli -> connect_errno) {
             echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
             exit();
           }

      $query = "SELECT id FROM transports WHERE id_transport_type = ".$trip."";
         $transports = $mysqli->query($query);
         foreach ($transports as $row) {
            $query2 = "SELECT * FROM timetables WHERE id_transport = ". $row["id"]." AND city_from ='$departure' AND city_to ='$arrival'";
             $timetables = $mysqli->query($query2);
               foreach ($timetables as $timetable) {

          ?>
		  	  <input type="hidden" name="name" value="<?php echo $name ?>">
			  <input type="hidden" name="sname" value="<?php echo $sname ?>">
			  <input type="hidden" name="numbers_of_passangers" value="<?php echo $numbers_of_passangers ?>">
			  <input type="hidden" name="class_type" value="<?php echo $class_type ?>">
			  <input type="hidden" name="document_type" value="<?php echo $document_type ?>">
			  <input type="hidden" name="date" value="<?php echo $date ?>">
              <input type="radio" name="ticket" id="<?php echo $value?>" value = "<?php echo $value?>">
              <?php
                echo "Час відправлення ". $timetable["departure_time"]. ". Час прибуття ". $timetable["arrival_time"]. "Кількість місць: ".$row["number_of_places"]."<br>";
            $value += 1;
          }

         }
      }
?>
<input type="submit" value="Підтвердити" class="btn btn-success"/>
		</form>
		
	</body>
</html>
