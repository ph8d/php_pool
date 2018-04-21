<?php

function admin_get_categories() {
	if (file_exists("./data") && file_exists("./data/categories")) {
		$categories = unserialize(file_get_contents("./data/categories"));
		foreach ($categories as $id => $category) {
			echo "<option value='".$category["name"]."'>".$category["name"]."</option>\n";
		}
	} else {
		echo "<option value='none'>No avalible categories</option>\n";
	}
}

?>