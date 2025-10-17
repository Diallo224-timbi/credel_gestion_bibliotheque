<?php
session_start();

	if (isset ($_POST['matricule']) && isset ($_POST['nom']) && isset ($_POST['prenom']) && isset ($_POST['telephone']) && isset ($_POST['sexe']) && isset ($_POST['datenaissance']) && isset ($_POST['adresse']))
	{
		if ((!empty($_POST['matricule']) && (!empty($_POST['nom'])) && (!empty($_POST['prenom'])) && (!empty($_POST['telephone']))  && (!empty($_POST['sexe'])) && (!empty($_POST['datenaissance'])) && (!empty($_POST['adresse']))))
		{
			include_once('../Modele/fonctions.php');
			$resultat = updateEtudiants($_POST['matricule']);
			if ($resultat)
			{
				$_SESSION['Erreur']="Modification effectué avec succès";
				header('location:../index.php');
			}
			else
			{
				$_SESSION['Erreur']="Modification non effectué";
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