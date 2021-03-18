<?php 


try{
        $bdd =new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'pdo', 'pdo');
        // Activation des erreurs PDO
         $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // mode de fetch par défaut : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH ...
         $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
          die('Erreur : ' . $e->getMessage());
      }
	  


class Admin{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}
	
	public Function createadmin($identifiant,$MDP){
		try{	
		$sth = $this->Bdd->prepare("
									INSERT INTO T_admins (Identifiant,MDP)
									VALUES (Identifiant=(:identifiant),MDP=(:MDP))");
		$sth->execute(array(':identifiant' => $identifiant,':MDP' => $MDP);
		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public Function getadminsbyid($identifiant){
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
		$sth->execute(array(':identifiant' => $identifiant,':MDP' => $MDP,':nomclient' => $nomclient,':prenomclient' => $prenomclient,':adresseclient' => $adresseclient,':telephoneclient' => $telephoneclient,':emailclient' => $emailclient);
		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public Function getclientsbyidentifiant($identifiant){
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
		$sth->execute(array(':Idcommande' => $idcommande,':Idproduit' => $idproduit,':quantitee' => $quantitee);

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
		$sth->execute(array(':id_commande' => $idcommande,':id_client' => $idclient,':date_commande' => $datecommande,':total_commande' => $totalcommande);

		);
		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}

	
	public Function getcommandebyid($id){
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
	
	public Function getcommandesbyidclient($id){
		try{
		$sth = $this->Bdd->prepare("
									SELECT id_commande,id_client,date_commande FROM T_commandes 
									WHERE id_client=(:id)");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
}

class Produit{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}	
	public Function getallproducts(){
		try{
		$sth = $this->Bdd->prepare("
									SELECT nom_produit,prix_produit,poids_produit,description_produit,stock_produit FROM T_produits 
									");		
		return $sth->fetchAll();
		} catch(PDOException $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}
	
	public Function getproductbyid($id){
		
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