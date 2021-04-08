<?php
error_reporting(E_ALL);
//Ici, appel au script de connexion, qui lance la session
//session_start();
//test push git to resolve anonymous push

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
	
		<form>
			<div class="card" style="width: 18rem;">
				<div class="form-group">
					<label for="inputUsernameConnexion">Username</label>
					<input type="username" class="form-control" id="inputUsernameConnexion" aria-describedby="emailHelp" placeholder="Enter username">
				</div>
				<div class="form-group">
					<label for="inputPasswordConnexion">Password</label>
					<input type="password" class="form-control" id="inputPasswordConnexion" placeholder="Enter Password">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
		
		
		
	
	</body>
</html>