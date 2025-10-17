<?php
require('../../FPDF/fpdf.php');
require('../../Controleur/cathalogue/affiche.php');

class PDF extends FPDF
{
// Page header
	function Header()
	{
		// Logo
		$this->Image('../accueil/assets/logo.jpg',0,6,30);
		$this->SetFont('Arial','B',16);
		$this->Cell(70);
		// Title
		$this->Cell(160,10,'CENTRE DE RECHERCHE ET DE DOCUMENTATION ENVIRONNEMENTALE DE LABE CREDEL',0,0,'C');
		$this->Ln(12);
		$this->Cell(60);
		$this->SetFont('Arial','B',16);
		$this->Cell(150,8,'CATHALOGUE DES DOCUMENTS',1,0,'C');
		// Line break
		$this->Ln(17);
	}

// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("L");

$colone=array(10,10,60,80,60,50);
$pdf->SetFont('Times','B',12.5); 
$pdf->SetFillColor(193,229,252);

$pdf->cell($colone[0],10,'#',1,0,'C',true);
$pdf->cell($colone[1],10,'ID',1,0,'C',true);
$pdf->cell($colone[2],10,'TITRE',1,0,'C',true);
$pdf->cell($colone[3],10,'AUTEUR',1,0,'C',true);
$pdf->cell($colone[4],10,'TYPE',1,0,'C',true);
$pdf->cell($colone[5],10,'EMPLACEMENT',1,1,'C',true);


$pdf->SetFont('Times','',12); 
$pdf->SetFillColor(235,236,236);
$fill=false;
foreach ($liste as $key => $element){
	$pdf->cell($colone[0],7,$key+1,1,0,'L',$fill);
	$pdf->cell($colone[1],7,$element['idLivre'],1,0,'C',$fill);
	$pdf->cell($colone[2],7,$element['titre'],1,0,'C',$fill);
	$pdf->cell($colone[3],7,$element['prenomAuteur'].' '.$element['nomAuteur'],1,0,'C',$fill);
	$pdf->cell($colone[4],7,$element['nomType'],1,0,'C',$fill);
	$pdf->cell($colone[5],7,$element['nomEtagere'].'_'.$element['nomRayon'].'_'.$element['nomSalle'],1,1,'C',$fill);
	
}


$pdf->Output();
?>