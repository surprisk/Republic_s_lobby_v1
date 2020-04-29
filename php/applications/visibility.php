<?php
	include '../bddAccess.php';
	
	$visibility=intval($_POST['visibility']);
	$visibilityItem= mysqli_query($bdd, "SELECT applicationVisibility FROM applications WHERE applicationId=$visibility AND applicationVisibility=False;");
	
	if(mysqli_num_rows($visibilityItem) == 0){
		mysqli_query($bdd, "UPDATE applications SET applicationVisibility = False WHERE applicationId =$visibility;");
	}
	else{
		mysqli_query($bdd, "UPDATE applications SET applicationVisibility = True, applicationStatut='En cours de traitement' WHERE applicationId =$visibility;");
	}
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>