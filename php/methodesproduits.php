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
	  


class User{
	Private $Bdd=Null;
	
	Function __construct($Bdd){
		$this->Bdd=$Bdd;
	}
	public Function getAll()
	{
		$sth = $this->Bdd->prepare("SELECT * FROM user");
		$sth->execute();
			
		return $sth->fetchAll(); 
	}
	
	
	public Function getAll()
	{
		$sth = $this->Bdd->prepare("SELECT * FROM user");
		$sth->execute();
			
		return $sth->fetchAll(); 
	}	
	
	public Function getadminsbyid($identifiant){
		$sth = $this->Bdd->prepare("
									SELECT MDP FROM T_admins 
									WHERE Identifiant=(:identifiant)");
		$sth->execute(array(':identifiant' => $identifiant));
			
		return $sth->fetchAll();
	}
	
	
	public Function getclientsbyid($identifiant){
		$sth = $this->Bdd->prepare("
									SELECT Identifiant,MDP,Id_client FROM T_clients 
									WHERE Identifiant=(:identifiant)");
		$sth->execute(array(':identifiant' => $identifiant));
			
		return $sth->fetchAll();
	}
	
	
	public Function getcommandesproduitsbyid($id){
		$sth = $this->Bdd->prepare("
									SELECT id_produit,quantitee_commande FROM T_produits_commande 
									WHERE id_commande=(:id)");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
	}
	
	
	public Function getcommandesbyid($id){
		$sth = $this->Bdd->prepare("
									SELECT id_commande,date_commande FROM T_commandes 
									WHERE id_client=(:id)");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
	}
	
	public Function getproductbyid($id){
		$sth = $this->Bdd->prepare("
									SELECT nom_produit,prix_produit,poids_produit,description_produit,stock_produit FROM T_produits 
									WHERE id=(:id)");
		$sth->execute(array(':id' => $id));
			
		return $sth->fetchAll();
	}
	


}
?>