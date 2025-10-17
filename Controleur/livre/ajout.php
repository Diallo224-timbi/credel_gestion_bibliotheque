<?php
session_start();
	if (isset ($_POST['id']) && isset ($_POST['idEtagere']) && isset ($_POST['maisonEdition']))
	{
		if ((!empty($_POST['id'])) && (!empty($_POST['idEtagere'])) && (!empty($_POST['maisonEdition'])))
		{
			include_once('../../Modele/fonctions.php');
			$resultat = setLivre();
			if ($resultat)
			{
				$_SESSION['Erreur']="Ajout effectué avec succès";
				echo $_SESSION['Erreur'];
				header('location:../../Vue/livre/ajout.php');
			}
			else
			{
				$_SESSION['Erreur']="Ajout non effectué";
				echo $_SESSION['Erreur'];
				header('location:../../Vue/livre/ajout.php');
			}
		}
		else
		{
			$_SESSION['Erreur']="Tout les champs doivent etre remplis";		
			echo $_SESSION['Erreur'];
			header('location:../../Vue/livre/ajout.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		echo $_SESSION['Erreur'];
				//header('location:../../index.php');
	}
?>