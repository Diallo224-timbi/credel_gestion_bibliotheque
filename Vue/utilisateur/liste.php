<?php include_once('../../Controleur/utilisateur/liste.php');
session_start(); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Gestion des Salles</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
<body>
    <main class="my-1 p-1 rounded shadow-sm">
            <div>
				<h3 class="border-bottom pb-2 mb-0" style="color: rgb(29, 27, 30)">list of User</h3>
				<a href="../../menu.php" class="primary">back</a>
                <div class="d-flex justify-content-between mb-1">
                    <div>
						<a href="ajout.php" class="btn btn-primary">New User</a>
						<a href="../affichage/fiche.php" class="btn btn-outline-primary">Fiche</a>
					</div>
					<form class="form-inline" action="" method="POST">
						<strong class="text-primary">Faites votre recherche</strong>
						<input class="form-control mr-sm-2" type="search" name="searche" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php
							if (!empty($_POST['searche'])) {
							   echo "Actualiser";
							}else {
								echo "Search";
							} 
						?></button>
					</form>
                </div>
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="table-responsive">
						<table class="table table-sm table-striped table-hover" >
							<thead class="thead-dark">
								<tr>
									<th scope="col">N°</th>
									<th scope="col">ID</th>
									<th scope="col">NOM</th>
									<th scope="col">PRENOM</th>
									<th scope="col">SEXE</th>
									<th scope="col">DATE DE NAISSANCE</th>
									<th scope="col">LIEU DE NAISSANCE</th>
									<th scope="col">ADRESSE</th>
									<th scope="col">NATIONALITE</th>
									<th scope="col">PROFESSION</th>
									<th scope="col">EMAIL</th>
									<th scope="col">PHOTO</th>
									<th scope="col">PIECE</th>
									<th scope="col">ETAT</th>
									<th scope="col" colspan="2"></th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($liste as $key => $element) {
							?>
								<tr class="center">
									<td><?=$key+=1;?></td>
									<td><?=$element['idUser']?></td>
									<td><?=$element['nom']?></td>
									<td><?=$element['prenom']?></td>
									<td><?=$element['sexe']?></td>
									<td><?=$element['dateNais']?></td>
									<td><?=$element['lieuNais']?></td>
									<td><?=$element['adresse']?></td>
									<td><?=$element['nationalite']?></td>
									<td><?=$element['profession']?></td>
									<td><?=$element['email']?></td>
									<td><a href="<?=$element['photo']?>"><img src="<?=$element['photo']?>" alt="<?=$element['photo']?>" style="width: 50px;"></a></td>
									<td><a href="<?=$element['pieceIdentite']?>">PI<?=$element['idUser']?></a></td>
									<td><?php 
										if($element['etat']){?>
											<input type="checkbox" class="title-success" checked="checked" onClick="return false;">activé</input><?php }
										else{?>
											<input type="checkbox" class="btn btn-info" onClick="return false;">Desactivé</input><?php
										}
										?>
									</td>
									<td>
										<a href="update.php?id=<?=$element['idUser']?>" class="btn btn-outline-info">Modifié</a>
									</td>
									<td>
									<a class="btn btn-outline-danger" onclick="if(confirm('voulez vous vraiment supprimer'))"> Delete</a>
										<form id="" action="" method="post">
											<input type="hidden" name="_method" value="delete">
										</form>
									</td>
								</tr><?php } ?>
							</tbody>
                        </table>
                        </nav>
                    </div>          
                </div>
        </div>
    </main>
</body>