<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//Inclusion de la barre de navigation Bootstrap
include_once "./html/barreDeNavigation.html";
require_once "php/Commande.php";
require_once "php/Client.php";

echo("		<header>           
			<h1>Mes Commandes</h1>
		</header>");

if(isset($_SESSION["identifiant"])){
	$client = new Client($bdd);
	$commandesClient = new Commande($bdd);
	$tabClient=$client->getClientByIdentifiant($_SESSION["identifiant"]);
	$tabCommandesClient=$commandesClient->getCommandesByIdClient($tabClient["Id_client"]);
	
	if(isset($tabCommandesClient)){
		echo("
		<table>
   <tr>
		<th>Identifiant unique de la commande</th>
       <th>Date de la commande</th>
       <th>Total de la commande</th>
   </tr>");
	foreach($tabCommandesClient as $commande){
		
		echo("   
		<tr>
		   <td>".$commande['id_commande']."</td>
		   <td>".$commande['date_commande']."</td>
		   <td>".$commande['total_commande']."</td>
		</tr>");
		
	}
	echo("</table>");
	/*
   <tr>
       <td>Carmen</td>
       <td>33 ans</td>
       <td>Espagne</td>
   </tr>
   <tr>
       <td>Michelle</td>
       <td>26 ans</td>
       <td>États-Unis</td>
   </tr>
</table>
		");
		
	/*	
		<table>
   <tr>
       <th>Nom</th>
       <th>Âge</th>
       <th>Pays</th>
   </tr>

   <tr>
       <td>Carmen</td>
       <td>33 ans</td>
       <td>Espagne</td>
   </tr>
   <tr>
       <td>Michelle</td>
       <td>26 ans</td>
       <td>États-Unis</td>
   </tr>
</table>
*/
	}
}
else{
	echo("Veuillez vous connecter pour voir le contenu de cette page !");
}


?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Mes Commandes</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">    
	</head>
	<body>


		

		<script src="libs/jquery-3.6.0.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>