<?php include_once('../../Controleur/consultation/liste.php'); ?>
<head>
	<title>CredelFouta.com</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
</head>
<body on>
	<div class="container">
	   <div class="col-md-12 bg-light mt-2 rounded"> 
			<h1 class=" text-primary p-2">Consultation des documents&nbsp&nbsp
				<a class="navbar-brand" href="../../Vue/accueil/index.php">back</a>
			</h1> 
		</div>
		<nav class="navbar navbar-light bg-light justify-content-between">
			<a class="navbar-brand">Faites votre recherche</a>
				<form class="form-inline" action="" method="POST">
					<input class="form-control mr-sm-2" type="search" name="searche" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php
						if (!empty($_POST['searche'])) {
						   echo "Actualiser";
						}else {
							echo "Search";
						} 
					?></button>
				</form>
		</nav>
		<form method="POST" action="" onmousedown="return false" onselectstart="return false">	
			<!--<input type="text" class="form-control" 
							placeholder="Motif de la consultation"
							name="motifConsultation" required>-->
			<table class="table table-hover table-light table-striped" id="table-data">
				<div class="row rounded">
					<?php foreach ($liste as $key => $element)
					{   $_SESSION['idlivre']=$element['idLivre'];					 
						global $idlivre;?>
						<td >
							<div class="card" style="width: 15rem;">
								<div class="card-img-top">
									<a href="">
										<img src="<?=$element['pageGarde']?>" alt="<?=$element['pageGarde']?>" 
											style="width:100%;" 
											class="img-thumbnail rounded float-left">
									</a> 
									<h5 class="card-title"><?=$element['titre']?></h5>
									<h5 class="card-title"><?=$element['nomAuteur'].' '.$element['prenomAuteur']?></h5>
									<a href="../../Vue/consultation/ajout.php?id=<?=$element['idLivre']?>
									&document=<?=$element['document']?>" class="btn btn-primary">consulter</a>
								</div>
							</div>
						</td> <?php 
					}?> 
				</div>
			</table>
		<form>
	</div>
</body>