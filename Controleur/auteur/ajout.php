<?php
	if(isset($_POST['id'])&& isset($_POST['nom']) 
		&& isset($_POST['prenom'])&& isset($_POST['prenom'])
		&& isset($_POST['dateNaissance'])&& isset($_POST['lieunaissance'])
		&& isset($_POST['profession'])&& isset($_POST['nationnalite']))
	{
		include_once('../../Modele/fonctions.php');
		$auteurAjout=setAuteur();
		if($auteurAjout){
			$_SESSION['Erreur']=" Auteur ajouté avec succès";
			header('location:../../Vue/auteur/ajout.php');
		}else{
			$_SESSION['Erreur']=" Auteur non ajouté, Veuillez reverifier!";
			header('location:../../Vue/auteur/ajout.php');
		}
	}else{
		echo "echec sur les variable post\n";
		print_r ($_POST);
	}
?>