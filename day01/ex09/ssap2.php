#!/usr/bin/php
<?PHP

function	is_alpha($c)
{
	if ((ord($c) >= 65 && ord($c) <= 90) || (ord($c) >= 97 && ord($c) <= 122))
		return true;
	return false;
}

function	is_true_but_not_zero($value)
{
	return (is_numeric($value) || $value);
}

function	sort_me_pls($s1, $s2)
{
	$a = 0;
	$b = 0;
	$s1 = strtolower($s1);
	$s2 = strtolower($s2);

	$i = 0;
	while ($s1[$i] == $s2[$i] && $s1[$i] && $s2[$i])
		$i++;
	
	if ($s1[$i] == $s2[$i])
		return (0);
	if (is_alpha($s1[$i]))
		$a = 3;
	else if (is_numeric($s1[$i]))
		$a = 2;
	else
		$a = 1;
	if (is_alpha($s2[$i]))
		$b = 3;
	else if (is_numeric($s2[$i]))
		$b = 2;
	else
		$b = 1;
	if ($a == $b)
		return ($s1[$i] > $s2[$i] ? 1 : -1);
	return ($a > $b ? -1 : 1);
}

if ($argc == 1)
	return ;

$result = array();

for ($i = 1; $i != $argc; $i++)
{
	$tmp = array_filter(explode(' ', $argv[$i]), "is_true_but_not_zero");
	$result = array_merge($result, $tmp);
}

usort($result, "sort_me_pls");
echo implode("\n", $result)."\n";

?>
