<?php 
require_once __DIR__ . "/connectionbdd.php";


class Commande{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}

	public Function createCommandes($idcommande,$idclient,$totalcommande){
		try{
		$datecommande=date("Y-m-d H:i:s");
		$sth = $this->Bdd->prepare("
									INSERT INTO T_commandes (Id_commande,Id_client,date_commande,total_commande)
									VALUES (:id_commande,:id_client,:date_commande,:total_commande)");
		$sth->execute(array(':id_commande' => $idcommande,':id_client' => $idclient,':date_commande' => $datecommande,':total_commande' => $totalcommande)

		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}

	
	public Function getCommandeById($id){
		try{
		$sth = $this->Bdd->prepare("
									SELECT id_commande,date_commande,id_client,total_commande FROM T_commandes 
									WHERE id_commande=(:id)");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public Function getCommandesByIdClient($id){
		try{
		$sth = $this->Bdd->prepare("
									SELECT id_commande,id_client,date_commande,total_commande FROM T_commandes 
									WHERE id_client=(:id)");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
}

?>