<?php
	include_once('../../Modele/fonctions.php');
	$liste = getRayon();
	foreach ($liste as $key => $element)
	{	
		$element ['idRayon']=htmlspecialchars ('idRayon');
		$element ['idSalle']=htmlspecialchars ('idSalle');
		$element ['idType']=htmlspecialchars ('idType');
		$element ['nomRayon']=htmlspecialchars ('nomRayon');
		$element ['capacite']=htmlspecialchars ('capacite');
		$element ['nbreEtagere']=htmlspecialchars ('nbreEtagere');
		$element ['nomType']=htmlspecialchars ('nomType');
		$element ['nomSalle']=htmlspecialchars ('nomSalle');
	}		
?>