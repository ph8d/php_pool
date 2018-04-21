<?php

session_start();
if ($_SESSION["loggued_on_user"] !== "admin") {
	header("Location: index.php?access_lox");

}

include "scripts/error_handler.php";
include "scripts/get_products.php";
include "scripts/get_users.php";
include "scripts/manage_products.php";

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/admin_panel.css">
</head>

<body>

	<?php include("header.php"); ?>

	<div class="main">
		<div>
			<form id="form-product" action="scripts/remove_user.php" method="post">
				<?php error_handler($_GET); ?>
				<h1 class="h1-title">Delete users</h1>
				<select id="select-product" name="user" required>
					<?php get_users() ?>
				</select> <br>
				<button id="btn-remove" type="submit" name="remove" value="OK">Remove</button>
			</form>
		</div>
		<div>
			<form action="scripts/manage_categories.php" method="post">
				<h1 class="h1-title">Manage categories</h1>
				<input class="input-text" type="text" name="name" placeholder="Category name" required> <br>
				<button type="submit" name="add" value="OK">Add</button>
				<button id="btn-remove" type="submit" name="remove" value="OK">Remove</button>
			</form>
		</div>
		<div>
			<form id="form-product" action="scripts/manage_products.php" method="post">
				<h1 class="h1-title">Add new product</h1>
				<input class="input-text" type="text" name="name" placeholder="Product name" required> <br>
				<textarea name="description" maxlength="120" rows="10" placeholder="Product description" required></textarea>
				<p class="p-bottom-text-small">Product Price:</p>
				<input class="input-text" min="0" step="0.1" type="number" name="price" placeholder="Product price" required>
				<p class="p-bottom-text-small">Product Category:</p>
				<select name="category" required>
					<?php admin_get_categories() ?>
				</select>
				<p class="p-bottom-text-small">Product picture:</p>
				<input id="in-file" type="file" name="pic" accept="image/*" required> <br>
				<!-- <input id="in-desc" type="text" name="description" placeholder="Product description" required> <br> -->
				<button type="submit" name="add" value="OK">Add</button>
			</form>
		</div>
		<div>
			<form id="form-product" action="scripts/manage_products.php" method="post">
				<h1 class="h1-title">Remove product</h1>
				<select id="select-product" name="product" required>
					<?php admin_get_products() ?>
				</select> <br>
				<button id="btn-remove" type="submit" name="remove" value="OK">Remove</button>
			</form>
		</div>
	</div>
</body>
</html>