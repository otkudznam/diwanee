<?php
require_once('sesion.php');
//requesting sesion for remembering loged users...

require_once('user.php');

$user=new user;

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="images/icon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css.css">
<meta name="title" content="Diwanee - Home">
<meta name="description" content="Diwanee - Home">
<meta name="keywords" content="Diwanee Home">
<title>Diwanee - Home</title>
</head>

<body>
	<div class="header">
		Diwanee
	</div>
	<div class="content">
		<?php
			include_once('menu.php');
		
			if(!empty($_POST)){

				if($_POST['action']=="login") {
					
					$list=$user->userLogin($_POST);
				}

				if($_POST['action']=="register") {

					$list=$user->userRegister($_POST);
				}

				if(isset($_SESSION['user'])){

			 		if($_SESSION['user']!=""){

			 			$list=$user->userList($_SESSION['user']);

						echo '<div class="message">';
						
						if($_POST['action']=="register") {

							echo "You are now registered!";	
						}

						echo '</div><div class="contents">Hello, '.$list[0]['NAME'].' '.$list[0]['LASTNAME'].'!</div>'; 
					}
					else{
						echo '<div class="message">You must be loged in to see this page! Click <a href="index.php">here</a> to log in.</div><div class="contents"></div>';
					}
 				}
 				else {

 					if(empty($list) && $_POST['action']=="login") {
 						
 						echo '<div class="message">Login failed! You must be loged in to see this page! Click <a href="index.php">here</a> to log in.</div><div class="contents"></div>';
 					}

 					if(empty($list) && $_POST['action']=="register") {
 						
 						echo '<div class="message">Registration failed! You must be loged in to see this page! Click <a href="index.php">here</a> to log in.</div><div class="contents"></div>';
 					}
				}
			 	
			}
			else {

				if(isset($_SESSION['user'])){

			 		if($_SESSION['user']==""){

			 			echo '<div class="message">You must be loged in to see this page! Click <a href="index.php">here</a> to log in.</div><div class="contents"></div>';
					}
					else {

						$list=$user->userList($_SESSION['user']);
						echo '<div class="message">';
						echo '</div><div class="contents">Hello, '.$list[0]['NAME'].' '.$list[0]['LASTNAME'].'!</div>';
					}

 				}
 				else {

 					echo '<div class="message">You must be loged in to see this page! Click <a href="index.php">here</a> to log in.</div><div class="contents"></div>';
				}
			}
				
		?>
	</div>
</body>
</html>