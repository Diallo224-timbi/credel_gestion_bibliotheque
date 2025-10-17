<?php
session_start();
    include_once('../../Modele/fonctions.php'); $GLOBALS['consulter']="";
    if (isset($_POST['idLivre'])) {
        if (isset($_POST['idUser'])) {
           if (isset($_POST['motif'])) {
                $consultation=setConsultation();
                if ($consultation) {
					if(isset($_POST['motif1'])){
						if(isset($_POST['motif2'])){
							$_SESSION['document']=$_POST['motif1'];
						}
					}
					$_SESSION['consulter']="consulter";
				   header('location:../../Vue/consultation/ajout.php');
                }else {
                    echo 'echec insertion ';
                }
           }else {
            echo 'veuillez donner votre motif';
           }
        }else {
            echo 'erreur sur motif consultation';
        }
       
    }else {
        echo 'erreur sur idlivre'; 
    }
?>