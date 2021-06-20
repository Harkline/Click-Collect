<?php
header("Content-Type: application/json", true);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


$data = ($_POST) ? $_POST : "null";
$qte = ISSET($_POST["quantiteProduit"]) ? $_POST["quantiteProduit"] : "0"; 
$idProduit =  ISSET($_POST["idProduit"]) ? $_POST["idProduit"] : "null";
$stockProduit = ISSET($_POST["stockProduit"]) ? $_POST["stockProduit"] : "0"; 

echo($qte);

if($data != null) {
	
	//Quand la valeur est nulle ou égal à 0, rien à ajouter
	if($qte == 0){
		exit;
	}
	
    if(isset($_SESSION["identifiant"])){
		//la quantité (demandé, ou demandé plus celle du panier) est plus grande que le stock
		if($qte > $stockProduit || $_SESSION["panier"][$idProduit]["qte"] + $qte > $stockProduit){
			exit;
		}
		else{
			if (ISSET($_SESSION["panier"])){
				//Si le panier existe déjà
				$_SESSION["panier"][$idProduit]["id"]= $idProduit;
				$_SESSION["panier"][$idProduit]["qte"]= $_SESSION["panier"][$idProduit]["qte"] + $qte;
				exit;
			}
			
			
			else{
				//Création du panier
				$_SESSION["panier"][$idProduit]["id"]= $idProduit;
				$_SESSION["panier"][$idProduit]["qte"]= $qte;
			}
		}
	}	
}


?>