<?php
	include 'bddId.php';
	$bdd=mysqli_connect($bddIp, $bddLogin, $bddPassword, $bddName);
	if(!$bdd){
		echo 'ca marche pas';
	}
?>