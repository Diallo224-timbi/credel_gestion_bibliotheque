<?php
session_start();
	if (isset ($_POST['idSalle']) && isset ($_POST['nom']) && isset ($_POST['NombreRayon']))
	{
		if ((!empty($_POST['idSalle'])) && (!empty($_POST['nom'])) && (!empty($_POST['NombreRayon'])))
		{
			include_once('../../Modele/fonctions.php');
			$resultat = setSalle();
			if ($resultat)
			{
				$_SESSION['Erreur']="Ajout effectué avec succès";
				header('location:../../index.php');
			}
			else
			{
				$_SESSION['Erreur']="Ajout non effectué";
				header('location:../index.php');
			}
		}
		else
		{
			$_SESSION['Erreur']="Tout les champs doivent etre remplis";		
			header('location:../index.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		header('location:../index.php');
	}
?>