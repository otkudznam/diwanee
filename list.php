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
				}
				else{
					echo 'You must be loged in to see this page!  Click <a href="index.php">here</a> to log in.';
				}
			?>
		</div>
		<div class="contents">
			<?php
				if(isset($_SESSION['user'])){

				 	if($_SESSION['user']!=""){
						
						require_once('user.php');

						$user=new user;

						$list=$user->userList();

						$column=array_keys($list[0]);
						
						echo '<div clas="row">';
						
						foreach ($column as $key => $value) {
		
							echo '<div class="column">'.$value.'</div>';
						}

						echo '</div>';
						foreach ($list as $key => $value) {
							
							echo "<div>";
							foreach ($value as $k => $v) {

								echo '<div class="column">'.$v.'</div>';
							}

							echo "</div>";
						}
	
					}
				}
			?>
		</div>
	</div>
</body>
</html>