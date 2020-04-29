<?php
	include '../bddAccess.php';
	
	$visibility=intval($_POST['visibility']);
	$visibilityItem= mysqli_query($bdd, "SELECT requestVisibility FROM requests WHERE requestId=$visibility AND requestVisibility=False;");
	
	if(mysqli_num_rows($visibilityItem) == 0){
		mysqli_query($bdd, "UPDATE requests SET requestVisibility = False WHERE requestId =$visibility;");
	}
	else{
		mysqli_query($bdd, "UPDATE requests SET requestVisibility = True, requestStatut='En cours de traitement' WHERE requestId =$visibility;");
	}
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>