<?php
    session_start();
?>
   <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
        <title>CredelFouta.com</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
<body>
    <div class="container" style="background: ">
        <h2 class="display-4 text-center" style="color:">Gestion des Livres</h2>
        <form class=" my-4 p-3  rounded shadow-sm" 
                style="width: 65% border-radius: 10px width: 500px" 
                method= "POST" action="../../Controleur/livre/ajout.php"
                enctype="multipart/form-data">
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
                    Identifiant <input type="number" class="form-control" placeholder="identifiant" name="id" required>
                </div>
                <div class="col">
				   Etagère
                   <select type="text" class="form-control" name="idEtagere" required placeholder="Identifiant" required>
					<option></option>
					<?php 
					include_once('../../Controleur/etagere/liste.php');
						foreach ($liste as $key => $element) {?>	
					<option value="<?=$element['idEtagere']?>"><?=$element['nomEtagere']?></option>
					<?php }?>
				</select>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    Maison d'édition<input type="text" class="form-control" placeholder="maison d'edition" name="maisonEdition" required> 
                </div>
                <div class="col">
                    Date publication <input type="date" class="form-control" placeholder="Date publication" name="datePub" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    Date de Réception<input type="date" class="form-control" placeholder="date de reception" name="dateEntree"required>
                </div>
                <div class="col">
                    Titre du livre<input type="text" class="form-control" placeholder="Titre du livre" name="titre" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    Code Livre<input type="text" class="form-control" placeholder="code livre"name="codeLivre" required>
                </div>
                <div class="col">
                    telechargement<select class="custom-select" id="inputGroupSelect01" required name="telech">
                        <option selected >Telechargeable</option>
                        <option value="1" name="sexe">OUI</option>
                        <option value="0" name="sexe">NON</option>
                    </select>
                </div>   
            </div>
            <div class="form-row">
				<div class="col">
                   Page de Garde<input class="form-control" type="file" name="pageGarde">
                </div>
                <div class="col">
                   Document<input class="form-control" type="file" name="document">
                </div>
                <div class="col">
                    Nombre Exemplaire<input type="text" class="form-control" placeholder="Nombre Exemplaire" name="exemp" required>
                </div>
            </div>
            <div class="form-row">
				<div class="col"><hr>
                    <button type="submit" class="btn btn-primary" name="emvoyer">Submit</button>
					<a href="../../Vue/ecrire/ajout.php" class="btn btn-primary">affecter</a>
					<a href="../../menu.php">back</a>
					<a href="liste.php"><i>View</i></a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
