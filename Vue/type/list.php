    <?php include_once('../../Controleur/type/liste.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css">
        <title>CredelFouta.com</title>
        <link rel="stylesheet" href="../Salle/css/style.css">
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    </head>
    <main class="container">
            <div >
            <div class=" my-4 p-3  rounded shadow-sm">
                <div class="m-2">
                <h3 class="border-bottom pb-2 mb-0" style="color: rgb(29, 27, 30)">list of Types</h3>
                <a href="../../menu.php" class="primary">Log out</a>
                <div class="d-flex justify-content-between mb-1">
                    <div>
						<a href="ajout.php" class="btn btn-primary">New</a>
						<a href="stastique.php" class="btn btn-outline-primary">Statistique</a>
					</div>
                </div> 
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <table class="table table-sm table-striped table-hover" >
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOM TYPE</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                        <?php foreach ($liste as $key => $element) {
                        ?>
                            <tr >
                                <td><?=$key+=1;?></td>
                                <td><?=$element['idType']?></td>
                                <td><?=$element['nomType']?></td>
                                <td>
                                    <a  href="" class="btn btn-outline-info">Modifié</a>
                                    <a  class="btn btn-outline-danger" onclick="">Delete</a>
                                    <form id="" action="" method="post"> 
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </td><?php } ?>
                            </tr>
                        </table>
                    </nav>
            </div>
           </div>
    </main>
        