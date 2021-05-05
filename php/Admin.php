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
									VALUES (Identifiant=(:identifiant),MDP=(:MDP))");
		$sth->execute(array(':identifiant' => $identifiant,':MDP' => $MDP)
		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
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