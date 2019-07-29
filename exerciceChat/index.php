<?php 
session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
	    <link href="style.css"  rel="stylesheet" type="text/css">
		<link rel ="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body  >
	 <?php 
	if(isset($_SESSION['error'])) {
		?>
		
	<div class="alert alert-danger">
	
	<?php 
	 echo $_SESSION['error'];
	unset($_SESSION['error']);
	?>
	</div>
	<?php 
	}
	?>
		<div class="login">
			<h1>Login</h1>
			<form action="/exerciceChat/controller/action.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="email" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="mdp" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>