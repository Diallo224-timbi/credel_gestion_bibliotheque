<?php
session_start();
	if (isset ($_POST['idEtagere']) && isset ($_POST['nomEtagere'])&& isset ($_POST['rayon']))
	{
		if ((!empty($_POST['idEtagere'])) && (!empty($_POST['nomEtagere'])))
		{
			include_once('../../Modele/fonctions.php');
			global $connexion;
			$stmt = $connexion->query('SELECT *FROM etagere WHERE idEtagere="'.$_POST['idEtagere'].'" 
															OR nomEtagere="'.$_POST['nomEtagere'].'"');
			$stmt->execute();
			$ver = $stmt->fetch();
			if($ver){
				$_SESSION['Erreur']="Ajout non effectué,l'etagère existe dejà! <br> verifier votre ID ou votre LE NOM ";
				$_SESSION['alert']="danger";
				header('location:../../Vue/etagere/ajout.php');
			}else{
			 $resultat=setEtagere();
				if ($resultat)
				{
					$_SESSION['Erreur']="Ajout effectué avec succès";
					$_SESSION['alert']="success";
					header('location:../../Vue/etagere/ajout.php');
				}
				else
				{
					$_SESSION['Erreur']="Ajout non effectué fermer la page ";
					$_SESSION['alert']="danger";
					header('location:../../Vue/etagere/ajout.php');
				}
			}
		}
		else
		{
			$_SESSION['Erreur']="Tout les champs doivent etre remplis";		
			header('location:../../Vue/etagere/ajout.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		header('location:../../Vue/etagere/ajout.php');
	}
?>
	