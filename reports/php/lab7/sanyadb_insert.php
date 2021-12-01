<?php
$connection = new mysqli("localhost:3306", "root", "", "web_audio");

$connection->query("INSERT INTO authors VALUES
(1, 'Artem', 'M.', 'artem_x', '+88005553535', 'id5553535'),
(2, 'Stanislav', 'O.', 'great_stas', '+3806745453', 'id3423546'),
(3, 'Denys', 'B.', 'cde_user_xexexe', '3809856468', 'id5747956');");

$connection->query("INSERT INTO users VALUES
(1, 'niceuser@gmail.com', 'gfhdn4rfgs754bg', 'user_oleh', '88005553535');");

$connection->query("INSERT INTO playlists VALUES
(1, 'My playlist #1', NULL, NULL, 1),
(2, 'My playlist #2', NULL, NULL, 1);");

$connection->query("INSERT INTO songs VALUES
(1, 'Song 1', NULL, NULL, 'g4hj3f42hgk6kge', 1),
(2, 'Song 2', 'a beautiful song from artem', NULL, 'dsfhsjdklhfjak4', 1),
(3, 'Song 3', 'Another beautiful song from Artem', NULL, 'gsfwr34sdgfd', 1),
(4, 'Аудіо номер 1', 'Пісня від Стаса', NULL, 'cbffsdh4354', 2),
(5, 'Пісня', NULL, NULL, 'fsgsg5fgfsd', 3)");

$connection->query("INSERT INTO albums VALUES
(1, 'Artem''s album', 'A cool album', 'fgfdgfdhgh53hd', 1);");

$connection->query("INSERT INTO playlist_songs VALUES
(1, 1, 1, '2021-12-01 00:00:00'),
(2, 2, 1, '2021-12-01 00:00:00'),
(5, 2, 1, '2021-12-01 00:00:00'),
(6, 3, 2, '2021-12-01 00:00:00'),
(7, 3, 1, '2021-12-01 00:00:00'),
(8, 5, 1, '2021-12-01 00:00:00');");

$connection->query("INSERT INTO album_songs VALUES
(1, 1, 1),
(3, 2, 1),
(4, 3, 1);");

echo 'Дані успішно додано до БД<br>';
?>