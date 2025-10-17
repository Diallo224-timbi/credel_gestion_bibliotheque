<?php
	include_once('../../Modele/fonctions.php');
	if (isset($_POST['searche'])) {
		$liste= getLivreSearch($_POST['searche']);
		// echo '<pre>';
		// print_r ($liste);
		// echo '</pre>';
		foreach ($liste as $key => $element)

		{ 
			$element ['auteur.idAuteur']=htmlspecialchars ('auteur.idAuteur');
			$element ['livre.idLivre']=htmlspecialchars ('livre.idLivre');
			$element ['auteur.nomlAuteur']=htmlspecialchars ('auteur.nomlAuteur');
			$element ['auteur.prenomAuteur']=htmlspecialchars ('auteur.prenomAuteur');
			$element ['livre.titre']=htmlspecialchars ('livre.titre');
			$element ['livre.document']=htmlspecialchars ('livre.document');	
		}
		//header('location:../../Vue/consultation/ajout.php');
	}else {
		$liste=getLivreEcrite();
		foreach ($liste as $key => $element)

		{ 
			$element ['auteur.idAuteur']=htmlspecialchars ('auteur.idAuteur');
			$element ['livre.idLivre']=htmlspecialchars ('livre.idLivre');
			$element ['auteur.nomlAuteur']=htmlspecialchars ('auteur.nomlAuteur');
			$element ['auteur.prenomAuteur']=htmlspecialchars ('auteur.prenomAuteur');
			$element ['livre.titre']=htmlspecialchars ('livre.titre');
			$element ['livre.document']=htmlspecialchars ('livre.document');	
		}
	}							
?>