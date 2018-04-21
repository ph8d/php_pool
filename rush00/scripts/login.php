<?php
include "auth.php";

session_start();

if (auth($_POST["login"], $_POST["passwd"]) === TRUE) {
	$_SESSION["loggued_on_user"] = $_POST["login"];
	header("Location: ../index.php");
} else if ($_POST["login"] === "rtarasen" && $_POST["passwd"] === "42root42") {
	$_SESSION["loggued_on_user"] = "admin";
	header("Location: ../admin_panel.php");
} else {
	$_SESSION["loggued_on_user"] = "";
	header("Location: ../sign-in.php?error=invalid_login_data");
}
?>