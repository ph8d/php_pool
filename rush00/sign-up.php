<?php session_start(); ?>
<?php include "scripts/error_handler.php"; ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/login-form.css">
</head>

<body>

	<?php include("header.php"); ?>

	<div class="form-main">
		<form action="scripts/create.php" method="post">
			<?php error_handler($_GET); ?>
			<h1 class="h1-title">Sign up</h1>
			<input id="in-login" type="text" name="login" placeholder="Login" autofocus required> <br>
			<input type="password" name="passwd1" placeholder="Password" required> <br>
			<input id="in-pass" type="password" name="passwd2" placeholder="Re-enter password" required> <br>
			<button type="submit" name="submit" value="OK">Create account</button>
			<p class="p-bottom-text-small">Already have an account? <a href="sign-in.php">Sign in!</a></p>
		</form>
	</div>
</body>
</html>