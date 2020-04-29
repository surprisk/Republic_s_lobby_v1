<?php
	include '../bddAccess.php';
	$applications = mysqli_query($bdd, "SELECT * FROM applications where applicationVisibility=False AND applicationArchive=False;");
	while($tab = mysqli_fetch_assoc($applications)){
		$applicationId= $tab['applicationId'];
		$delAll= mysqli_query($bdd, "DELETE FROM applications WHERE applicationId=$applicationId");
	}
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>