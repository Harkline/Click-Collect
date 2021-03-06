<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//Inclusion de la barre de navigation Bootstrap
include "./html/barreDeNavigation.html";
?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Accueil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">    
	</head>
	<body>

		<link rel="shortcut icon" type="image/jpg" href="image/favicon.ico"/>

		<!-- Header --> 
		<header>           
			<h1>Click And Collect !</h1>
		</header>
		
		
		<!-- Footer -->
		<footer id="Accueil_Footer"> 
			<p>Copyright Click And Collect - Tous droits réservés</p>
		</footer>

		<script src="libs/jquery-3.6.0.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>
