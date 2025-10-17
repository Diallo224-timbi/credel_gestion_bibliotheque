<?php
session_start();
	if(isset($_GET['id'])){
		include_once('../../Modele/fonctions.php');
		$id=$_GET['id'];
		$resultat = deleteLivre($id);
		if($resultat){
			$_SESSION['erreur']="Suppression effectuée avec succès";
			header('location:../../Vue/livre/liste.php');
			
		}else{
			$_SESSION['erreur']="echec";
			header('location:../../Vue/livre/liste.php');
			
		}
	}else{
		echo 'variable id';
		//$_SESSION['erreur']="echec sur la variable id";
		//header('location:../../Vue/utilisateur/liste.php');	
	}