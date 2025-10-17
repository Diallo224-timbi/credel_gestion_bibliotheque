<?php
	include_once('../../Modele/fonctions.php');
	$liste = getEtagere();
	foreach ($liste as $key => $element)
	{	
		$element ['idEtagere']=htmlspecialchars ('idEtagere');
		$element ['nomEtagere']=htmlspecialchars ('nomEtagere');
		$element ['capacite']=htmlspecialchars ('capacite');
		$element ['nomRayon']=htmlspecialchars ('nomRayon');
	}		
?>