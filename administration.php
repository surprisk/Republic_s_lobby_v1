<?php 
	session_start();
	include 'php/bddAccess.php';
	if(!isset($_SESSION['userName']) || $_SESSION['userType'] > 1){
		header('Location: connexion.php');
	}
	else{
		include 'php/accueil.php';
	}
?>
