<?php 
session_start(); 
include_once('../../Controleur/livre/liste.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
        <title>CredelFouta.com</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico"/>
    </head>
<body>
    <nav class="my-1 p-1 rounded shadow-sm" aria-label="Page navigation example">
		<div>
			
			<h3 class="border-bottom pb-2 mb-0" style="color: rgb(29, 27, 30)">
				<i class="alert alert-info">
                <?php
                    if(isset($_SESSION['Erreur']))
                    {
                        echo $_SESSION['Erreur'];
						//unset($_SESSION['Erreur']);
                    }	
                ?> 
                </i>
			list of Documents</h3>
				<a href="../../menu.php" class="primary">back</a>
			<div class="d-flex justify-content-between mb-1 ">
				<div>
					<a href="ajout.php" class="btn btn-primary">New Document</a>
					<a href="../affichage/cathalogue.php" class="btn btn-outline-primary">Cathalogue</a>
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
			<div class="table-responsive" >
					<table class="table table-sm table-striped table-hover" style="overflow-x:scroll">
						<thead class="thead-dark ">
							<tr>
								<th scope="col">#</th>
								<th scope="col">ID</th>
								<th scope="col">ETAGERE</th>
								<th scope="col">TITRE</th>
								<th scope="col" style="width:10%;">MAISON EDITION</th>
								<th scope="col" style="width:10%;">DATE PUBLICATION</th>
								<th scope="col" style="width:10%;">DATE DE RECEPTION</th>
								<th scope="col" style="width:5%;">CODE LIVRE</th>
								<th scope="col" style="width:1%;">OUVERT</th>
								<th scope="col">EXEMP<BR>LAIRE</th>
								<th scope="col" colspan=2>ACTION</th>
							</tr>
						</thead>
					<tbody>
					<?php foreach ($liste as $key => $element) {
					?>
						<tr height="1px">
							<td><?php echo $key+=1;?></td>
							<td><?=$element ['idLivre']?></td>
							<td><?=$element ['idEtagere']?></td>
							<td><a href="<?=$element ['document']?>"><?=$element ['titre']?></a></td>
							<td><?=$element ['maisonEdition']?></td>
							<td><?=$element ['datePub']?></td>
							<td><?=$element ['dateEntree']?></td>
							<td><?=$element ['codeLiv']?></td>
							<td><?php 
								if($element['telechargeable'] != 1){
									echo "Non";
								}else{
									echo "Oui";
								}
							?></td>
							<td><?=$element ['nbreExemplaire']?></td>
							<td><a href="<?=$element['pageGarde']?>"><img src="<?=$element['pageGarde']?>" alt="<?=$element['pageGarde']?>" style="width: 30px;"></a></td>
							<td>
								<a  href="update.php?id=<?=$element['idLivre']?>" class="btn btn-outline-info">Modifié</a>
							</td>
							<td>
								<a href="../../controleur/livre/delete.php?id=<?=$element['idLivre']?>" class="btn btn-outline-danger">Delete</a>
							</td>
						</tr><?php } ?>
					</tbody>
				</table>
				</nav>
			</div>          
		</div>
   </nav>
</body>       