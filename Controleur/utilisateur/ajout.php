<?php
session_start();
	if (isset ($_POST['id']) && isset ($_POST['nom']) && isset ($_POST['prenom']) && isset ($_POST['email']))
	{
		if ((!empty($_POST['id'])) && (!empty($_POST['nom'])) && (!empty($_POST['prenom'])))
		{
			include_once('../../Modele/fonctions.php');
			global $connexion;
			$stmt = $connexion->query('SELECT *FROM user WHERE email="'.$_POST['email'].'" OR idUser="'.$_POST['id'].'"');
			$stmt->execute();
			$ver = $stmt->fetch();
				if($ver){
					$_SESSION['Erreur']="Ajout non effectué, ce compte existe dejà!\n verifier votre email ou votre identifiant";
					header('location:../../Vue/utilisateur/ajout.php');
				}else{
				 $resultat=setUsers();
					if ($resultat)
					{
						$_SESSION['Erreur']="Ajout effectué avec succès";
						header('location:../../Vue/utilisateur/ajout.php');
					}
					else
					{
						$_SESSION['Erreur']="Ajout non effectué fermer la page et verifier votre format de photo\n donner un format png, jpeg, jpg";
						header('location:../../Vue/utilisateur/ajout.php');
					}
				}
		}
		else
		{
			$_SESSION['Erreur']="Tout les champs doivent etre remplis";		
			header('location:../../Vue/utilisateur/ajout.php');
		}
	}
	else
	{
		$_SESSION['Erreur']="Erreur: manque d'une ou plusieurs variables";		
		header('location:../../Vue/utilisateur/ajout.php');
	}?>
	

<!-- ************************upload************** */
********************************************** */ -->