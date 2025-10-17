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
    <link rel="stylesheet" href="../Salle/css/style.css">
	<link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
</head>
<body>
    <div class="container" >
    <h3 class="display-4 text-center">ETAGERE</h3>
        <form class=" my-4 p-3  rounded shadow-sm" style="border-radius: 10px;" 
            method="POST" action="../../Controleur/etagere/ajout.php">
            <div class="alert alert-<?php if(isset($_SESSION['alert'])){echo $_SESSION['alert']; }?>">
            <?php
                if (isset($_SESSION['Erreur']))
                {
                    echo $_SESSION['Erreur'];
					unset($_SESSION['Erreur']);
                }	
            ?> 
            </div>
            <div class="mb-3 ">
                <label for="identifiant" class="form-label">Identifiant</label>
                <input type="number" class="form-control" name="idEtagere" required placeholder="Identifiant">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label" >LIBELLE</label>
                <input type="text" class="form-control" name="nomEtagere" placeholder="Nom Etagère" required>
            </div>
			<div class="mb-3">
                <label for="nom" class="form-label">RAYON</label>
				<select type="" name="rayon" class="form-control" >
					<option></option>
					<?php 
					include_once('../../Controleur/rayon/liste.php');
						foreach ($liste as $key => $element) {?>	
					<option value="<?=$element['idRayon']?>"><?=$element['nomRayon']?></option>
					<?php }?>
				<select/>
            </div>
			<div class="mb-3">
                <label for="nom" class="form-label" >CAPACITE</label>
                <input type="number" class="form-control" name="type" placeholder="Sa capacité" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="../../menu.php">Log out</a>
            <a href="list.php"><i>View</i></a>
        </form>   
    </div>
</body>
</html>