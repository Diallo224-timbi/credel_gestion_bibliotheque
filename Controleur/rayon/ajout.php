<?php
session_start();
	if (isset ($_POST['idRayon']) && isset ($_POST['idSalle'])&& isset ($_POST['rayon']))
	{
		if ((!empty($_POST['idRayon'])) && (!empty($_POST['idSalle'])))
		{
			include_once('../../Modele/fonctions.php');
			global $connexion;
			$stmt = $connexion->query('SELECT *FROM rayon WHERE idRayon="'.$_POST['idRayon'].'" 
															OR nomRayon="'.$_POST['rayon'].'"');
			$stmt->execute();
			$ver = $stmt->fetch();
			if($ver){
				$_SESSION['Erreur']="Ajout non effectué, ce rayon existe dejà!\n verifier votre type ou votre identifiant";
				header('location:../../Vue/rayon/ajout.php');
			}else{
			 $resultat=setRayon();
				if ($resultat)
				{
					$_SESSION['Erreur']="Ajout effectué avec succès";
					header('location:../../Vue/rayon/ajout.php');
				}
				else
				{
					$_SESSION['Erreur']="Ajout non effectué fermer la page et verifier votre format de photo\n donner un format png, jpeg, jpg";
					header('location:../../Vue/rayon/ajout.php');
				}
			}
		}
		else
		{
			$_SESSION['Erreur']="Tout les champs doivent etre remplis";		
			header('location:../../Vue/rayon/ajout.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		header('location:../../Vue/rayon/ajout.php');
	}
?>
	