<?php
	include_once('connexion.php');
	function getSalle()
	{
	//On affiche la liste des Garçon de la table etudiant
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM salle');
		
		//Affichage de chaque entrée une à une
		$liste = $reponse->fetchall();
		return $liste;
		//libere la connexion au serveur afin que d'autre instruction sql puissent etre emis
		$reponse->closeCursors();
	}
	function setSalle()
	{
		global $connexion;
		//requete preparées
		$reponse = $connexion->prepare("INSERT INTO salle (idSalle,idUser,nbreRayon)
										VALUES(:id,:nom,:nombre) ");
		$reponse->execute(array('id'=>$_POST['idSalle'],
								'nom'=>$_POST['nom'],
								'nombre'=>$_POST['NombreRayon'],
								));
		
		return $reponse;
		$reponse->closeCursors();								
	}
	//******************************User****************************
	// ***************************************************************
	function setUsers()
	{
			$photo=$_FILES['photo']; $piece=$_FILES['piece'];
			$filename=$photo['name'];$filenamePiece=$piece['name'];
			$separation=(explode('.',$filename)); $separationP=explode('.',$filenamePiece);
			$exten=strtolower(end($separation)); $extPiece=strtolower(end($separationP));
			$filtemp=$photo['tmp_name'];		$filetmpPie=$piece['tmp_name'];
			$extension=array('png','jpeg','jpg','jfif'); $extensionPiece=array('png','jpeg','jpg','pdf','doc');
			if (in_array($exten,$extension)) 
			{
				$uploadImage="../../images/".$filename;
				if(move_uploaded_file($filtemp,$uploadImage))
				{
					if (in_array($extPiece,$extensionPiece)) 
					{
						$uploadPiece="../../dossierCNI/".$filenamePiece;
						if (move_uploaded_file($filetmpPie,$uploadPiece))
						{
							global $connexion;
							$reponse = $connexion->prepare("INSERT INTO user (
							idUser,nom,prenom,sexe,
							dateNais,lieuNais,adresse,
							nationalite,profession,email,
							PASSWORDe,photo,
							pieceIdentite)
							VALUES(:id,:nom,:p,:s,:d,:l,:adr,:na,:pro,:em,:pwd,:ph,:pid) ");
							$reponse->execute(array('id'=>$_POST['id'],
											'nom'=>$_POST['nom'],
											'p'=>$_POST['prenom'],
											's'=>$_POST['sexe'],
											'd'=>$_POST['dateNaissance'],
											'l'=>$_POST['lieunaissance'],
											'adr'=>$_POST['adresse'],
											'na'=>$_POST['nationalite'],
											'pro'=>$_POST['profession'],
											'em'=>$_POST['email'],
											'pwd'=>md5($_POST['password']),
											'ph'=>$uploadImage,
											'pid'=>$uploadPiece
											));
							return $reponse;
							$reponse->closeCursors();
						}
					}
				}else {
					die(error_clear_last());
				}	
			}
	}
	function getUser()
	{
	//On affiche la liste des Garçon de la table etudiant
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM user');	
		//Affichage de chaque entrée une à une
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	
//*******************Livre************************ */
//*********************************************** */	

	function setLivre()
	{
		$docum=$_FILES['document'];
		$filenamedocum=$docum['name'];
		$separationdoc=explode('.',$filenamedocum);
		$extdocum=strtolower(end($separationdoc));
		$filetmpdocum=$docum['tmp_name'];
		$extensiondocum=array('png','jpeg','jpg','pdf','docx');
		//page de garde
		
		$pageGarde=$_FILES['pageGarde'];
		$filenamePageGarde=$pageGarde['name'];
		$separationPaGarde=explode('.',$filenamePageGarde);
		$extPageGarde=strtolower(end($separationPaGarde));
		$filetmpPageGarde=$pageGarde['tmp_name'];
		$extensionPageGarde=array('png','jpeg','jpg','jfif');
		if (in_array($extPageGarde,$extensionPageGarde)) 
		{
			$uploadImage="../../images/".$filenamePageGarde;
			if(move_uploaded_file($filetmpPageGarde,$uploadImage))
			{
				if (in_array($extdocum,$extensiondocum)) 
				{
					$uploaddocum="../../dossierLivres/".$filenamedocum;
					if (move_uploaded_file($filetmpdocum,$uploaddocum))
					{
						global $connexion;
						$reponse = $connexion->prepare("INSERT INTO livre (
												idLivre,idEtagere,titre,
												maisonEdition,datePub,dateEntree,codeLiv,
												telechargeable,nbreExemplaire,document,pageGarde)
											VALUES(
												:id,:idEt,:titr,:mEd,
												:dPub,:dEnt,:codLiv,
												:okT,:nbEx,:docu,:pg)
											");
						$reponse->execute(array(
								'id'=>$_POST['id'],
								'idEt'=>$_POST['idEtagere'],
								'titr'=>$_POST['titre'],
								'mEd'=>$_POST['maisonEdition'],
								'dPub'=>$_POST['datePub'],
								'dEnt'=>$_POST['dateEntree'],
								'codLiv'=>$_POST['codeLivre'],
								'okT'=>$_POST['telech'],
								'nbEx'=>$_POST['exemp'],
								'docu'=>$uploaddocum,
								'pg'=>$uploadImage
								));
						return $reponse;
						$reponse->closeCursors();
					}
				}else {
					$_SESSION['erreur']="ce type de fichier n'existe pas veuillez choisir un fichier pdf ou image ";
				}
			}
		}						
	}
	
	function getLivre()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM livre');	
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	function getLivreEcrite()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT auteur.idAuteur,livre.idLivre,auteur.nomAuteur, 
											auteur.prenomAuteur,livre.titre,livre.document,pageGarde
										FROM ecrire JOIN
										     auteur JOIN
										     livre
										ON
										((ecrire.idLivre = livre.idLivre) AND(
											ecrire.idAuteur = auteur.idAuteur
										))
										GROUP BY auteur.idAuteur,livre.idLivre,auteur.nomAuteur, 
										auteur.prenomAuteur,livre.titre,livre.document'
		);	
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	function getLivreSearch($titre)
	{
		global $connexion;
		$reponse = $connexion->query('SELECT auteur.idAuteur,livre.idLivre,auteur.nomAuteur, 
											auteur.prenomAuteur,livre.titre,livre.document,livre.pageGarde
										FROM ecrire JOIN
										     auteur JOIN
										     livre
										ON
										((ecrire.idLivre = livre.idLivre) AND(
											ecrire.idAuteur = auteur.idAuteur
										)) 
										WHERE livre.titre LIKE CONCAT("%","'.$titre.'","%") 
										GROUP BY auteur.idAuteur,livre.idLivre,auteur.nomAuteur, 
										auteur.prenomAuteur,livre.titre,livre.document'
		);	
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	function getLivreIdSearch($id)
	{
		global $connexion;
		$reponse = $connexion->query('SELECT auteur.idAuteur,livre.idLivre,auteur.nomAuteur, 
											auteur.prenomAuteur,livre.titre,livre.document
										FROM ecrire JOIN
										     auteur JOIN
										     livre
										ON
										((ecrire.idLivre = livre.idLivre) AND(
											ecrire.idAuteur = auteur.idAuteur
										)) 
										WHERE ecrire.idLivre LIKE CONCAT("%","'.$id.'","%") 
										GROUP BY auteur.idAuteur,livre.idLivre,auteur.nomAuteur, 
										auteur.prenomAuteur,livre.titre,livre.document'
		);	
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	function getLivreTitreSearchG($id)
	{
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM livre
										WHERE titre LIKE CONCAT("%","'.$id.'","%") OR 
										idEtagere LIKE CONCAT("%","'.$id.'","%") OR
										maisonEdition LIKE CONCAT("%","'.$id.'","%") OR
										codeLiv LIKE CONCAT("%","'.$id.'","%") OR
										dateEntree LIKE CONCAT("%","'.$id.'","%") OR
										telechargeable LIKE CONCAT("%","'.$id.'","%")
										');	
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
//********************************Consultation */
function setConsultation()
{
	$dt = date('d m Y H:i:s');
	global $connexion;
	//requete preparées
	$reponse = $connexion->prepare("INSERT INTO consulter (idLivre,idUser,dateConsul,motifConsult)
									VALUES(:id,:idUser,:datC,:motif) ");
	$reponse->execute(array('id'=>$_POST['idLivre'],
							'idUser'=>$_POST['idUser'],
							'datC'=>$dt,
							'motif'=>$_POST['motif'],
							));
	return $reponse;
	$reponse->closeCursors();	
	
}
/***************************AUTEUR**************
***********************************************/
function setAuteur()
	{
		global $connexion;
		//requete preparées
		$reponse = $connexion->prepare("INSERT INTO auteur(idAuteur,nomAuteur,prenomAuteur,dateNais,lieuNais,nationalite,profession)
										VALUES(:id,:nom,:prenom,:d,:l,:na,:pro) ");
		$reponse->execute(array('id'=>$_POST['id'],
								'nom'=>$_POST['nom'],
								'prenom'=>$_POST['prenom'],
								'd'=>$_POST['dateNaissance'],
								'l'=>$_POST['lieunaissance'],
								'na'=>$_POST['nationalite'],
								'pro'=>$_POST['profession']
								));
		
		return $reponse;
		$reponse->closeCursors();								
	}
	function getAuteur()
	{
	//On affiche la liste des Garçon de la table etudiant
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM auteur');	
		//Affichage de chaque entrée une à une
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	//****************************ECRIRE*************
	//**********************************************
	function setEcrire()
	{
		global $connexion;
		//requete preparées
		$reponse = $connexion->prepare("INSERT INTO Ecrire (idLivre,idAuteur)
										VALUES(:idl,:ida)");
		$reponse->execute(array('idl'=>$_POST['idLivre'],
								'ida'=>$_POST['idAuteur'],
								));
		
		return $reponse;
		$reponse->closeCursors();								
	}

function getAuteurSearch($id)
	{
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM user
										WHERE idUser LIKE CONCAT("%","'.$id.'","%") OR 
										nom LIKE CONCAT("%","'.$id.'","%") OR
										prenom LIKE CONCAT("%","'.$id.'","%") OR
										sexe LIKE CONCAT("%","'.$id.'","%") OR
										email LIKE CONCAT("%","'.$id.'","%") OR
										dateNais LIKE CONCAT("%","'.$id.'","%") OR
										lieuNais LIKE CONCAT("%","'.$id.'","%") OR
										adresse LIKE CONCAT("%","'.$id.'","%") OR
										nationalite LIKE CONCAT("%","'.$id.'","%") OR
										profession LIKE CONCAT("%","'.$id.'","%")
										');	
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
/**************TYPE********************/
function getTypes()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM type');
		
		//Affichage de chaque entrée une à une
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	function setTypes()
	{
		global $connexion;
		//requete preparées
		$reponse = $connexion->prepare("INSERT INTO type (idType,nomType)
										VALUES(:id,:nom) ");
		$reponse->execute(array('id'=>$_POST['idtype'],
								'nom'=>$_POST['type']
								));
		
		return $reponse;
		$reponse->closeCursors();								
	}
	function getRayon()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT * FROM rayon,type,salle 
									WHERE (rayon.idSalle = salle.idSalle) 
									AND (rayon.idType = type.idType)');
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
/*Rayon************************************/
function setRayon()
	{
		global $connexion;
		$reponse = $connexion->prepare("INSERT INTO rayon(idRayon,idSalle,idType,nomRayon,capacite,nbreEtagere)
										VALUES(:id,:ids,:idT,:nomR,:c,:nE) ");
		$reponse->execute(array('id'=>$_POST['idRayon'],
								'ids'=>$_POST['idSalle'],
								'idT'=>$_POST['idType'],
								'nomR'=>$_POST['rayon'],
								'c'=>$_POST['capacite'],
								'nE'=>$_POST['capacite']
								));
		return $reponse;
		$reponse->closeCursors();								
	}
function getEtagere()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM etagere,rayon WHERE (etagere.idRayon=rayon.idRayon)');
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
function setEtagere()
	{
		global $connexion;
		$reponse = $connexion->prepare("INSERT INTO etagere (idEtagere,idRayon,nomEtagere,capacite)
										VALUES(:id,:idR,:nom,:ca)");
		$reponse->execute(array('id'=>$_POST['idEtagere'],
								'idR'=>$_POST['rayon'],
								'nom'=>$_POST['nomEtagere'],
								'ca'=>$_POST['capacite']
								));
		
		return $reponse;
		$reponse->closeCursors();								
	}
function getCathalogue()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT *FROM
										  ecrire
										JOIN
										  auteur
										ON
										  ecrire.idAuteur = auteur.idAuteur
										JOIN
										  livre
										ON
										  ecrire.idLivre = livre.idLivre
										JOIN
										  etagere
										ON
										  livre.idEtagere = etagere.idEtagere
										JOIN
										  rayon
										ON
										  etagere.idRayon = rayon.idRayon
										JOIN
										  salle
										ON
										  rayon.idSalle = salle.idSalle
										JOIN TYPE
										ON TYPE
										  .idType = rayon.idType ORDER BY type.nomType, livre.titre asc'
									);
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}	
	function getFicheSuivi()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT * FROM `consulter`JOIN livre
										ON
										consulter.idLivre=livre.idLivre
										JOIN user
										ON
										consulter.idUser=user.idUser');
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
	function getSumType()
	{
		global $connexion;
		$reponse = $connexion->query('SELECT  sum(livre.nbreExemplaire) as somme, type.nomType FROM
										  ecrire
										JOIN
										  auteur
										ON
										  ecrire.idAuteur = auteur.idAuteur
										JOIN
										  livre
										ON
										  ecrire.idLivre = livre.idLivre
										JOIN
										  etagere
										ON
										  livre.idEtagere = etagere.idEtagere
										JOIN
										  rayon
										ON
										  etagere.idRayon = rayon.idRayon
										JOIN
										  salle
										ON
										  rayon.idSalle = salle.idSalle
										JOIN TYPE
										ON TYPE
										  .idType = rayon.idType 
                                        GROUP BY type.nomType');
		$liste = $reponse->fetchall();
		return $liste;
		$reponse->closeCursors();
	}
//************ETAGERE***********************
	
//*****************UPDATE****************
//=====================================
//************USERS***********************
function getUpdateUser($id)
{
//On affiche la liste des Garçon de la table etudiant
	global $connexion;
	$reponse = $connexion->query('SELECT *FROM user WHERE idUser='.$id.'');	
	//Affichage de chaque entrée une à une
	$liste = $reponse->fetchall();
	return $liste;
	$reponse->closeCursors();
}
function updateUsers($id)
	{
		global $connexion;
		$reponse = $connexion->prepare('UPDATE User SET etat="'.$_POST['etat'].'" WHERE idUser="'.$id.'" ');
		$reponse->execute();
		return $reponse;
		$reponse->closeCursors();
	}

//********** Fonction de modification du Livre **************
function getUpdateLivre($id)
{
//On affiche la liste des Garçon de la table etudiant
	global $connexion;
	$reponse = $connexion->query('SELECT *FROM livre WHERE idLivre='.$id.'');	
	//Affichage de chaque entrée une à une
	$liste = $reponse->fetchall();
	return $liste;
	$reponse->closeCursors();
}
function updateLivre($id)
	{
		global $connexion;
		$reponse = $connexion->prepare(" UPDATE livre 
							SET
								idEtagere=?,
								titre=?,
								maisonEdition=?,
								datePub=?,
								dateEntree=?,
								codeLiv=?,
								telechargeable=?,
								nbreExemplaire=?
							WHERE 
								idLivre='".$id."'
							");
		$reponse->execute(array(
				$_POST['idEtagere'],
				$_POST['titre'],
				$_POST['maisonEdition'],
				$_POST['datePub'],
				$_POST['dateEntree'],
				$_POST['codeLivre'],
				$_POST['telech'],
				$_POST['exemp']
				));
		return $reponse;
		$reponse->closeCursors();					
	}
	
//====================== DELETE =================
//===============================================
function deleteLivre($id)
{
	global $connexion;
	$reponse = $connexion->query('DELETE FROM livre WHERE idLivre='.$id.'');	
	return $reponse;
	$reponse->closeCursors();
}
 ?>