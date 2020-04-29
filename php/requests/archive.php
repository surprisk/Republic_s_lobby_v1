<?php
	include '../bddAccess.php';
	
	$archive=intval($_POST['archive']);
	$archiveItem= mysqli_query($bdd, "SELECT requestArchive FROM requests WHERE requestId=$archive AND requestArchive=False;");
	
	if(mysqli_num_rows($archiveItem) == 0){
		mysqli_query($bdd, "UPDATE requests SET requestArchive = False WHERE requestId =$archive;");
	}
	else{
		mysqli_query($bdd, "UPDATE requests SET requestArchive = True WHERE requestId =$archive;");
	}
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>