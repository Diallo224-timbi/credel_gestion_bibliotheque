<?php
    session_start();?>
   <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" 
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <title>CredelFouta.com</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
<body style="background">
    <div class="container" style="width: 18rem; background:">
        <form class=" my-4 p-1  rounded shadow-sm" style=" border-radius: 10px " >
            <h3 class="display-4 text-center " style="background: ">Connexion</h3>
        </form>
        <form class=" my-4 p-3  rounded shadow-sm" style="border-radius: 10px" 
        method="POST" action="../../Controleur/connexion/connexion.php">  
                    <a href="../utilisateur/ajout.php">Créer un compte</a> 
                    <div class="alert alert-<?php 
                        if (isset($_SESSION['alert'])){
                            echo $_SESSION['alert'] ?>" >
                            <?php  }
                        if (isset($_SESSION['erreur']))
                        {
                            echo $_SESSION['erreur'];
                        }	
                    ?> 
                    </div>
                <div class="mb-3">
                    <label for="nom" class="form-label" >Email ou votre identifiant</label>
                    <input type="text" class="form-control" name="email" placeholder="email ou votre identifiant" required>
                </div>
                <div class="mb-3">
                    <label for="nombre Rayon" class="form-label" >PassWord</label>
                    <input type="password" class="form-control" name="password" placeholder="votre mot de passe" required>
                    <a href="liste.php"><i>Mot de passe oublier</i></a>
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
                <a href="../../deconnexion.php">Exit</a>
				<hr>
        </form> 
        <?php if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['profession'])) {?>
            <div class="position-relative " style="left: 500px; bottom: 470px">
                <div class="card" style="width: 11rem; border-radius: 10px"> 
               <form class=" my-2 p-1  rounded shadow-sm" style=" border-radius: 5px " >
					<h3 class="display-5 text-center " style="background:">USER</h3>
			   </form>
                    <img src="<?php echo $_SESSION['photo'];?>" 
                        class="card-img-top masthead-avatar mb-2 rounded-circle" style="width: 174px;"
                        alt="<?php echo $_SESSION['photo'];?>">
                    <hr>       
                    <h4 class="card-title"><?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?></h4>
                    <h4 class="card-title" ><?php echo $_SESSION['profession']?> </h4>
					<hr>
                    <a href="../accueil/index.php" class="btn btn-primary">Acceder à la page</a>
                    
                </div> 
            </div> 
        <?php    
     } ?> 
    </div>
</body>

