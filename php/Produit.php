<?php
require_once __DIR__ . "/connectionbdd.php";

class Produit{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}	
	public Function getAllProducts(){
		try{
		$sth = $this->Bdd->prepare("
									SELECT * FROM T_produits 
									");		
		$sth->execute();
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public Function getProductById($id){
		
		try{
		$sth = $this->Bdd->prepare("
									SELECT nom_produit,prix_produit,poids_produit,description_produit,stock_produit FROM T_produits 
									WHERE id=(:id)");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}
 ?>