<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	session_start();
	
	require_once "php/connectionbdd.php";
	require_once "php/Admin.php";

	//YL - NOTE $_POST["mail"] mail correspond au nom du champ du formulaire
	$mail = ISSET($_POST["mail"]) ? $_POST["mail"] : ""; 
	$username = ISSET($_POST["username"]) ? $_POST["username"] : ""; 
	$password = ISSET($_POST["password"]) ? $_POST["password"] : "";
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
			
	#Envoi du formulaire
	if(ISSET($_POST["btnValider"])){	
		$admin = new Admin($bdd);
		$admin->createAdmin($username, $hashPassword);
			
		
	}

	
	//Inclusion de la barre de navigation Bootstrap
	
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item active">
						<a class="nav-link" href="connexionAdmin.php">Connexion<span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="produits.php">Ajouter des produits</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="creationCompteAdmin.php">Créer un utilisateur admin</a>
					</li>
				</ul>

			</div>
		</nav>
	<div class="card" style="width: 25rem;">
		<form method="post">

			<div class="form-group">
				<label for="inputUsernameConnexion">Nom d'utilisateur</label>
				<input type="username" name="username" class="form-control" id="inputUsernameConnexion" placeholder="Veuillez saisir votre nom d'utilisateur" required>
			</div>
			<div class="form-group">
				<label for="inputPasswordConnexion">Mot de passe</label>
				<input type="password" name="password" class="form-control" id="inputPasswordConnexion" placeholder="Veuillez saisir votre mot de passe" required>
			</div>

			
			
			<button type="submit" class="btn btn-primary" name="btnValider">Envoyer</button>		
		</form>
	</body>
</html>
