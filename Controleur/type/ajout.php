<?php
session_start();
	if (isset ($_POST['idtype']) && isset ($_POST['type']))
	{
		if ((!empty($_POST['idtype'])) && (!empty($_POST['type'])))
		{
			include_once('../../Modele/fonctions.php');
			global $connexion;
			$stmt = $connexion->query('SELECT *FROM type WHERE idType="'.$_POST['idtype'].'" OR nomType="'.$_POST['type'].'"');
			$stmt->execute();
			$ver = $stmt->fetch();
				if($ver){
					$_SESSION['Erreur']="Ajout non effectué, ce type de document existe dejà!\n verifier votre type ou votre identifiant";
					header('location:../../Vue/type/ajout.php');
				}else{
				 $resultat=setTypes();
					if ($resultat)
					{
						$_SESSION['Erreur']="Ajout effectué avec succès";
						header('location:../../Vue/type/ajout.php');
					}
					else
					{
						$_SESSION['Erreur']="Ajout non effectué fermer la page et verifier votre format de photo\n donner un format png, jpeg, jpg";
						header('location:../../Vue/type/ajout.php');
					}
				}
		}
		else
		{
			$_SESSION['Erreur']="Tout les champs doivent etre remplis";		
			header('location:../../Vue/type/ajout.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		header('location:../../Vue/type/ajout.php');
	}?>
	