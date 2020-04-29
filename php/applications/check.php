<?php
	session_start();
	include '../bddAccess.php';
	
	$check=intval($_POST['check']);
	
	$checkItem= mysqli_query($bdd, "UPDATE applications SET applicationVisibility = False, userId = ".$_SESSION['userId'].", applicationStatut = 'Validée' WHERE applicationId = $check;");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>