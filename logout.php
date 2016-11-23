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
		?>
		<div class="message">
			<?php
				if(isset($_SESSION['user'])){

				 	if($_SESSION['user']==""){
					
						echo 'You must be loged in to see this page!  Click <a href="index.php">here</a> to log in.';
					}
					else{

						unset($_SESSION['user']);
						echo 'You are logged out. Click <a href="index.php">here</a> to redirect on home page.';
					}
				}
				else{
					
					echo 'You must be loged in to see this page!  Click <a href="index.php">here</a> to log in.';
				}
				
			?>
		</div>
	</div>
</body>
</html>