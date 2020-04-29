<?php
	include '../bddAccess.php';
	
	$del=intval($_POST['del']);
	
	$delItem= mysqli_query($bdd, "DELETE FROM users WHERE userId =$del;");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>