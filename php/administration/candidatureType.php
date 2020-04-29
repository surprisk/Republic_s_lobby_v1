<?php
	include '../bddAccess.php';
	
	if(isset($_POST['candidatureType'])){
		$analyse=$_POST['candidatureType'];
		
		if($analyse == 'refuse'){
			$applications= mysqli_query($bdd, "SELECT * FROM applications WHERE applicationStatut='Refusée'");
		}
		elseif($analyse == 'accept'){
			$applications= mysqli_query($bdd, "SELECT * FROM applications WHERE applicationStatut='Validée'");
		}
		else{
			$applications= mysqli_query($bdd, "SELECT * FROM applications");
		}
	}
?>