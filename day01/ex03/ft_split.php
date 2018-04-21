#!/usr/bin/php
<?PHP

function is_true_but_not_zero($value)
{
	return (is_numeric($value) || $value);
}

function ft_split($str)
{
	$result = array_filter(explode(' ', $str), "is_true_but_not_zero");
	sort($result);
	return ($result);
}

?>