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
    <title>CredelFouta.com</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container" >
    <h3 class="display-4 text-center">Create</h3>
        <form class=" my-4 p-3  rounded shadow-sm" style="border-radius: 10px;" 
            method="POST" action="../../Controleur/salle/ajout.php">
            <div class="alert alert-success">
            <?php
                if (isset($_SESSION['Erreur']))
                {
                    echo $_SESSION['Erreur'];
                }	
            ?> 
            </div>
            <div class="mb-3 ">
                <label for="identifiant" class="form-label" >Identifiant</label>
                <input type="number" class="form-control" name="idSalle" required placeholder="Identifiant de la salle">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label" >Nom Salle</label>
                <input type="text" class="form-control" name="nom" placeholder="Nom de la salle" required>
            </div>
            <div class="mb-3">
                <label for="nombre Rayon" class="form-label" >Nombre de Rayon</label>
                <input type="number" class="form-control" name="NombreRayon" placeholder="Nombre de rayon" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="../../menu.php">Log out</a>
            <a href="liste.php"><i>View</i></a>
        </form>   
    </div>
</body>
</html>