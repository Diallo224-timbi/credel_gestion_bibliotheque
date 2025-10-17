<?php
	session_start();
    session_destroy();
    header("Location: Vue/connexion/connexion.php");
    exit();
?>