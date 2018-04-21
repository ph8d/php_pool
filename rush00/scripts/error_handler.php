<?php

function error_handler($get) {

	if (isset($get["error"]) === TRUE) {

		echo "<div class='error-pop-up'>\n";
		if ($get["error"] === "invalid_data") {
			echo "<p>Please, fill the form with valid data!</p>\n";
		} else if ($get["error"] === "invalid_login_data") {
			echo "<p>Login or password is incorrect!</p>\n";
		} else if ($get["error"] === "pswrds_dont_match") {
			echo "<p>Passwords don't match!</p>\n";
		} else if ($get["error"] === "usr_already_exists") {
			echo "<p>User with this login already exists!</p>\n";
		} else if ($get["error"] === "category_already_exists") {
			echo "<p>Category with this name already exists!</p>\n";
		} else if ($get["error"] === "category_not_found") {
			echo "<p>Category not found!</p>\n";
		} else if ($get["error"] === "product_not_found") {
			echo "<p>Product not found!</p>\n";
		} else if ($get["error"] === "user_not_found") {
			echo "<p>User not found!</p>\n";
		}
		echo "</div>\n";
	}
	if (isset($get["msg"]) === TRUE) {

		echo "<div class='msg-pop-up'>\n";
		if ($get["msg"] === "account_created") {
			echo "<p>Account created! You can sign in now!</p>\n";
		} else if ($get["msg"] === "category_added") {
			echo "<p>Category added!</p>\n";
		} else if ($get["msg"] === "product_added") {
			echo "<p>Product added!</p>\n";
		} else if ($get["msg"] === "category_removed") {
			echo "<p>Category removed!</p>\n";
		} else if ($get["msg"] === "product_removed") {
			echo "<p>Product removed!</p>\n";
		} else if ($get["msg"] === "user_removed") {
			echo "<p>User removed!</p>\n";
		}
		echo "</div>\n";
	}
}

?>