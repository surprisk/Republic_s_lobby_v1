<?php
	include '../bddAccess.php';
	$requests = mysqli_query($bdd, "SELECT * FROM requests where requestVisibility=False AND requestArchive=False;");
	while($tab = mysqli_fetch_assoc($requests)){
		$requestId= $tab['requestId'];
		$delAll= mysqli_query($bdd, "DELETE FROM requests WHERE requestId=$requestId");
	}
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>