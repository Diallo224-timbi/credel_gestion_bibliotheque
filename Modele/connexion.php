<?php 
	try
	{
		//On se connecte sur la base de donnée
		//global $connexion;
		$connexion=new PDO ('mysql:host=localhost;dbname=db_gestionbibliotheques', 'root', '');
		//echo "Ok connexion reussie";
	}
	catch(Exception $e)
	{
		//En cas d'erreur d'identification On affiche cet message et on arrête tout
		die('Erreur de connexion :' .$e->getMessage());
	}
?>