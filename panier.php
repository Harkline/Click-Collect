<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//Inclusion de la barre de navigation Bootstrap
include "./html/barreDeNavigation.html";

if(isset($_SESSION["identifiant"])){
}
else{
}
?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Panier</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">    
	</head>
	<body>


		<!-- Header --> 
		<header>           
			<h1>Mon panier</h1>
		</header>
		

		<script src="libs/jquery-3.6.0.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>