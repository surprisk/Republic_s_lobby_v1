<?php
	include 'bddAccess.php';
	session_start();
	session_unset();
	session_destroy();
	header ('Location: ../connexion.php');
?>