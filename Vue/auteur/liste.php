    <?php include_once('../../Controleur/auteur/liste.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" 
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <title>Gestion des Salles</title>
        <link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
    <main class="container">
        <div class=" my-4 p-3  rounded shadow-sm">
            <h3 class="border-bottom pb-2 mb-0" style="color: rgb(29, 27, 30)">list of Salle</h3>
            <a href="../../menu.php" class="primary">Log out</a>
			<div class="d-flex justify-content-between mb-1">
				<div><a href="ajout.php" class="btn btn-primary">New Salle</a></div>
			</div> 
				<nav class="navbar navbar-expand-sm navbar-light">
					<table class="table table-sm" >
						<thead class="thead-dark">
							<tr>
								<th scope="col">N°</th>
								<th scope="col">ID</th>
								<th scope="col">NOM ET PRENOMS</th>
								<th scope="col">NE LE</th>
								<th scope="col">NATIONALITE</th>
								<th scope="col">PROFESSION</th>
								<th scope="col" colspan="2"></th>
							</tr>
						</thead>
					<?php foreach ($liste as $key => $element) {
					?>
						<tr >
							<td><?=$key+=1;?></td>
							<td><?=$element['idAuteur']?></td>
							<td><?=$element['nomlAuteur'].' '.$element['prenomAuteur']?></td>
							<td><?=$element['dateNais'].' à '.$element['lieuNais']?></td>
							<td><?=$element['nationalite']?></td>
							<td><?=$element['profession']?></td>
							<td><a  href="" class="btn btn-outline-info"> Update</a></td>
							<td><a  class="btn btn-outline-danger" >Delete</a></td>
						</tr><?php } ?>
					</table>
				</nav>
           </div>
    </main>
        