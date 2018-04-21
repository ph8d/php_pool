<?php

function add_product($post) {
	if (file_exists("../data") == FALSE)
	mkdir("../data");

	if (file_exists("../data/products") == FALSE)
		file_put_contents("../data/products", NULL);
	
	$data_base = unserialize(file_get_contents("../data/products"));
	foreach ($data_base as $id => $product) {
		if ($product["name"] === trim($post["name"])) {
			unset($data_base);
			header("Location: ../admin_panel?error=name_already_exists");
		}
	}
	if (isset($data_base)) {
		$new_product["name"] = trim($post["name"]);
		$new_product["description"] = trim($post["description"]);
		$new_product["price"] = intval($post["price"]);
		$new_product["category"] = trim($post["category"]);
		$new_product["pic"] = trim($post["pic"]);
		$data_base[] = $new_product;
		file_put_contents("../data/products", serialize($data_base));
		header("Location: ../admin_panel.php?msg=product_added");
	}
}

function remove_product($product_to_remove) {
	if (file_exists("../data") === TRUE && file_exists("../data/products") === TRUE) {
		$product_to_remove = trim($product_to_remove);
		$products = unserialize(file_get_contents("../data/products"));
		foreach ($products as $id => $product) {
			if ($product["name"] === $product_to_remove) {
				$id_to_remove = $id;
				break;
			}
		}
		if (isset($id_to_remove) === TRUE) {
			unset($products[$id_to_remove]);
			$products = array_values($products);
			file_put_contents("../data/products", serialize($products));
			header("Location: ../admin_panel.php?msg=product_removed");
		} else {
			header("Location: ../admin_panel.php?error=product_not_found");
		}
	}	
}

session_start();

if ($_SESSION["loggued_on_user"] !== "admin") {
	header("Location: ./index.php?access_denied");
} else {
	if (isset($_POST["add"]) === TRUE && $_POST["add"] === "OK") {
		add_product($_POST);
	} else if (isset($_POST["remove"]) === TRUE && $_POST["remove"] === "OK") {
		remove_product($_POST["product"]);
	}
}

?>