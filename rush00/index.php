<?php

session_start();
include "scripts/display_avalible_products.php";

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>

	<body>
		<?php include("header.php"); ?>

		<div class="main">
			<?php display_avalible_products($_GET["display"]); ?>
		</div>
	</body>
</html>