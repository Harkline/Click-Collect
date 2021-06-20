<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$btnValider = ISSET($_POST["btnValider"]) ? $_POST["btnValider"] : "null"; 



print("testBtnValider: ".ISSET($_POST["btnValider"]));

if(ISSET($_POST["btnSeConnecter"])){
	include "./php/scriptConnexionAdmin.php";
}
?>

<!DOCTYPE html>

<html lang="fr">

<html>
	<head>
		<title>Connexion</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="libs/bootstrap-5.0.0/css/Bootstrap.css">    
		<link rel="stylesheet" type="text/css" href="css/card.css"/>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<?php if(!ISSET($_SESSION['identifiant']) && !ISSET($_SESSION['mdp']) ) { ?>
					<li class="nav-item active">
						<a class="nav-link" href="connexionAdmin.php">Connexion<span class="sr-only"></span></a>
					</li>
					<?php
						}
					?>
					<?php if(ISSET($_SESSION['identifiant']) && ISSET($_SESSION['mdp']) ) { ?>
					<li class="nav-item">
						<a class="nav-link" href="ajoutArticle.php">Ajouter des produits</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="creationCompteAdmin.php">Créer un utilisateur admin</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="modificationSuppressionArticlesAdmin.php">Modifier ou supprimer les produits</a>
					</li>
					<?php
						}
					?>
				</ul>

			</div>
		</nav>
	

	
		<form method="post">
			<div class="card" style="width: 18rem;">
				<div class="form-group">
					<label for="inputUsernameConnexion">Nom d'utilisateur</label>
					<input type="username" name="username" class="form-control" id="inputUsernameConnexion" placeholder="Veuillez saisir votre nom d'utilisateur">
				</div>
				<div class="form-group">
					<label for="inputPasswordConnexion">Mot de passe</label>
					<input type="password" name="password" class="form-control" id="inputPasswordConnexion" placeholder="Veuillez saisir votre mot de passe">
				</div>
				<button type="submit" class="btn btn-primary" name="btnSeConnecter">Se connecter</button>
			</div>
		</form>
		
		
		
	
	</body>
</html>