<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "php/connectionbdd.php";
require_once "php/Produit.php";

include "./html/barreDeNavigation.html";

//On récupère tous les produits en base de donnée
$produitObj = new Produit($bdd);
$tabProduits=$produitObj->getAllProducts();
 
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
	if (!is_null($nomProduit) ||  !is_null($prixProduit) ||  !is_null($poidProduit) ||  !is_null($descriptionProduit) ||  !is_null($stockProduit)){
	echo ("	
		<form method='post'>
			<div class='card' style='width: 18rem;'>
				<div class='form-group'>
					<h1>".$nomProduit."</h1>
					<p>Prix : ".$prixProduit."</p>
					<p>Poid : ".$poidProduit."</p>
					<p>Description : ".$descriptionProduit."</p>
					<p>Stock restant : ".$stockProduit."</p>
				</div>
				<label for='labelQte'>Quantité :</label><br>
				<input type='text' id='qteProduit".$idProduit."'><br>
				<button type='submit' id='btnProduitId".$idProduit."' class='btn btn-primary' name='btnAjouterProduitPanier'>Ajouter au panier</button>
			</div>
		</form>"
		);
	}
}

session_start();

//Inclusion de la barre de navigation Bootstrap

?>



<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Produits</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">  	
	</head>
	
	
	<body>

	</body>
</html>