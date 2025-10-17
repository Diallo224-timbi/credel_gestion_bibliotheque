<?php
	include_once('../../Modele/fonctions.php');
	if (isset($_POST['searche'])) {
		$liste = getAuteurSearch($_POST['searche']);
	foreach ($liste as $key => $element)

	{	
		$element ['idUser']=htmlspecialchars ('idUser');
		$element ['nom']=htmlspecialchars ('nom');
		$element ['sexe']=htmlspecialchars ('sexe');
		$element ['prenom']=htmlspecialchars ('prenom');
		$element ['dateNais']=htmlspecialchars ('dateNais');
		$element ['lieuNais']=htmlspecialchars ('lieuNais');	
		$element ['nationnalite']=htmlspecialchars ('nationnalite ');
		$element ['profession']=htmlspecialchars ('profession ');
		$element ['email']=htmlspecialchars ('email');
		$element ['photo']=htmlspecialchars ('photo');
		$element ['pieceIdentite']=htmlspecialchars ('pieceIdentite');
	}
}else{
		$liste = getUser();
	foreach ($liste as $key => $element)

	{	
		$element ['idUser']=htmlspecialchars ('idUser');
		$element ['nom']=htmlspecialchars ('nom');
		$element ['sexe']=htmlspecialchars ('sexe');
		$element ['prenom']=htmlspecialchars ('prenom');
		$element ['dateNais']=htmlspecialchars ('dateNais');
		$element ['lieuNais']=htmlspecialchars ('lieuNais');	
		$element ['nationnalite']=htmlspecialchars ('nationnalite ');
		$element ['profession']=htmlspecialchars ('profession ');
		$element ['email']=htmlspecialchars ('email');
		$element ['photo']=htmlspecialchars ('photo');
		$element ['pieceIdentite']=htmlspecialchars ('pieceIdentite');
	}	
}								
?>
