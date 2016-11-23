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
<meta name="title" content="Diwanee Register">
<meta name="description" content="Diwanee - Register">
<meta name="keywords" content="Diwanee Register">
<title>Diwanee Register</title>
<script>
	function check() {

		message="";

		if(document.getElementById('username').value.length<4)
			message=message+"Field 'username' must be at list 4 character long<br>";
		if(document.getElementById('password').value.length<8)
			message=message+"Field 'password' must be at list 8 character long<br>";
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	if(!re.test(document.getElementById('mail').value))
    		message=message+"Field 'mail' must be contain valid mail<br>";
    	if(document.getElementById('name').value=="")
 			message=message+"Field 'name' must be contain valid mail<br>";
 		if(document.getElementById('lastname').value=="")
 			message=message+"Field 'lastname' must be contain valid mail<br>";   		

 		if(message=="") {

 			document.getElementById('form').submit();
 		}
 		else {
 			document.getElementById('message').innerHTML=message;
 		}

	}

</script>
</head>

<body>
	<div class="header">
		Diwanee
	</div>
	<div class="content">
		<div class="choice">
			Register form
			<br><br>
			<div class="message" id="message">
			</div>
			<form id="form" action="home.php" method="post">
				<input type="hidden" name="action" value="register" readonly>
				<label for="username">Username</label>
				<br>
				<input type="text" name="username" id="username" class="input" placeholder="Enter Username">
				<br><br>
				<label for="password">Password</label>
				<br>
				<input type="password" name="password" id="password" class="input" placeholder="Enter Password">
				<br><br>
				<label for="mail">E-mail</label>
				<br>
				<input type="text" name="mail" class="input" id="mail" placeholder="Enter Mail">
				<br><br>
				<label for="name">First Name</label>
				<br>
				<input type="text" name="name" class="input" id="name" placeholder="Enter First Name">
				<br><br>
				<label for="lastname">Lastname</label>
				<br>
				<input type="text" name="lastname" class="input" id="lastname" placeholder="Enter Last Name">
				<br><br>
				<br>
				<a href="#" class="abutton" onclick="check()">
					Register
				</a>
			</form>
		</div>
	</div>
</body>
</html>