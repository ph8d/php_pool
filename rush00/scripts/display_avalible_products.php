<?php

function display_avalible_products($category_to_display) {

	if (file_exists("./data") && file_exists("./data/products")) {
		$products = unserialize(file_get_contents("./data/products"));
		if (isset($products["0"]) === TRUE) {
			if (isset($category_to_display) === FALSE) {
				$category_to_display = "all";
			}
			foreach ($products as $id => $product) {
				if ($product["category"] === $category_to_display ||  $category_to_display === "all") {
					echo "<div class='product'>\n";
					echo "<img src='img/".$product["pic"]."' alt='img'>\n";
					echo "<h1 class='name'>".$product["name"]."</h1>\n";
					echo "<p class='category'>".$product["category"]."</p>\n";
					echo "<p class='desc'>".$product["description"]."</p>\n";
					echo "<h4 class='price'>".$product["price"]."$</h4>\n";
					echo "<form action='scripts/add_to_cart.php' method='post'>\n";
					echo "<button type='submit' name='product_id' value='".$id."'>Add to cart</button>\n";
					echo "</form>\n";
					echo "</div>\n";
				}
			}
		}
	}
}
?>