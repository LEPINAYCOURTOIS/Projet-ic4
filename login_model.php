<?php
class Model
{
	function process($context)
	{
	// Récupère les données inscrit par l'utilisateur :
	$username = $_REQUEST["username"];
	$password = $_REQUEST["password"];
	
	// Authentifie l'utilisateur:
	if(strtolower($username)=="admin" && strtolower($password) =="root")
	{
		// Message de bienvenue :
		$context->set_attribute("username",$username);
		
		//Prochaine vue:
		return "hello.php";	
	}
	
	else
	{
		//Message d'erreur
		$context->set_attribute("error","Echec d'authentification, veuillez recommencer. ");
		
		// Nouvelle vue:
		
		return "acceuil.php";
	}
	
	}	
}
?>
