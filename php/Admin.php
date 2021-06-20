<?php 
require_once __DIR__ . "/connectionbdd.php";



class Admin{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}
	
	public Function createAdmin($identifiant,$MDP){
		try{	
		$sth = $this->Bdd->prepare("
									INSERT INTO T_admins (Identifiant,MDP)
									VALUES (:Identifiant,:MDP)");
		$sth->execute(array(':Identifiant' => $identifiant,':MDP' => $MDP)
		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	public Function createArticle($identifiant,$MDP,$nomProduit,$prixProduit,$poidProduit,$descriptionProduit,$stockProduit){
		if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) {
			$caught= false;
			try{	
				$sth = $this->Bdd->prepare("
									INSERT INTO T_produits (nom_produit,prix_produit,poid_produit,description_produit,stock_produit)
									VALUES (:nom_produit,:prix_produit,:poid_produit,:description_produit,:stock_produit)");
				$sth->execute(array(':nom_produit' => $nomProduit,':prix_produit' => $prixProduit,':poid_produit' => $poidProduit,':description_produit' => $descriptionProduit,':stock_produit' => $stockProduit)
				);
		
				return $sth->fetchAll();
				
				echo '<script>alert("Enregistrement à réussi pour le produit :'.$nomProduit.' !")</script>';
			
				 
			} catch(PDOException $e) {
				echo '<script>alert("'.$e->getMessage().'!")</script>';
				$caught=true;
				
			}
			
			
		}
	}
	public Function updateArticle($identifiant,$MDP,$idProduit,$nomProduit,$prixProduit,$poidProduit,$descriptionProduit,$stockProduit){
		if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) {
			
			$sql="
				UPDATE T_produits SET nom_produit='".$nomProduit."',prix_produit=".$prixProduit.",poid_produit=".$poidProduit.",description_produit='".$descriptionProduit."',stock_produit=".$stockProduit."
				WHERE id_produit=".$idProduit;
			try{	
				$sth = $this->Bdd->prepare($sql);
				$sth->execute();
			
				 echo $sth->rowCount() . " records UPDATED successfully";
				} catch(PDOException $e) {
				  echo $sql . "<br>" . $e->getMessage();
				}
				
				
			
			
		}
	}
	public Function deleteArticle($identifiant,$MDP,$idProduit){
		if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) {
			
			$sql="
				DELETE FROM T_produits 
				WHERE id_produit=".$idProduit;
			try{	
				$sth = $this->Bdd->prepare($sql);
				$sth->execute();
			
				 echo $sth->rowCount() . " record Deleted successfully";
				} catch(PDOException $e) {
				  echo $sql . "<br>" . $e->getMessage();
				}
				
				
			
			
		}
	}
	
	public Function verifierIdentifiant($identifiant,$motdepasse){
		$data=self::getAdminById($identifiant);
		if (password_verify($motdepasse, $data['MDP'])){
			return true;
		}
		else{
			return false;
		}	
	}
	
	public Function getAdminById($identifiant){
		try{	
		$sth = $this->Bdd->prepare("
									SELECT MDP FROM T_admins 
									WHERE Identifiant=(:identifiant)");
		$sth->execute(array(':identifiant' => $identifiant));
		
		return $sth->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}


?>