<?php 
session_start();
    if (isset($_POST['email'])) {
        if (isset($_POST['password'])) {
            if (!empty($_POST['email'])) {
                if (!empty($_POST['password'])) {
                    $email=$_POST['email']; $pwd=$_POST['password'];
                    include_once('../../Modele/connexion.php');
                    global $connexion;
                    $requete = $connexion->prepare("SELECT *FROM user WHERE(email=?)");
                    $requete->execute([$email]);
                    if($requete){
                        if ($requete->rowCount() === 1) {
                            $liste=$requete->fetch();
                            $user_id=$liste['idUser'];
                            $user_email=$liste['email'];
                            $user_pwd=$liste['PASSWORDe'];
                            $user_photo=$liste['photo']; 
                            $user_nom=$liste['nom']; 
                            $user_prenom=$liste['prenom']; 
                            $user_profession=$liste['profession'];
                            $user_statut=$liste['statut'];
                            $user_etat=$liste['etat'];
                            if ($email=$user_email) {
                                if (MD5($pwd)=== $user_pwd) {
                                    $_SESSION['user_id']=$user_id;
                                    $_SESSION['user_email']=$user_email;
                                    $_SESSION['user_pwd']=$user_pwd;
                                    $_SESSION['photo']=$user_photo;
                                    $_SESSION['nom']=$user_nom;
                                    $_SESSION['prenom']=$user_prenom;
                                    $_SESSION['profession']=$user_profession;
                                   if ($user_statut) {
                                        if (($user_statut === "admin")&&($user_etat !=0)) {
                                            $_SESSION['alert']="success";
                                            $_SESSION['erreur']="Connexion reussi avec success";
                                            header('location: ../../menu.php');
                                        }elseif(($user_etat !=0) && ($user_statut!="admin")) {
                                            $_SESSION['alert']="success";
                                            $_SESSION['erreur']="Connexion reussi avec success";
                                            header('location: ../../Vue/connexion/connexion.php');
                                        }else{
											header('location: ../../deconnexion1.php');
										}
                                   }  
                                }else {
                                    $_SESSION['alert']="warning";
                                    $_SESSION['erreur']="mot de passe est incorect";
                                    echo $_SESSION['erreur'];
                                    header('location: ../../Vue/connexion/connexion.php'); 
                                }
                            }else {
                                $_SESSION['alert']="warning";
                                $_SESSION['erreur']="ce compte n'existe pas";
                                header('location: ../../Vue/connexion/connexion.php');
                            }
                        }else {
                            $_SESSION['alert']="warning";
                            $_SESSION['erreur']="information incorect";
                            header('location: ../../Vue/connexion/connexion.php');
                        }
                    }
                    
                }else {
                    $_SESSION['alert']="warning";
                    $_SESSION['erreur']="veuillez remplir votre mot de passe";
                    header('location: ../../Vue/connexion/connexion.php');
                }
            }else {
                $_SESSION['alert']="warning";
                $_SESSION['erreur']="veuillez remplir votre adresse email";
                header('location: ../../Vue/connexion/connexion.php');
            }
            
        }else {
            $_SESSION['alert']="warning";
            $_SESSION['erreur']='erreur sur variable password';
            header('location: ../../Vue/connexion/connexion.php');
        }
        
    }else {
        $_SESSION['alert']="warning";
        $_SESSION['erreur']='erreur sur variable email';
        header('location: ../../Vue/connexion/connexion.php');
    }
?>