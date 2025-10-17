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
		$this->Cell(70);
		$this->SetFont('Arial','B',16);
		$this->Cell(150,8,'FICHE DE SUIVIE DES VISITEURS',1,0,'C');
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

$colone=array(10,10,10,70,60,40,80);
$pdf->SetFont('Times','B',12.5); 
$pdf->SetFillColor(193,229,252);

$pdf->cell($colone[0],10,'#',1,0,'C',true);
$pdf->cell($colone[1],10,'ID',1,0,'C',true);
$pdf->cell($colone[2],10,'IDU',1,0,'C',true);
$pdf->cell($colone[3],10,'TITRE',1,0,'C',true);
$pdf->cell($colone[4],10,'USERS',1,0,'C',true);
$pdf->cell($colone[5],10,'DATE',1,0,'C',true);
$pdf->cell($colone[6],10,'MOTIF DE LA CONSULTATION',1,1,'C',true);


$pdf->SetFont('Times','',12); 
$pdf->SetFillColor(235,236,236);
$fill=false;
foreach ($donnees as $key => $donnee){
	$pdf->cell($colone[0],7,$key+1,1,0,'L',$fill);
	$pdf->cell($colone[1],7,$donnee['idLivre'],1,0,'L',$fill);
	$pdf->cell($colone[2],7,$donnee['idUser'],1,0,'L',$fill);
	$pdf->cell($colone[3],7,$donnee['titre'],1,0,'L',$fill);
	$pdf->cell($colone[4],7,$donnee['prenom'].' '.$donnee['nom'],1,0,'L',$fill);
	$pdf->cell($colone[5],7,$donnee['dateConsul'],1,0,'L',$fill);
	$pdf->cell($colone[6],7,$donnee['motifConsult'],1,1,'L',$fill);
	
}


$pdf->Output();
?>