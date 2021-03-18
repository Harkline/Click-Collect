<?php 
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
	  ?>


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
	
	public Function getcommandesbyid($id){
		$sth = $this->Bdd->prepare("
									SELECT nom_produit,prix_produit,poids_produit,description_produit,stock_produit FROM T_produits 
									WHERE id=(:id)");
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