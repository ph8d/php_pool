<?php

function admin_get_categories() {
	if (file_exists("./data") && file_exists("./data/categories")) {
		$categories = unserialize(file_get_contents("./data/categories"));
		if (isset($categories["0"]) === TRUE) {
			foreach ($categories as $id => $category) {
				echo "<option value='".$category["name"]."'>".$category["name"]."</option>\n";
			}
		} else {
			echo "<option value='none'>No avalible categories</option>\n";
		}
	} else {
		echo "<option value='none'>No avalible categories</option>\n";
	}
}

function header_get_categories() {
	if (file_exists("./data") && file_exists("./data/categories")) {
		$categories = unserialize(file_get_contents("./data/categories"));
		if (isset($categories["0"]) === TRUE) {
			foreach ($categories as $id => $category) {
				echo "<a href='index.php?display=".$category["name"]."'> <button>".$category["name"]."</button> </a>\n";
			}
		} else {
			echo "<a href='index.php?display=none'> <button>No avalible categories</button> </a>\n";
		}
	} else {
		echo "<a href='index.php?display=none'> <button>No avalible categories</button> </a>\n";
	}
}

?>