<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	
	session_start();
	
	require_once "php/connectionbdd.php";
	require_once "php/Admin.php";
	require_once "php/Client.php";

	//YL - NOTE $_POST["mail"] mail correspond au nom du champ du formulaire
	//$nomProduit = ISSET($_POST["NomProduit"]) ? $_POST["NomProduit"] : "";
	//$prixProduit = ISSET($_POST["PrixProduit"]) ? $_POST["PrixProduit"] : "0";
	//$poidProduit = ISSET($_POST["PoidProduit"]) ? $_POST["PoidProduit"] : "0";
	//$descriptionProduit = ISSET($_POST["DescriptionProduit"]) ? $_POST["DescriptionProduit"] : "";
	//$stockProduit = ISSET($_POST["StockProduit"]) ? $_POST["StockProduit"] : "0";
	
	
	//$username = ISSET($_SESSION["username"]) ? $_SESSION["username"] : ""; 
	//$password = ISSET($_SESSION["mdp"]) ? $_SESSION["mdp"] : "";
	$produitObj = new Client($bdd);
	$tabClients=$produitObj->getAllClients();
			
	#Envoi du formulaire
	
	

	
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
					<li class="nav-item">
						<a class="nav-link" href="listeClients.php">Afficher la liste des clients</a>
					</li>
					<?php
						}
					?>
				</ul>

			</div>
		</nav>
		<?php if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) {
					
					echo("<ul>");
					foreach ($tabClients as $client){
						

						
						//Si aucune des caractéristique produit n'est null
						//On affiche le produit dans une card
						
						echo ("	
						
						<li>
							
							<div >
								<strong>Id : </strong>".$client['Id_client']."
							</div>
							<div>
								<strong>Nom :</strong> ".$client['nom_client']."
							</div>
							<div>
								<strong>Prenom :</strong> ".$client['prenom_client']."
							</div>
							<div>
								<strong>Adresse :</strong> ".$client['adresse_client']."
							</div>
							<div>
								<strong>Téléphone :</strong> ".$client['telephone_client']."
							</div>
							<div>
								<strong>Email :</strong> ".$client['email_client']."
							</div>
							</br>
						</li>
						
						
							");
						
					};echo("</ul>");
					
		
				};
					?>
	</body>
</html>
