<form method="post" action="Controleur/modifier.php">
<fieldset>
<legend> Modification </legend>
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
	</select></p>
	<p>Nom<input type="text" name="nom"></p>
	<p>Prenom<input type="text" name="prenom"></p>
	<p>Telephone<input type="text" name="telephone"></p>
	<p>Sexe<input type="text" name="sexe"></p>
	<p>Date de Naissance<input type="text" name="datenaissance"></p>
	<p>Adresse<input type="text" name="adresse"></p>
	<input type="submit" value="Modification" name="modification">
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