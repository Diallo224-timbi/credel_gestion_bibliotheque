<?php
	include_once('../../Modele/fonctions.php');
	if (isset($_POST['searche'])) {
		$liste = getLivreTitreSearchG($_POST['searche']);
	foreach ($liste as $key => $element)
	{ 
		$element ['idLivre']=htmlspecialchars ('idLivre');
		$element ['idEtagere']=htmlspecialchars ('idEtagere');
		$element ['titre']=htmlspecialchars ('titre');
		$element ['maisonEdition']=htmlspecialchars ('maisonEdition');
		$element ['datePub']=htmlspecialchars ('datePub');
		$element ['dateEntree']=htmlspecialchars ('dateEntree');	
		$element ['codeLiv']=htmlspecialchars (' codeLiv ');
		$element ['telechargeable']=htmlspecialchars ('telechargeable ');
		$element ['nbreExemplaire']=htmlspecialchars ('nbreExemplaire');
		$element ['document']=htmlspecialchars ('document');
	}
}
else {
		$liste = getLivre();
foreach ($liste as $key => $element)
	{ 
		$element ['idLivre']=htmlspecialchars ('idLivre');
		$element ['idEtagere']=htmlspecialchars ('idEtagere');
		$element ['titre']=htmlspecialchars ('titre');
		$element ['maisonEdition']=htmlspecialchars ('maisonEdition');
		$element ['datePub']=htmlspecialchars ('datePub');
		$element ['dateEntree']=htmlspecialchars ('dateEntree');	
		$element ['codeLiv']=htmlspecialchars (' codeLiv ');
		$element ['telechargeable']=htmlspecialchars ('telechargeable ');
		$element ['nbreExemplaire']=htmlspecialchars ('nbreExemplaire');
		$element ['document']=htmlspecialchars ('document');
	}
}	
?>
