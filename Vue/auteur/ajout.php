<?php
    session_start();
?>
   <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" 
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <title>Gestion des Utilisateurs</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
<body>
    <div class="container" >
        <h3 class="display-4 text-center">GESTION DES AUTEURS</h3>
        <form class=" my-4 p-3  rounded shadow-sm" 
                style="width: 65% border-radius: 10px width: 500px" 
                enctype="multipart/form-data" 
                method= "POST" action="../../Controleur/auteur/ajout.php">
                <div class="alert alert-info">
                <?php
                    if (isset($_SESSION['Erreur']))
                    {
                        echo $_SESSION['Erreur'];
                    }	
                ?> 
                </div>
            <div class="form-row">
                <div class="col">
                    Identifiant<input type="number" class="form-control" placeholder="identifiant" name="id" >
                </div>
                <div class="col">
                    Nom<input type="text" class="form-control" placeholder="First name" name="nom" >
                </div>
                <div class="col">
                    Prénoms<input type="text" class="form-control" placeholder="Last name" name="prenom" >
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    Date de naissance<input type="Date" class="form-control" placeholder="Date de Naissance" name="dateNaissance" > 
                </div>
                <div class="col">
                    Lieu de naissance<input type="text" class="form-control" placeholder="Lieu de Naissance" name="lieunaissance" >
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    Profession<input type="text" class="form-control" placeholder="Profession"name="profession" >
                </div>
                <div class="col">
                    Nationalité<input type="text" class="form-control" placeholder="Nationalité" name="nationnalite" >
                </div>
            </div>
			<hr>
            <div class="form-group">
               <div> 
               <button type="submit" class="btn btn-primary" name="emvoyer">Submit</button>
                    <a href="../../menu.php">Log out</a>
                    <a href="liste.php"><i>View</i></a>
               </div>
            </div>
        </form>
    </div>
</body>
</html>
