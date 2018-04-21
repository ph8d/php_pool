#!/usr/bin/php
<?PHP

function is_true_but_not_zero($value)
{
	return (is_numeric($value) || $value);
}

if ($argc == 1)
	return ;

$array = array_filter(explode(' ', $argv[1]), "is_true_but_not_zero");
$first_word = array_shift($array);
array_push($array, $first_word);
echo implode(' ', $array)."\n";

?>
