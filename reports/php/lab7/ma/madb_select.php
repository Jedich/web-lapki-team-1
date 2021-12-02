<?php
$connection = new mysqli("localhost:3306", "root", "", "web");
$query = "SELECT  id, name FROM seller;";
$sellers = $connection->query($query);
foreach ($sellers as $seller) {
	echo 'Seller: ' . $seller["name"] . '. Sold:<ul>';

	$query2 = "SELECT p.name, p.count  FROM sale s, product p
               WHERE ". $seller['id'] . "= s.seller_id AND s.product_id = p.id;";
	$products = $connection->query($query2);
	foreach ($products as $product) {

		echo '<li> ' . $product["name"] . " - " . $product["count"] . '</li>';
	}
	echo '</ul>';
}
?>