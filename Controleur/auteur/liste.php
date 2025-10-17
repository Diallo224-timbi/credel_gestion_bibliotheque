<?php
	include_once('../../Modele/fonctions.php');
	$liste = getAuteur();
		//echo '<pre>';
		//print_r ($liste);
		//echo '</pre>';
	foreach ($liste as $key => $element)
	{ 
		$element ['idAuteur']=htmlspecialchars('idAuteur');
		$element ['nomlAuteur']=htmlspecialchars('nomlAuteur');
		$element ['prenomAuteur']=htmlspecialchars('prenomAuteur');
		$element ['dateNais']=htmlspecialchars('dateNais');
		$element ['lieuNais']=htmlspecialchars('lieuNais');
		$element ['nationalite']=htmlspecialchars('nationalite');	
		$element ['profession']=htmlspecialchars('profession');
	}							
?>
