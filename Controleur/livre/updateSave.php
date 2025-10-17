<?php
session_start();
	if(isset($_POST['id'])){
		if(isset($_POST['idEtagere'])){
			include_once('../../Modele/fonctions.php');
			$id=$_POST['id'];
			$resultat=updateLivre($id);
			if($resultat){
			$_SESSION['erreur']="Modification effectuée avec succès";
			header('location:../../Vue/livre/liste.php');
			}else{
			$_SESSION['erreur']="echec";
			header('location:../../Vue/livre/liste.php');
			echo "echec";
			}
		}else{
		//$_SESSION['erreur']="echec sur la variable etat";
		echo 'variable etat';
		//header('location:../../Vue/utilisateur/liste.php');		
		}
	}else{
		echo 'variable id';
		//$_SESSION['erreur']="echec sur la variable id";
		//header('location:../../Vue/utilisateur/liste.php');	
	}

?>
