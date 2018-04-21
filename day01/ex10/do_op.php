#!/usr/bin/php
<?PHP

if ($argc == 4)
{
	$a = trim($argv[1]);
	$b = trim($argv[3]);
	$operation = trim($argv[2]);
	if ($operation == "+")
		echo $a + $b."\n";
	else if ($operation == "-")
		echo $a - $b."\n";
	else if ($operation == "*")
		echo $a * $b."\n";
	else if ($operation == "/")
		echo $a / $b."\n";
	else if ($operation == "%")
		echo $a % $b."\n";
	else
		return;
}
else
	echo "Incorrect Parameters\n";

?>