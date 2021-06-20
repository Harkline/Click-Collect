<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	
	session_start();
	
	require_once "php/connectionbdd.php";
	require_once "php/Admin.php";

	//YL - NOTE $_POST["mail"] mail correspond au nom du champ du formulaire
	$nomProduit = ISSET($_POST["NomProduit"]) ? $_POST["NomProduit"] : "";
	$prixProduit = ISSET($_POST["PrixProduit"]) ? $_POST["PrixProduit"] : "0";
	$poidProduit = ISSET($_POST["PoidProduit"]) ? $_POST["PoidProduit"] : "0";
	$descriptionProduit = ISSET($_POST["DescriptionProduit"]) ? $_POST["DescriptionProduit"] : "";
	$stockProduit = ISSET($_POST["StockProduit"]) ? $_POST["StockProduit"] : "0";
	
	
	$username = ISSET($_SESSION["username"]) ? $_SESSION["username"] : ""; 
	$password = ISSET($_SESSION["mdp"]) ? $_SESSION["mdp"] : "";
	
			
	#Envoi du formulaire
	if(ISSET($_POST["btnValider"])){	
		$admin = new Admin($bdd);
		$return =$admin->createArticle($username,$password,$nomProduit,$prixProduit,$poidProduit,$descriptionProduit,$stockProduit);
		
		
	}

	
	//Inclusion de la barre de navigation Bootstrap
	
?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Ajouter un produit</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">  
		<link rel="stylesheet" type="text/css" href="css/card.css"/>		
	</head>
	
	
	
	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<?php if(!ISSET($_SESSION['identifiant']) && !ISSET($_SESSION['mdp']) ) { ?>
					<li class="nav-item active">
						<a class="nav-link" href="connexionAdmin.php">Connexion<span class="sr-only"></span></a>
					</li>
					<?php
						}
					?>
					<?php if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) { ?>
					<li class="nav-item">
						<a class="nav-link" href="ajoutArticle.php">Ajouter des produits</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="creationCompteAdmin.php">Créer un utilisateur admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="modificationSuppressionArticlesAdmin.php">Modifier ou supprimer les produits</a>
					</li>
					<?php
						}
					?>
				</ul>

			</div>
		</nav>
		<?php if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) { ?>
	<div class="card" style="width: 25rem;">
		<form method="post">

			<div class="form-group">
				<label for="inputNomProduit">Nom du produit</label>
				<input type="text" name="NomProduit" class="form-control" id="inputNomProduit" placeholder="Veuillez saisir votre nom d'utilisateur" required>
			</div>
			<div class="form-group">
				<label for="inputPrixProduit">Prix</label>
				<input type="number" name="PrixProduit" class="form-control" id="inputPrixProduit" placeholder="Veuillez saisir votre nom d'utilisateur" required>
			</div>
			<div class="form-group">
				<label for="inputPoidProduit">Poid</label>
				<input type="number" name="PoidProduit" class="form-control" id="inputPoidProduit" placeholder="Veuillez saisir votre nom d'utilisateur" required>
			</div>
			<div class="form-group">
				<label for="inputDescriptionProduit">Description</label>
				<input type="text" name="DescriptionProduit" class="form-control" id="inputDescriptionProduit" placeholder="Veuillez saisir votre nom d'utilisateur" required>
			</div>
			<div class="form-group">
				<label for="inputStockProduit">Quantitée en stock</label>
				<input type="number" name="StockProduit" class="form-control" id="inputStockProduit" placeholder="Veuillez saisir votre nom d'utilisateur" required>
			</div>



			
			
			<button type="submit" class="btn btn-primary" name="btnValider">Envoyer</button>		
		</form>
		<?php
						}
					?>
	</body>
</html>
