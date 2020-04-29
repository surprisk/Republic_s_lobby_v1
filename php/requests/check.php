<?php
	session_start();
	include '../bddAccess.php';
	
	$check=intval($_POST['check']);
	
	$checkItem= mysqli_query($bdd, "UPDATE requests SET requestVisibility = False, userId = ".$_SESSION['userId'].", requestStatut='Requête fermée' WHERE requestId = $check;");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>