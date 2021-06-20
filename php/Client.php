<?php 
require_once __DIR__ . "/connectionbdd.php";


class Client{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}	
	
	
	public Function createClient($identifiant,$MDP,$nomclient,$prenomclient,$adresseclient,$telephoneclient,$emailclient){
		try{	
		$sth = $this->Bdd->prepare("
									INSERT INTO T_clients (Identifiant,MDP,nom_client,prenom_client,adresse_client,telephone_client,email_client)
									VALUES (:identifiant,:MDP,:nomclient,:prenomclient,:adresseclient,:telephoneclient,:emailclient)");
		$sth->execute(array(':identifiant' => $identifiant,':MDP' => $MDP,':nomclient' => $nomclient,':prenomclient' => $prenomclient,':adresseclient' => $adresseclient,':telephoneclient' => $telephoneclient,':emailclient' => $emailclient)
		);
		

		
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	
	public Function verifierIdentifiant($identifiant,$motdepasse){
		$data=self::getClientByIdentifiant($identifiant);
		if (password_verify($motdepasse, $data['MDP'])){
			return true;
		}
		else{
			return false;
		}	
	}
	
	
	
	
	public Function getClientByIdentifiant($identifiant){
		try{
		$sth = $this->Bdd->prepare("
									SELECT * FROM T_clients 
									WHERE Identifiant=(:identifiant)");
		$sth->execute(array(':identifiant' => $identifiant));
			
		return $sth->fetch(PDO::FETCH_ASSOC);
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	public Function getAllClients(){
		try{
		$sth = $this->Bdd->prepare("
									SELECT Id_client,nom_client,prenom_client,adresse_client,telephone_client,email_client FROM T_clients 
									");		
		$sth->execute();
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}
?>