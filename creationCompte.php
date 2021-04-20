<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require_once "php/connectionbdd.php";
	require_once "php/Client.php";

	//YL - NOTE $_POST["mail"] mail correspond au nom du champ du formulaire
	$mail = ISSET($_POST["mail"]) ? $_POST["mail"] : ""; 
	$username = ISSET($_POST["username"]) ? $_POST["username"] : ""; 
	$password = ISSET($_POST["password"]) ? $_POST["password"] : "";
	$passwordConfirm = ISSET($_POST["passwordConfirm"]) ? $_POST["passwordConfirm"] : "";
	$hashPassword = password_hash($password, PASSWORD_DEFAULT);
	$customerName = ISSET($_POST["customerName"]) ? $_POST["customerName"] : "";
	$customerLastName = ISSET($_POST["customerLastName"]) ? $_POST["customerLastName"] : "";
	$adress = ISSET($_POST["adress"]) ? $_POST["adress"] : "";
	$phoneNumber = ISSET($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : "";		
			
	#Envoi du formulaire
	if(ISSET($_POST["btnValider"])){
		if ($password == $passwordConfirm){
			
			$client = new Client($bdd);
			$client->createClient($username, $hashPassword, $customerLastName,$customerName,$adress, $phoneNumber,$mail); //$identifiant,$MDP,$nomclient,$prenomclient,$adresseclient,$telephoneclient,$emailclient
			//$client->verifierIdentifiant($username, $hashPassword);
			
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
	<div class="card" style="width: 25rem;">
		<form method="post">
			<div class="form-group">
				<label for="inputMail">E-mail</label>
				<input type="email" name="mail" class="form-control" id="inputMail" size="30" placeholder="Veuillez saisir votre adresse mail" required>
			</div>
			<div class="form-group">
				<label for="inputUsernameConnexion">Nom d'utilisateur</label>
				<input type="username" name="username" class="form-control" id="inputUsernameConnexion" placeholder="Veuillez saisir votre nom d'utilisateur" required>
			</div>
			<div class="form-group">
				<label for="inputPasswordConnexion">Mot de passe</label>
				<input type="password" name="password" class="form-control" id="inputPasswordConnexion" placeholder="Veuillez saisir votre mot de passe" required>
			</div>
			<div class="form-group">
				<label for="inputPasswordConnexionConfirm">Confirmer votre mot de passse</label>
				<input type="password" name="passwordConfirm" class="form-control" id="inputPasswordConnexionConfirm" placeholder="Veuillez saisir à nouveau votre mot de passe" required>
			</div>
			
			<div class="form-group">
				<label for="inputPrenomClient">Prénom</label>
				<input type="customerName" name="customerName" class="form-control" id="inputCustomerName" placeholder="Veuillez saisir votre prénom">
			</div>
			<div class="form-group">
				<label for="inputNomClient">Nom de famille</label>
				<input type="customerLastName" name="customerLastName" class="form-control" id="inputCustomerLastName" placeholder="Veuillez saisir votre nom de famille">
			</div>
			<div class="form-group">
				<label for="inputNomClient">Adress</label>
				<input type="adress" name="adress" class="form-control" id="inputAdress" placeholder="Veuillez saisir l'adresse de votre lieu de résidence">
			</div>
			<div class="form-group">
				<label for="inputNomClient">Téléphone</label>
				<input type="phoneNumber" name="phoneNumber" class="form-control" id="inputPhoneNumber" placeholder="Veuillez saisir votre numéro de téléphone">
			</div>
			
			
			<button type="submit" class="btn btn-primary" name="btnValider">Submit</button>		
		</form>
	</body>
</html>
