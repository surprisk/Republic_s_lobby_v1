<?php
	session_start();
	include '../bddAccess.php';
	
	$uncheck=intval($_POST['uncheck']);
	
	$uncheckItem= mysqli_query($bdd, "UPDATE applications SET applicationVisibility = False, userId = ".$_SESSION['userId'].", applicationStatut = 'Refusée' WHERE applicationId = $uncheck;");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>