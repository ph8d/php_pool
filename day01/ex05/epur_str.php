#!/usr/bin/php
<?PHP

function is_true_but_not_zero($value)
{
	return (is_numeric($value) || $value);
}

if ($argc == 1)
	return ;

$result = implode(" ", array_filter(explode(' ', $argv[1]), "is_true_but_not_zero"));

echo $result."\n";

?>
