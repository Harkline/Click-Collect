<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	
	session_start();
	
	require_once "php/connectionbdd.php";
	require_once "php/Admin.php";
	require_once "php/Produit.php";

	//YL - NOTE $_POST["mail"] mail correspond au nom du champ du formulaire
	//$nomProduit = ISSET($_POST["NomProduit"]) ? $_POST["NomProduit"] : "";
	//$prixProduit = ISSET($_POST["PrixProduit"]) ? $_POST["PrixProduit"] : "0";
	//$poidProduit = ISSET($_POST["PoidProduit"]) ? $_POST["PoidProduit"] : "0";
	//$descriptionProduit = ISSET($_POST["DescriptionProduit"]) ? $_POST["DescriptionProduit"] : "";
	//$stockProduit = ISSET($_POST["StockProduit"]) ? $_POST["StockProduit"] : "0";
	
	
	//$username = ISSET($_SESSION["username"]) ? $_SESSION["username"] : ""; 
	//$password = ISSET($_SESSION["mdp"]) ? $_SESSION["mdp"] : "";
	$produitObj = new Produit($bdd);
	$tabProduits=$produitObj->getAllProducts();
			
	#Envoi du formulaire
	
	if(ISSET($_POST["btnSupprimerProduit"])){	
		$admin = new Admin($bdd);
		$username = ISSET($_SESSION["username"]) ? $_SESSION["username"] : ""; 
		$password = ISSET($_SESSION["mdp"]) ? $_SESSION["mdp"] : "";
		$idProduit = ISSET($_POST["IdProduit"]) ? $_POST["IdProduit"] : "";                             
		$return =$admin->deleteArticle($username,$password,$idProduit);
		
		//reload de la page
		$page = $_SERVER['PHP_SELF'];
		$sec = "1";
		header("Refresh: $sec; url=$page");
	};
	if(ISSET($_POST["btnModifierProduit"])){	
		$admin = new Admin($bdd);
		$idProduit = ISSET($_POST["IdProduit"]) ? $_POST["IdProduit"] : "";
		$nomProduit = ISSET($_POST["NomProduit"]) ? $_POST["NomProduit"] : "";
		$prixProduit = ISSET($_POST["PrixProduit"]) ? $_POST["PrixProduit"] : "0";
		$poidProduit = ISSET($_POST["PoidProduit"]) ? $_POST["PoidProduit"] : "0";
		$descriptionProduit = ISSET($_POST["DescriptionProduit"]) ? $_POST["DescriptionProduit"] : "";
		$stockProduit = ISSET($_POST["StockProduit"]) ? $_POST["StockProduit"] : "0";
		
		
		$username = ISSET($_SESSION["username"]) ? $_SESSION["username"] : ""; 
		$password = ISSET($_SESSION["mdp"]) ? $_SESSION["mdp"] : "";
		                             
		$return =$admin->updateArticle($username,$password,$idProduit,$nomProduit,$prixProduit,$poidProduit,$descriptionProduit,$stockProduit);
		
		//reload de la page
		$page = $_SERVER['PHP_SELF'];
		$sec = "1";
		header("Refresh: $sec; url=$page");
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
		<?php if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) {
					
					echo("<ul>");
					foreach ($tabProduits as $produit){
						
						//On récupère les caractéristiques du produit
						$idProduit = $produit["id_produit"];
						$nomProduit = $produit["nom_produit"];
						$prixProduit = $produit["prix_produit"];
						$poidProduit = $produit["poid_produit"];
						$descriptionProduit = $produit["description_produit"];
						$stockProduit = $produit["stock_produit"];
						
						//Si aucune des caractéristique produit n'est null
						//On affiche le produit dans une card
						
						echo ("	
						
						<li>
						<form method='post'>
							<div class='form-group'>
								<label for='inputIdProduit'>Id du produit : </label>
								<input type='number' name='IdProduit' class='form-control' id='inputIdProduit' placeholder='Id du produit' value=".$produit["id_produit"]." readonly>
							</div>
							<div class='form-group'>
								<label for='inputNomProduit'>Nom du produit</label>
								<input type='text' name='NomProduit' class='form-control' id='inputNomProduit' placeholder='Nom du produit' value=".$produit["nom_produit"]." required>
							</div>
							<div class='form-group'>
								<label for='inputPrixProduit'>Prix</label>
								<input type='number' name='PrixProduit' class='form-control' id='inputPrixProduit' value=".$produit["prix_produit"]." placeholder='Veuillez saisir votre nom d'utilisateur' required>
							</div>
							<div class='form-group'>
								<label for='inputPoidProduit'>Poid</label>
								<input type='number' name='PoidProduit' class='form-control' id='inputPoidProduit' value=".$produit["poid_produit"]." placeholder='Veuillez saisir votre nom d'utilisateur' required>
							</div>
							<div class='form-group'>
								<label for='inputDescriptionProduit'>Description</label>
								<input type='text' name='DescriptionProduit' class='form-control' id='inputDescriptionProduit' value=".$produit["description_produit"]." placeholder='Veuillez saisir votre nom d'utilisateur' required>
							</div>
							<div class='form-group'>
								<label for='inputStockProduit'>Quantitée en stock</label>
								<input type='number' name='StockProduit' class='form-control' id='inputStockProduit' value=".$produit["stock_produit"]." placeholder='Veuillez saisir votre nom d utilisateur' required>
							</div>



							
							
							<li><button type='submit' id=".$idProduit." class='btn btn-primary btnAjouterProduitPanier' name='btnModifierProduit' >Appliquer les modifications</button></li>
							<li><button type='submit' id=".$idProduit." class='btn btn-danger btnSupprimerProduitPanier' name='btnSupprimerProduit' >Supprimer le produit</button></li>		
						</form>
						</li>
						
						
							");
						
					};echo("</ul>");
					
		
				};
					?>
	</body>
</html>
