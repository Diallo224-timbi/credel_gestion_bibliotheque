    <?php include_once('../../Controleur/salle/liste.php'); ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" 
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <title>Gestion des Salles</title>
        <link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    </head>
    <main class="container">
            <div >
            <div class=" my-4 p-3  rounded shadow-sm">
                <div class="m-2">
                <h3 class="border-bottom pb-2 mb-0" style="color: rgb(29, 27, 30)">list of Salle</h3>
                <a href="../../menu.php" class="primary">Log out</a>
                <div class="d-flex justify-content-between mb-1">
                    <div><a href="ajout.php" class="btn btn-primary">New Salle</a></div>
                </div> 
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <table class="table table-sm" >
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">IDENTIFIANT</th>
                                    <th scope="col">SALLE</th>
                                    <th scope="col">NOMBRE DE RAYON</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                        <?php foreach ($liste as $key => $element) {
                        ?>
                            <tr >
                                <td><?=$key+=1;?></td>
                                <td><?=$element['idSalle']?></td>
                                <td><?=$element['nomSalle']?></td>
                                <td><?=$element['nbreRayon']?></td>
                                <td>
                                    <a  href="" class="btn btn-outline-info"> Update</a>
                                    <a  class="btn btn-outline-danger" onclick="if(confirm('voulez vous vraiment supprimer {{$produit->designation}}?')){document.getElementById('form-{{$produit->id}}').submit() }"> Delete</a>
                                    <form id="form-{{$produit->id}}" action="{{route('produit.delete',['produit'=>$produit->id])}}" method="post"> 
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </td>
                            </tr><?php } ?>
                        </table>
                    </nav>
            </div>
           </div>
    </main>
        