#!/usr/bin/php
<?PHP

function is_true_but_not_zero($value)
{
	return (is_numeric($value) || $value);
}

if ($argc == 1)
	return ;

$result = array();

for ($i = 1; $i != $argc; $i++)
{
	$tmp = array_filter(explode(' ', $argv[$i]), "is_true_but_not_zero");
	sort($tmp);
	$result = array_merge($result, $tmp);
}

sort($result);
echo implode("\n", $result)."\n";

?>
