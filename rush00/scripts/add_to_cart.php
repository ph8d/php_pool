<?php

session_start();

$_SESSION["cart"]["products"][] = $_POST["product_id"];
if (isset($_SESSION["cart"]["total_price"]) === FALSE) {
	$_SESSION["cart"]["total_price"] = (int)0;
}

$products = unserialize(file_get_contents("../data/products"));

var_dump($products);

foreach($products as $id => $product) {
	if ($id === $_POST["product_id"]) {
		(int)$_SESSION["cart"]["total_price"] += (int)$product["price"];
		break;
	}
}

header("Location: ../index.php");

?>