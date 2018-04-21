<?php

function auth($login, $passwd)
{
	$passwd = hash("whirlpool", $passwd);
	$accounts = unserialize(file_get_contents("../private/passwd"));
	foreach ($accounts as $user)
	{
		if ($user["login"] == $login && $user["passwd"] == $passwd)
			return TRUE;
	}
	return FALSE;
}

?>