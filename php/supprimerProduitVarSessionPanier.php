<?php
header("Content-Type: application/json", true);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


$data = ($_POST) ? $_POST : "null";
$qte = ISSET($_POST["quantiteProduit"]) ? $_POST["quantiteProduit"] : "0"; 
$idProduit =  ISSET($_POST["idProduit"]) ? $_POST["idProduit"] : "null";

//Si la quantite est inférieur ou égal à 0 ou null on ne fait rien
//en temps normal : message d'erreur à l'utilisateur 
if ($qte <= 0){
	echo("On ne peut pas supprimer une quantité nulle ou négative.");
	exit;
}


echo($qte);

if($data != null) {
	
    if(isset($_SESSION["identifiant"])){

		if (ISSET($_SESSION["panier"])){
			
			
			//erreur silencieuse, on ne peut pas retirer plus de produit du panier qu'il n'y en a réellement (10 - 25 = -15 /!\) 
			//en temps normal : message d'erreur à l'utilisateur 
			if ($_SESSION["panier"][$idProduit]["qte"]-$qte < 0){
				echo("La quantité à supprimer est plus grande que la quantité déjà dans le panier de ce produit");
				exit;
			}
			$_SESSION["panier"][$idProduit]["id"]= $idProduit;
			$_SESSION["panier"][$idProduit]["qte"]= $_SESSION["panier"][$idProduit]["qte"] - $qte;
			exit;
		}
		
		
		else{

		}
	}	
}
?>