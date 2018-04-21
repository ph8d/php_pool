#!/usr/bin/php
<?PHP

function ft_is_sort($tab)
{
	$sorted = $tab;
	$rsorted = $tab;

	sort($sorted);
	rsort($rsorted);

	if ($tab == $sorted || $tab == $rsorted)
		return true;
	else
		return false;
}

?>
