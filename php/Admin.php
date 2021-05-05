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
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
}


?>