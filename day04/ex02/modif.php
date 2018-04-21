<?php

if ($_POST["login"] !== "" && $_POST["newpw"] !== "" && $_POST["oldpw"] !== "" && $_POST["submit"] === "OK")
{
	$accounts = unserialize(file_get_contents("../private/passwd"));
	foreach ($accounts as $i => $user)
	{
		$oldpw = hash("whirlpool", $_POST["oldpw"]);
		$newpw = hash("whirlpool", $_POST["newpw"]);
		if ($user["login"] === $_POST["login"])
		{
			if ($user["passwd"] === $oldpw && $user["passwd"] !== $newpw)
			{
				$accounts[$i]["passwd"] = $newpw;
				file_put_contents("../private/passwd", serialize($accounts));
				echo "OK\n";
				return;
			}
		}
	}
}
echo "ERROR\n";
?>