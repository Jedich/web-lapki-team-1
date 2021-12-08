<?php
$mysqli = new mysqli("localhost:3306", "root", "", "train_timetable");

$id_sale= $_POST["id_sale"];
$id_seller= $_POST["id_seller"];
$id_product = $_POST["id_product"];
$count = $_POST["count"];

$len_id_sale = strlen ($id_sale);
$len_id_seller = strlen ($id_seller);
$len_id_product = strlen ($id_product);
$len_count = strlen ($count);

if($len_id_sale >0 & $len_id_seller > 0 & $len_id_product >0 & $len_count > 0)
{
    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
      }
    
    if (!$mysqli -> query("INSERT INTO timetable (id, arrival_time, platform, id_train, id_stop) VALUES (NULL, '$arrival_time', $platform, $id_train, $id_stop)")) {
    if (!$mysqli -> query("INSERT INTO sale VALUES
                           (NULL, $id_sale, $id_seller, 1);")) {
        echo("Error " . $mysqli -> error);
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