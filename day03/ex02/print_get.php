<?php

$variables = $_GET;
foreach($variables as $var => $value)
	echo $var.": ".$value."\n";

?>