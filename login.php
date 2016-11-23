<?php
require_once('sesion.php');
//requesting sesion for remembering loged users...
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css.css">
<meta name="title" content="Diwanee Login">
<meta name="description" content="Diwanee - Login">
<meta name="keywords" content="Diwanee Login">
<title>Diwanee Login</title>
</head>

<body>
	<div class="header">
		Diwanee
	</div>
	<div class="content">
		<div class="choice">
			Login form
			<br><br>
			<form action="home.php" method="post">
				<input type="hidden" name="action" value="login" readonly>
				<label for="username">Username</label>
				<br>
				<input type="text" name="username" class="input" placeholder="Enter Username">
				<br><br>
				<label for="password">Password</label>
				<br>
				<input type="password" name="password" class="input" placeholder="Enter Password">
				<br><br>
				<br>
				<input type="submit" name="submit" value="Login" class="button">
			</form>
		</div>
	</div>
</body>
</html>