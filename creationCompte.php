<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	//require "php/Client.php";

	//YL - NOTE $_POST["mail"] mail correspond au nom du champ du formulaire
	$mail = ISSET($_POST["mail"]) ? $_POST["mail"] : ""; 
	$username = ISSET($_POST["username"]) ? $_POST["username"] : ""; 
	$password = ISSET($_POST["password"]) ? $_POST["password"] : "";
	$passwordConfirm = ISSET($_POST["passwordConfirm"]) ? $_POST["passwordConfirm"] : "";
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
			
	#Envoi du formulaire
	if(ISSET($_POST["btnValider"])){
		if ($password == $hashPassword){
			//$client = new Client();
			verifierIdentifiant($username, $hashPassword);
		}
		else {
			 //TO DO message erreur, le mot de passe est différent.
		}
	}

?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Créer un compte</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">  
		<link rel="stylesheet" type="text/css" href="css/card.css"/>		
	</head>
	
	
	
	<body>
	<div class="card" style="width: 18rem;">
		<form method="post">
			<div class="form-group">
				<label for="inputMail">E-mail</label>
				<input type="email" name="mail" class="form-control" id="inputMail" size="30" placeholder="Enter your e-mail adress" required>
			</div>
			<div class="form-group">
				<label for="inputUsernameConnexion">Username</label>
				<input type="username" name="username" class="form-control" id="inputUsernameConnexion" placeholder="Enter your username" required>
			</div>
			<div class="form-group">
				<label for="inputPasswordConnexion">Password</label>
				<input type="password" name="password" class="form-control" id="inputPasswordConnexion" placeholder="Enter your password" required>
			</div>
			<div class="form-group">
				<label for="inputPasswordConnexionConfirm">Confirmation password</label>
				<input type="password" name="passwordConfirm" class="form-control" id="inputPasswordConnexionConfirm" placeholder="Enter your password again" required>
			</div>
			
			<button type="submit" class="btn btn-primary" name="btnValider">Submit</button>		
		</form>
	</body>
</html>