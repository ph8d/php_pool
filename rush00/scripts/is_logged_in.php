<?php

function is_logged_in() {
	session_start();

	if (!$_SESSION || $_SESSION["loggued_on_user"] === "") {
			echo "<a href='sign-in.php'><button class='btn-top-right' type='submit'>SIGN IN</button></a>\n";
	} else {
		echo "<a href='scripts/logout.php'><button class='btn-top-right' type='submit'>SIGN OUT</button></a>\n";
	}
}

?>