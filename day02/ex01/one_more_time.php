#!/usr/bin/php
<?PHP

function month_get($month)
{
	$month = strtolower($month);
	if ($month == "janvier")
		return (1);
	else if ($month == "fevrier")
		return (2);
	else if ($month == "mars")
		return (3);
	else if ($month == "avril")
		return (4);
	else if ($month == "mai")
		return (5);
	else if ($month == "juin")
		return (6); 
	else if ($month == "juillet")
		return (7);
	else if ($month == "aout")
		return (8);
	else if ($month == "septembre")
		return (9);
	else if ($month == "octobre")
		return (10);
	else if ($month == "novembre")
		return (11);
	else if ($month == "decembre")
		return (12);
	else
		return (-1);
}

if ($argc > 1)
{
	if (!preg_match("/(^[Ll]undi|^[Mm]ardi|^[Mm]ercredi|^[Jj]eudi|^[Vv]endredi|^[Ss]amedi|^[Dd]imanche) ([0-9]{2}) ([Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) ([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})$/", $argv[1], $matches))
	{
		echo "Wrong Format\n";
		return;
	}

	date_default_timezone_set("Europe/Kiev");
	echo mktime($matches[5], $matches[6], $matches[7], month_get($matches[3]), $matches[2], $matches[4])."\n";
}
?>