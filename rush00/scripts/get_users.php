<?php

function get_users() {
	if (file_exists("./private") && file_exists("./private/passwd")) {
		$users = unserialize(file_get_contents("./private/passwd"));
		if (isset($users["0"]) === TRUE) {
			foreach ($users as $id => $user) {
				echo "<option value='".$user["login"]."'>".$user["login"]."</option>\n";
			}
		} else {
			echo "<option value='none'>There is no users</option>\n";
		}
	} else {
		echo "<option value='none'>There is no users</option>\n";
	}
}
?>