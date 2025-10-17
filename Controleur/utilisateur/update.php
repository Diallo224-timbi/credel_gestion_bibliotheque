<?php
	include_once('../../Modele/fonctions.php');
	if(isset($_GET['id'])){
		
	$liste = getUpdateUser($_GET['id']);
	foreach ($liste as $key => $element)

	{	
		$element ['idUser']=htmlspecialchars ('idUser');
		$element ['nom']=htmlspecialchars ('nom');
		$element ['sexe']=htmlspecialchars ('sexe');
		$element ['prenom']=htmlspecialchars ('prenom');
		$element ['dateNais']=htmlspecialchars ('dateNais');
		$element ['lieuNais']=htmlspecialchars ('lieuNais');	
		$element ['nationalite']=htmlspecialchars ('nationalite ');
		$element ['profession']=htmlspecialchars ('profession ');
		$element ['email']=htmlspecialchars ('email');
		$element ['photo']=htmlspecialchars ('photo');
		$element ['pieceIdentite']=htmlspecialchars ('pieceIdentite');
		$element ['etat']=htmlspecialchars ('etat');
	}
	}