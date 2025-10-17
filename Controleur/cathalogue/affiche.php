<?php
	include_once('../../Modele/fonctions.php');
	$liste =  getCathalogue();
	foreach ($liste as $key => $element)
	{	
		$element ['idLivre']=htmlspecialchars ('idLivre');
		$element ['titre']=htmlspecialchars ('titre');
		$element ['nomlAuteur']=htmlspecialchars ('nomlAuteur');
		$element ['prenomAuteur']=htmlspecialchars ('prenomAuteur');
		$element ['nomType']=htmlspecialchars ('nomType');
		$element ['nomEtagere']=htmlspecialchars ('nomEtagere');
		$element ['nomRayon']=htmlspecialchars ('nomRayon');
		$element ['nomSalle']=htmlspecialchars ('nomSalle');
	}
		$donnees = getFicheSuivi();
	foreach ($donnees as $key => $donnee)
	{	
		$donnee ['idLivre']=htmlspecialchars ('idLivre');
		$donnee ['titre']=htmlspecialchars ('titre');
		$donnee ['nom']=htmlspecialchars ('nom');
		$donnee ['prenom']=htmlspecialchars ('prenom');
		$donnee ['dateConsul']=htmlspecialchars ('dateConsul');
		$donnee ['motifConsul']=htmlspecialchars ('motifConsul');
	}
?>