<?php

function admin_get_products() {
	if (file_exists("./data") && file_exists("./data/products")) {
		$products = unserialize(file_get_contents("./data/products"));
		if (isset($products["0"]) === TRUE) {
			foreach ($products as $id => $product) {
				echo "<option value='".$product["name"]."'>".$product["name"]."</option>\n";
			}
		} else {
			echo "<option value='none'>No avalible products</option>\n";
		}
	} else {
		echo "<option value='none'>No avalible products</option>\n";
	}
}
?>