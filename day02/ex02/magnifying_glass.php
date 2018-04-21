#!/usr/bin/php
<?PHP

function	other_to_upper($array)
{
	return (strtoupper($array[0]));
}

function	title_to_upper($array)
{
	return("title=".strtoupper($array[1]));
}

function	deeper($array)
{
	$str = preg_replace_callback("/title=(\".*\")/", "title_to_upper", $array[0]);
	$str = preg_replace_callback("/>(.*?)</", "other_to_upper", $str);
	return($str);
}

if ($argc > 1)
{
	$file = fopen($argv[1], "r");
	if ($file == NULL)
		return;
	while ($line = fgets($file))
		echo preg_replace_callback("/<a.*a>/", "deeper", $line);
	echo "\n";
}

?>