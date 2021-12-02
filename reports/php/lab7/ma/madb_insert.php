<?php
$connection = new mysqli("localhost:3306", "root", "", "web");

$connection->query("INSERT INTO seller VALUES
(1, 'Danik'),
(2, 'Mortis');");

$connection->query("INSERT INTO product VALUES
(1, 'motherboard', 12),
(2, 'keyboard', 6),
(3, 'RAM', 24),
(4, 'CPU', 5);");



if (!$connection->query("INSERT INTO sale VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 2, 1),
(4, 4, 2, 1),
(5, 3, 2, 2);")) {
    printf("Error: %s\n", $connection->error);
}

echo 'Дані успішно додано до БД<br>';
?>