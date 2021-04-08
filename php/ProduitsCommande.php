<?php 
require_once __DIR__"/connectionbdd.php";


class ProduitsCommande{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}	
	
	public Function createProduitsCommande($idcommande,$idproduit,$quantitee){
		try{	
		$sth = $this->Bdd->prepare("
									INSERT INTO T_produits_commande (Id_commande,Id_produit,quantitee)
									VALUES ((:Idcommande),(:Idproduit);(:quantitee)");
		$sth->execute(array(':Idcommande' => $idcommande,':Idproduit' => $idproduit,':quantitee' => $quantitee)

		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	
	public Function getProduitsCommandebyid($id){
		try{
		$sth = $this->Bdd->prepare("
									SELECT id_produit,quantitee_commande FROM T_produits_commande 
									WHERE id_commande=:id");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}

?>