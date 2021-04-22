<?php
session_start();
error_reporting(E_ALL);
include "./html/barreDeNavigation.html";

//Si on est déjà connecté, pas besoin de se connecter => exit
if ($_SESSION["identifiant"]){
	//Ici, appel au script de connexion, qui lance la session
	//session_start();
	//test push git to resolve anonymous push

	require_once "php/connectionbdd.php";
	require_once "php/Client.php";
		
	//Inclusion de la barre de navigation Bootstrap
	$username = ISSET($_POST["username"]) ? $_POST["username"] : "null"; 
	$password = ISSET($_POST["password"]) ? $_POST["password"] : "null"; 
	$btnSeConnecter = isset($_POST["btnSeConnecter"]) ? $_POST["btnSeConnecter"] : ""; 

	$client = new Client($bdd);

	if ($username and $password){
		if ($client->verifierIdentifiant($username, $password)){
			$_SESSION['identifiant'] = $username;
		}
		else {
		}
	}
}
?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">    
		<link rel="stylesheet" type="text/css" href="css/card.css"/>
	</head>
	<body>
	
	

	
		<form method="post">
			<div class="card" style="width: 18rem;">
				<div class="form-group">
					<label for="inputUsernameConnexion">Nom d'utilisateur</label>
					<input type="username" name="username" class="form-control" id="inputUsernameConnexion" placeholder="Veuillez saisir votre nom d'utilisateur">
				</div>
				<div class="form-group">
					<label for="inputPasswordConnexion">Mot de passe</label>
					<input type="password" name="password" class="form-control" id="inputPasswordConnexion" placeholder="Veuillez saisir votre mot de passe">
				</div>
				<button type="submit" class="btn btn-primary" name="btnSeConnecter">Se connecter</button>
			</div>
		</form>
		
		
		
	
	</body>
</html>