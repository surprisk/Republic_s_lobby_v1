<?php
	include '../bddAccess.php';
	
	$del=intval($_POST['del']);
	
	$delItem= mysqli_query($bdd, "DELETE FROM applications WHERE applicationId =$del;");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>