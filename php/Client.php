<?php 
require_once __DIR__"/connectionbdd.php";


class Client{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}	
	
	
	public Function createClient($identifiant,$MDP,$nomclient,$prenomclient,$adresseclient,$telephoneclient,$emailclient){
		try{	
		$sth = $this->Bdd->prepare("
									INSERT INTO T_clients (Identifiant,MDP,nom_client,prenom_client,adresse_client,telephone_client,email_client)
									VALUES (Identifiant=(:identifiant),MDP=(:MDP),nom_client=(:nomclient),prenom_client=(:prenomclient),adresse_client=(:adresseclient),telephone_client=(:telephoneclient),email_client=(:emailclient))");
		$sth->execute(array(':identifiant' => $identifiant,':MDP' => $MDP,':nomclient' => $nomclient,':prenomclient' => $prenomclient,':adresseclient' => $adresseclient,':telephoneclient' => $telephoneclient,':emailclient' => $emailclient)
		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	
	public Function verifierIdentifiant($identifiant,$motdepasse){
		$data=self::getclientsbyidentifiant($identifiant);
		foreach($data as $row){
			if ($row['id'] == $motdepasse){
				return true;}
			else{
				return false;}
			}
		
	}
	
	
	
	
	public Function getClientByIdentifiant($identifiant){
		try{
		$sth = $this->Bdd->prepare("
									SELECT Identifiant,MDP,Id_client,nom_client,prenom_client,adresse_client,telephone_client,email_client FROM T_clients 
									WHERE Identifiant=(:identifiant)");
		$sth->execute(array(':identifiant' => $identifiant));
			
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}
?>