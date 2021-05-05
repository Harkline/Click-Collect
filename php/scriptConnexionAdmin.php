<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
error_log("username password presents !");
if(!isset($_SESSION["identifiant"])){
	require_once "php/connectionbdd.php";
	require_once "php/Admin.php";
		
	//Inclusion de la barre de navigation Bootstrap
	$username = ISSET($_POST["username"]) ? $_POST["username"] : "null"; 
	$password = ISSET($_POST["password"]) ? $_POST["password"] : "null"; 
	$btnSeConnecter = isset($_POST["btnSeConnecter"]) ? $_POST["btnSeConnecter"] : ""; 


	$admin = new Admin($bdd);
	error_log("username password presents !");
	if ($username and $password){
		error_log("username password presents !");
		if ($admin->verifierIdentifiant($username, $password)){
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
