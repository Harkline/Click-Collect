<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$btnValider = ISSET($_POST["btnValider"]) ? $_POST["btnValider"] : "null"; 


include "./html/barreDeNavigation.html";

if(ISSET($_POST["btnSeConnecter"])){
	include "./php/scriptConnexion.php";
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