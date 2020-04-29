<?php
	session_start();
	include '../bddAccess.php';
	
	$promouvoir=intval($_POST['promouvoir']);
	
	$promouvoirItem= mysqli_query($bdd, "UPDATE applications SET applicationVisibility = False, userId = ".$_SESSION['userId'].", applicationStatut = 'Promu' WHERE applicationId = $promouvoir;");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>