<?php

if ($_GET["action"] == "set")
	setcookie($_GET["name"], $_GET["value"], time() + (3600 * 24), "/");
else if ($_GET["action"] == "del")
	setcookie($_GET["name"], $_GET["value"], time() - (3600 * 24), "/");
else if ($_GET["action"] == "get")
{
	if ($_COOKIE)
		echo $_COOKIE[$_GET["name"]]."\n";
}

?>