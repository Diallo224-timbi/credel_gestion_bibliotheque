<?php
    session_start();
	include_once('../../Controleur/salle/liste.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
    <title>CredelFouta.com</title>
    <link rel="stylesheet" href="../Salle/css/style.css">
	<link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
</head>
<body>
    <div class="container" >
    <h3 class="display-4 text-center">Gestion Rayon </h3>
        <form class=" rounded shadow-sm" style="border-radius: 10px;" 
            method="POST" action="../../Controleur/rayon/ajout.php">
            <div class="alert alert-success">
            <?php
                if (isset($_SESSION['Erreur']))
                {
                    echo $_SESSION['Erreur'];
					unset($_SESSION['Erreur']);
                }	
            ?> 
            </div>
            <div class="form-row"">
                <label for="identifiant" class="form-label" >Identifiant</label>
                <input type="number" class="form-control" name="idRayon" required placeholder="Identifiant">
            </div>
			<div class="form-row" ">
                <label for="identifiant" class="form-label" >Id Salle</label>
                <select type="text" class="form-control" name="idSalle" required placeholder="Identifiant">
					<option></option>
					<?php 
						foreach ($liste as $key => $element) {?>	
					<option value="<?=$element['idSalle']?>"><?=$element['nomSalle']?></option>
					<?php }?>
				</select>
            </div>
			<div class="form-row" ">
                <label for="identifiant" class="form-label" >Type</label>
                <select type="text" class="form-control" name="idType" required placeholder="Identifiant">
					<option></option>
					<?php 
					include_once('../../Controleur/type/liste.php');
						foreach ($liste as $key => $element) {?>	
					<option value="<?=$element['idType']?>"><?=$element['nomType']?></option>
					<?php }?>
				</select>
            </div>
            <div class="form-row"">
                <label for="nom" class="form-label" >Nom Rayon</label>
                <input type="text" class="form-control" name="rayon" placeholder="Nom" required>
            </div>
			<div class="form-row"">
                <label for="nom" class="form-label" >Capacité</label>
                <input type="number" class="form-control" name="capacite" placeholder="Capacité" required>
            </div>
			<div class="form-row"">
                <label for="nom" class="form-label" >Nombre Etagere</label>
                <input type="number" class="form-control" name="etagere" placeholder="Nombre d'etagère" required>
            </div>
			<hr>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="../../menu.php">Log out</a>
            <a href="list.php"><i>View</i></a>
        </form>   
    </div>
</body>
</html>