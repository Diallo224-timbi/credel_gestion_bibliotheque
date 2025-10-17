<?php
session_start();
	if (isset ($_POST['idLivre']) && isset($_POST['idAuteur']))
	{
		if (!empty($_POST['idLivre']) && !empty($_POST['idAuteur']))
		{
			include_once('../../Modele/fonctions.php');
				global $connexion;
				$stmt = $connexion->query('SELECT *FROM ecrire WHERE idLivre="'.$_POST['idLivre'].'" AND idAuteur="'.$_POST['idAuteur'].'"');
				$stmt->execute();
				$ver = $stmt->fetch();
				if($ver){
					$_SESSION['Erreur']="Ajout non effectué ce livre est dejà affecté";
					header('location:../../Vue/ecrire/ajout.php');
				}else{
					$resultat = setEcrire();
					if ($resultat)
					{
						$_SESSION['Erreur']="Ajout effectué avec succès";
						header('location:../../Vue/ecrire/ajout.php');
						//unset($_SESSION['Erreur']);
					}
					else
					{
						$_SESSION['Erreur']="Ajout non effectué";
						header('location:../../Vue/ecrire/ajout.php');
						//unset($_SESSION['Erreur']);
					}
				}
		}
		else
		{
			$_SESSION['Erreur']="Tout les champs doivent etre remplis";		
			header('location:../../Vue/ecrire/ajout.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		header('location:../../Vue/ecrire/ajout.php');
	}
?>