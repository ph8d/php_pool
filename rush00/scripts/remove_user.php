<?php

session_start();

function remove_user($login) {
	if (file_exists("../private") === TRUE && file_exists("../private/passwd") === TRUE) {
		$login = trim($login);
		$users = unserialize(file_get_contents("../private/passwd"));
		foreach ($users as $id => $user) {
			if ($user["login"] === $login) {
				$id_to_remove = $id;
				break;
			}
		}
		if (isset($id_to_remove) === TRUE) {
			unset($users[$id_to_remove]);
			$users = array_values($users);
			file_put_contents("../private/passwd", serialize($users));
			header("Location: ../admin_panel.php?msg=user_removed");
		} else {
			header("Location: ../admin_panel.php?error=user_not_found");
		}
	}	
}

if ($_SESSION["loggued_on_user"] !== "admin") {
	header("Location: ../index.php?access_denied");
} else if (isset($_POST["user"]) === TRUE && isset($_POST["remove"]) === TRUE && $_POST["remove"] === "OK") {
	remove_user($_POST["user"]);
}

?>