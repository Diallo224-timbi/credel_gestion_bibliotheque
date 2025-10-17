<?php include_once('../../Controleur/livre/liste.php'); ?>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" 
        integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
        <title>Gestion des Salles</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/x-icon" href="../accueil/assets/favicon.ico" />
    </head>
<body style="display: none"> 
<div >
    <div class="container border">
    <img src="../../image/logo.jpg" alt="akakak">
            <div class="m-2">
                <h3 class="border-bottom pb-2 mb-0" style="color: rgb(29, 27, 30)">TItre du Document</h3>
            </div>
        <?php
            $file='../../dossierLivres/code_civil_de_la_guinee.pdf';
            header('Content-type: application/pdf');
            header('Content Disposition: inline, filename="'.$file.'" ');
            header('Content-Transfert-Encoding:binary');
            header('Accept-Ranges: bytes');
            @readfile($file)

            // $lecture=@fopen($file,'r');
            // echo fread($lecture,filesize($file));
            // fclose($lecture);
            // $output_folder= $file;
            // if (!file_exists($output_folder)) 
            // {
            //     mkdir($output_folder, 0777, true);}
            //     $a= passthru("pdftohtml -f $firstpage -l $lastpage $source_pdf $output_folder/new_html_file_name",$b);
            //     var_dump($a);
        ?>
    </div>
</body>   
