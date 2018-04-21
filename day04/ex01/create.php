<?php

if ($_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== "OK")
{
	echo "ERROR\n";
	return;
}

if (file_exists("../private") == FALSE)
	mkdir("../private");

if (file_exists("../private/passwd") == FALSE)
	file_put_contents("../private/passwd", NULL);

$accounts = unserialize(file_get_contents("../private/passwd"));
foreach ($accounts as $user)
{
	if ($user["login"] === $_POST["login"])
	{
		echo "ERROR\n";
		return;
	}
}

$new_user["login"] = $_POST["login"];
$new_user["passwd"] = hash("whirlpool", $_POST["passwd"]);
$accounts[] = $new_user;
file_put_contents("../private/passwd", serialize($accounts));
echo "OK\n";
?>