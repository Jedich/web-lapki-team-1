<?php
$mysqli = new mysqli("localhost:3306", "root", "", "train_timetable");

$arrival_time= $_POST["arrival_time"];
$platform= $_POST["platform"];
$id_train = $_POST["id_train"];
$id_stop = $_POST["id_stop"];

$len_arrival_time = strlen ($arrival_time);
$len_platform = strlen ($platform);
$len_id_train = strlen ($id_train);
$len_id_stop = strlen ($id_stop);

if($len_arrival_time >0 & $len_platform > 0 & $len_id_train >0 & $len_id_stop > 0)
{
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
      }
    
    if (!$mysqli -> query("INSERT INTO timetable (id, arrival_time, platform, id_train, id_stop) VALUES (NULL, '$arrival_time', $platform, $id_train, $id_stop)")) {
        echo("Error blyat " . $mysqli -> error);
    }
}

echo "Данi про розклад потягу ", $id_train, " успішно оновлені у базі даних<br>";

$query = "SELECT arrival_time, platform, id_train, id_stop FROM timetable WHERE id_train = ". $id_train;
$timetable = $mysqli->query($query);
echo 'Поточний розклад потягу '. $id_train, '<br>';
foreach ($timetable as $row) {
    $query2 = "SELECT * FROM stops WHERE id = ". $row["id_stop"];
    $stops = $mysqli->query($query2);
    foreach ($stops as $stop) {
        echo '<ul>Місто: '. $stop["city"]. '<li>Час прибуття '. $row["arrival_time"]. '</li> <li>Платформа: '. $row["platform"]. '</li> <li>Тривалість зупинки: '. $stop["stop_time"]. '</li></ul><br>';
    }
    
}
?>