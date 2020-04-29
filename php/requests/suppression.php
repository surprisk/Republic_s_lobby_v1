<?php
	include '../bddAccess.php';
	
	$del=intval($_POST['del']);
	
	$delItem= mysqli_query($bdd, "DELETE FROM requests WHERE requestId =$del;");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>