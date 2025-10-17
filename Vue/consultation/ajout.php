<?php include_once('../../Controleur/consultation/liste.php');
session_start();
 ?>
 <html>
    <head>
        <title>CredelFouta.com</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
    <body>
		<div class="container" style="width: 20rem; background:">
			<form class=" my-4 p-3  rounded shadow-sm" style="border-radius: 10px" 
              method="POST" action="../../Controleur/consultation/action.php">
                <div class="mb-3 ">
                    <label for="identifiant" class="form-label" >IdLivre</label>
                    <input class="form-control" name="idLivre" value="<?php 
						if(isset($_GET['id'])){
							echo $_GET['id'];
						}
					?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label" >IdUser</label>
                    <input class="form-control" name="idUser" value="<?php
						if(isset($_SESSION['user_id'])){
							echo $_SESSION['user_id'];
						}
					?>" readonly >
                </div>
                <div class="mb-3">
                    <label for="nombre Rayon" class="form-label" >Motif Consultation</label>
                    <input class="form-control" name="motif" required>
                </div>
				  <div class="mb-3">
                    <input type="submit"class="btn btn-primary" value="Ouvrir">
					<input type="hidden" class="form-control" name="motif1"  value="<?php 
						if(isset($_GET['document'])){
							echo $_GET['document'];
							$_SESSION['document']="";
						}
					?>" ></input>
					<input type="hidden" class="form-control" name="motif2" value="<?php
						if(isset($_SESSION['document'])){
							echo $_SESSION['document'];
							$_POST['motif2']=$_SESSION['document'];
						}
					?>"></input>
					<a href="<?php if(isset($_POST['motif2'])){
							echo $_POST['motif2'];
							$_SESSION['document']="";
						}?>" class="btn btn-primary"><?php 
							if(isset($_SESSION['consulter'])){
								echo $_SESSION['consulter'];
								unset($_SESSION['consulter']);
							}
						?></a>
					<a href="consultation.php">Retour</a>
                </div>
			</form>
		</div>
    </body>
</html>