<?php
session_start();

	if (isset ($_POST['matricule']))
	{
	
		include_once('../Modele/fonctions.php');
		$resultat = deleteEtudiants($_POST['matricule']);
		if ($resultat)
		{
			$_SESSION['Erreur']="Suppression effectué avec succès";
			header('location:../index.php');
		}
		else
		{
			$_SESSION['Erreur']="Suppression effectué avec succès";
			header('location:../index.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		header('location:../index.php');
	}

?>