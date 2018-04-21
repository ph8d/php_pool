<?php

if ($_POST["login"] === "" || $_POST["passwd1"] === "" || $_POST["passwd2"] === "" || $_POST["submit"] !== "OK") {
	header("Location: ../sign-up.php?error=invalid_data");
} else {
	if (file_exists("../private") == FALSE)
	mkdir("../private");

	if (file_exists("../private/passwd") == FALSE)
		file_put_contents("../private/passwd", NULL);

	$login = trim($_POST["login"]);
	
	if ($_POST["passwd1"] === $_POST["passwd2"]) {
		$accounts = unserialize(file_get_contents("../private/passwd"));
		foreach ($accounts as $user) {
			if ($user["login"] === $login || $user["login"] === "admin") {
				unset($accounts);
				header("Location: ../sign-up.php?error=usr_already_exists");
			}
		}
		if (isset($accounts)) {
			$new_user["login"] = $login;
			$new_user["passwd"] = hash("whirlpool", $_POST["passwd1"]);
			$accounts[] = $new_user;
			file_put_contents("../private/passwd", serialize($accounts));
			header("Location: ../sign-in.php?msg=account_created");
		}
	} else {
		header("Location: ../sign-up.php?error=pswrds_dont_match");
	}
}
?>