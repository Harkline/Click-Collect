<?php
error_reporting(E_ALL);
?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Créer un compte</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">    
	</head>
	
	
	
	<body>
	<div class="card" style="width: 18rem;">
		<form>
			
			<div class="form-group">
				<label for="inputMail">E-mail</label>
				<input type="email" class="form-control" id="inputMail" size="30" placeholder="Enter your e-mail adress" required>
			</div>
			<div class="form-group">
				<label for="inputUsernameConnexion">Username</label>
				<input type="username" class="form-control" id="inputUsernameConnexion" placeholder="Enter your username" required>
			</div>
			<div class="form-group">
				<label for="inputPasswordConnexion">Password</label>
				<input type="password" class="form-control" id="inputPasswordConnexion" placeholder="Enter your password" required>
			</div>
			<div class="form-group">
				<label for="inputPasswordConnexionConfirm">Confirmation password</label>
				<input type="password" class="form-control" id="inputPasswordConnexionConfirm" placeholder="Enter your password again" required>
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		
			
		</form>
		
		
		
	
	</body>
</html>