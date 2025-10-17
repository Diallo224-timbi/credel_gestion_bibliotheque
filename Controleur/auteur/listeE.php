<?php
	include_once('../../Modele/fonctions.php');
	$listeE = getAuteur();
	foreach ($listeE as $key => $element)
	{ 
		$element ['idLivre']=htmlspecialchars ('idAuteur');
		$element ['titre']=htmlspecialchars ('nomlAuteur');
	}							
?>