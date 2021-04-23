<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION["identifiant"])){
	require_once "php/connectionbdd.php";
	require_once "php/Client.php";
		
	//Inclusion de la barre de navigation Bootstrap
	$username = ISSET($_POST["username"]) ? $_POST["username"] : "null"; 
	$password = ISSET($_POST["password"]) ? $_POST["password"] : "null"; 
	$btnSeConnecter = isset($_POST["btnSeConnecter"]) ? $_POST["btnSeConnecter"] : ""; 


	$client = new Client($bdd);

	if ($username and $password){
		if ($client->verifierIdentifiant($username, $password)){
			$_SESSION['identifiant'] = $username;
			print($_SESSION['identifiant']);
			error_log("SessionStart !");
		}
		else {
			print("Identifiant pas trouvé/valide");
		}
	}
}
?>
