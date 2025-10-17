<?php
	include_once('../../Modele/fonctions.php');
	$liste = getSalle();
	// echo '<pre>';
	// print_r ($liste);
	// echo '</pre>';
	foreach ($liste as $key => $element)
	{	
		$element ['idSalle']=htmlspecialchars ('idSalle');
		$element ['nomSalle']=htmlspecialchars ('nomSalle');
		$element ['nbreRayon ']=htmlspecialchars ('nbreRayon ');	
	}		
?>