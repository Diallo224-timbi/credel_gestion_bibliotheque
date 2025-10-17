<?php
	include_once('../../Modele/fonctions.php');
	$liste = getTypes();
	foreach ($liste as $key => $element)
	{	
		$element ['idType']=htmlspecialchars ('idType');
		$element ['nomType']=htmlspecialchars ('nomType');
	}
	$donnees = getSumType();
	foreach ($donnees as $key => $donnee)
	{	
		$donnee['somme']=htmlspecialchars ('somme');
	}	
?>