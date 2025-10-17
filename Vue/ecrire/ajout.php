<?php
    session_start();
	include("../../controleur/livre/liste.php");
	include("../../controleur/auteur/listeE.php");
?>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"> 
        <title>CredelFouta.com</title>
        <link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
<body>
    <div class="container" >
		<h3 class="display-4 text-center">Assign a book to its author</h3>
        <form class=" my-4 p-3  rounded shadow-sm" style="border-radius:10px;" 
              method="POST" action="../../Controleur/ecrire/ajout.php">
                <div class="alert alert-success">
                <?php
                    if (isset($_SESSION['Erreur']))
                    {
                        echo $_SESSION['Erreur'];
                    }	
                ?> 
                </div>
                <div class="mb-3 ">
                    <label for="identifiant" class="form-label" >Livre</label>
                    <select class="form-control"name="idLivre">
							<option></option>
							<?php foreach($liste as $key => $element){ ?>
								<option value="<?=$element['idLivre']?>"><?=$element['titre'].' '.$element['idLivre']?></option>
							<?php }?>	
					</select>
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label" >Auteur</label>
                    <select class="form-control"name="idAuteur">
						<option></option>
						<?php foreach($listeE as $key => $auteur){ ?>
								<option value="<?=$auteur['idAuteur']?>"><?=$auteur['nomAuteur'].' '.$auteur['prenomAuteur']?></option>
						<?php }?>	
					</select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="../../menu.php">back</a>
                <a href="liste.php"><i>View</i></a>
        </form>   
    </div>
</body>
</html>