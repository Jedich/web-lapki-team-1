<?php
$connection = new mysqli("localhost:3306", "root", "", "laba7");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $connection -> connect_error;
  exit();
}

if (!$connection->query("INSERT INTO authors VALUES
(1, 'Kurochkin', 'Misha', '8800555353'),
(2, 'Petrovich', 'Oleg',  '3806745453'),
(3, 'Ivanovich', 'Bill', NULL);")) {
    echo("Error description: " . $connection -> error);
}

if (!$connection->query("INSERT INTO employees VALUES
(1, 'Kurochkin', 'Misha', '1111','80555353'),
(2, 'Petrovich', 'Oleg', '2222', '3806908453'),
(3, 'Ivanovich', 'Bill', '3333', NULL);")) {
    echo("Error description: empl " . $connection -> error);
}

if (!$connection->query("INSERT INTO archives VALUES
(1, '2021-01-01', 'landscape', NULL),
(2, '2021-03-01', NULL, NULL);")){
    echo("Error description: archive" . $connection -> error);
}

if (!$connection->query("INSERT INTO photos VALUES
(1, 'Photo 1', '2021-01-06', 1, '.JPEG'),
(2, 'Photo 2', '2021-03-05', 2, '.PNG'),
(3, 'Photo 3', '2021-02-08', 2, '.JPEG'),
(4, 'Photo 4', '2021-02-09', 3, '.JPEG'),
(5, 'Photo 5', '2021-10-10', 3, '.TIFF')")){
    echo("Error description: photo" . $connection -> error);
}

if (!$connection->query("INSERT INTO adding VALUES
(1, 5, 1, 1, '2021-12-01 00:00:00'),
(2, 4, 1, 2, '2021-12-01 00:00:00'),
(3, 3, 1, 2, '2021-12-01 00:00:00'),
(4, 2, 2, 2, '2021-12-01 00:00:00'),
(5, 1, 2, 3, '2021-12-01 00:00:00')")){
    echo("Error description: adding" . $connection -> error);
}
$connection->close();
//echo 'Дані успішно додано до БД<br>';
?>