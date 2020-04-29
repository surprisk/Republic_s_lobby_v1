<?php
	include '../bddAccess.php';
	
	$password=intval($_POST['password']);
	$newPassword=mysql_real_escape_string($_POST['newPassword']);
	$newPassword=md5($newPassword);
	
	$passwordItem= mysqli_query($bdd, "UPDATE users SET userPass = '$newPassword' WHERE userId = $password");
	header('Location:  '.$_SERVER['HTTP_REFERER'].'');
?>