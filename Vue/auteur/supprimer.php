<form method="post" action="Controleur/supprimer.php">
<fieldset>
<legend> Supprimer </legend>
<?php
		include_once('Modele/fonctions.php');
	?>
	<p>Matricule <select name="matricule">
	<?php
	$liste=getEtudiants();
	foreach($liste as $key=>$element)
	{
		echo '<option value='.$element['matricule'].'>'.$element['matricule'].'</option>';
	}
   ?>
   <input type="submit" value="Supprimer" name="supprimer">
</fieldset>
	<fieldset>
		<legend>INFORMATION</legend>
	<?php
		if (isset($_SESSION['Erreur']))
		{
			echo $_SESSION['Erreur'];
		}	
	?>
	</fieldset>