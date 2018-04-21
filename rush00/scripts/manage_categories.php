<?php

session_start();

function add_category($recived_name) {
	if (file_exists("../data") === FALSE)
	mkdir("../data");

	if (file_exists("../data/categories") === FALSE)
		file_put_contents("../data/categories", NULL);
	
	$recived_name = trim($recived_name);
	$categories = unserialize(file_get_contents("../data/categories"));
	foreach ($categories as $category) {
		if ($category["name"] === $recived_name) {
			unset($categories);
			header("Location: ../admin_panel.php?error=category_already_exists");
		}
	}
	if (isset($categories) === TRUE) {
		$new_category["name"] = $recived_name;
		$categories[] = $new_category;
		file_put_contents("../data/categories", serialize($categories));
		header("Location: ../admin_panel.php?msg=category_added");
	}
}

function remove_category($recived_name) {
	if (file_exists("../data") === TRUE && file_exists("../data/categories") === TRUE) {
		$recived_name = trim($recived_name);
		$categories = unserialize(file_get_contents("../data/categories"));
		foreach ($categories as $id => $category) {
			if ($category["name"] === $recived_name) {
				$id_to_remove = $id;
				break;
			}
		}
		if (isset($id_to_remove) === TRUE) {
			unset($categories[$id_to_remove]);
			$categories = array_values($categories);
			file_put_contents("../data/categories", serialize($categories));
			header("Location: ../admin_panel.php?msg=category_removed");
		} else {
			header("Location: ../admin_panel.php?error=category_not_found");
		}
	}
}

if ($_SESSION["loggued_on_user"] !== "admin") {
	header("Location: ./index.php?access_denied");
} else {
	if (isset($_POST["add"]) === TRUE && $_POST["add"] === "OK") {
		add_category($_POST["name"]);
	} else if (isset($_POST["remove"]) === TRUE && $_POST["remove"] === "OK") {
		remove_category($_POST["name"]);
	}
}
?>