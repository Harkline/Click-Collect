<?php
require "./connectionbdd.php";  // require le fichier connexion pour fonctionner car il gère la connection a la bdd
require "./Client.php"; 
require "./Admin.php";
require "./ProduitsCommande.php";
require "./Commande.php";
require "./Produit.php";


session_start(); //session
error_reporting(E_ALL);//affichage erreurs php

$_mail=isset($_POST['email'])? $_POST['email']:"";
$_nom=isset($_POST['lastname'])? $_POST['lastname']:"";
$_prenom=!empty($_POST['firstname'])? $_POST['firstname']:"";
$_mdp=!empty($_POST['password'])? $_POST['password']:"";
$_mdp2=!empty($_POST['password2'])? $_POST['password2']:"";

	

//Execution de la requete
if (isset($_POST['email']) && isset($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password']) && $_mdp==$_mdp2){
try{
	
	$sth = $dbco->prepare("
    INSERT INTO Clients(Nom,Prenom,mail,password)
    VALUES (:nom, :prenom, :mail, :password)
    ");
    $sth->execute(array(
     ':nom' => $_nom,
     ':prenom' => $_prenom,
     ':mail' => $_mail,
     ':password' => $_mdp,
	));
	
	
	//$sql = "INSERT INTO user(Nom,Prenom,mail,password)
    //                    VALUES('$_nom','$_prenom','$_mail','$_mdp')";
  //$requete = $bdd -> exec($sql) ;
  #$requete->execute($sql) ;
}catch(Exception $e){
  // en cas d'erreur :
   echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  #print_r($datas);
}





}
?>

<!Doctype>
<html Lang="Fr">
<Head>
	<Meta charset="utf-8"/>
	<title>Memory</title>
	<!--<link href="monstyle.css" rel="stylesheet"/> -->

<link href="./css/bootstrap.min.css" rel="stylesheet"/>
<link href="./css/mon-style.css" rel="stylesheet"/>

</Head>
<body>
 <form name="form_register" action="" method="post">
          <label>Email</label>:<input type="text" name="email">
          <label>Nom</label>:<input type="text" name="lastname">
          <label>Prénom</label>:<input type="text" name="firstname">
          <label>Password</label>:<input type="text" name="password">
          <label>Confirmation Password</label>:<input type="text" name="password2">
          <input type="submit" name="valider" value="valider">
       </form>      


</body>
</html>