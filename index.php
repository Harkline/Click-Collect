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
		
		<!-- Barre de navigation Bootstrap--> 
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Accueil<span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="produits.php">Produits</a>
					</li>
				</ul>
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="creationCompte.php">Créer un compte</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="connexion.php">Se connecter</a>
					</li>
				</ul>
			</div>
		</nav>
			
			
		<h1> TEST </h1>
		<button class="btn btn-primary" onclick="document.getElementById('demo').innerHTML = Date()">CLICK ME! </button>  
		
		<p id="demo"></p>
		<p>This is a test paragraph</p>
		
		<!-- Footer -->
		<footer id="Accueil_Footer"> 
			<p>Copyright Click And Collect - Tous droits réservés</p>
		</footer>

		<script src="libs/jquery-3.6.0.min.js"></script>
		<script src="js/script.js"></script>
	</body>
</html>
