<?php
	include '../bddAccess.php';
	
	$archive=intval($_POST['archive']);
	$archiveItem= mysqli_query($bdd, "SELECT applicationArchive FROM applications WHERE applicationId=$archive AND applicationArchive=False;");
	
	if(mysqli_num_rows($archiveItem) == 0){
		mysqli_query($bdd, "UPDATE applications SET applicationArchive = False WHERE applicationId =$archive;");
	}
	else{
		mysqli_query($bdd, "UPDATE applications SET applicationArchive = True WHERE applicationId =$archive;");
	}
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>