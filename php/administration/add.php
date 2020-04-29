<?php
	include '../bddAccess.php';
	
	$userName = $_POST['userName'];
	$userPass = $_POST['userPass'];
	$cUserPass = $_POST['cUserPass'];
	$userType = $_POST['userType'];
	
	if($userType < 2){
		$userStatut = "Reader";
	}
	else{
		$userStatut = "Utilisateur";
	}
	
	if(!empty($userName) && !empty($userPass) && !empty($cUserPass) && $userType > 0 && $userType < 3){
		if(mysqli_num_rows($userCheck = mysqli_query($bdd, "SELECT * FROM users WHERE userName = '$userName';"))){
			echo "
				<script type='text/javascript'>
		 
					alert(\"Un compte existant porte déjà le nom d'utilisateur : ".$userName."\");
		 
				</script>";
		}
		else{
			if($userPass == $cUserPass){
				$date = date("d-m-Y");
				$userPass=md5($userPass);
				$userCreate = mysqli_query($bdd, "INSERT INTO users(userName, userPass, userType, userDate) VALUES('$userName', '$userPass', '$userType', '$date');");
				if(mysqli_num_rows(mysqli_query($bdd, "SELECT * FROM users WHERE userName = '$userName';"))){
					echo "
					<script type='text/javascript'>
			 
						alert(\"Compte ".$userStatut." créé avec succès !\");
			 
					</script>";
				}
				else{
					echo "
					<script type='text/javascript'>
			 
						alert(\"Le compte ".$userStatut." n'a pas été créé, veuillez contacter SurprisK Alias Patrick\");
			 
					</script>";
				}
			}
			else{
				echo "
					<script type='text/javascript'>
			 
						alert(\"Les deux mots de passe ne sont pas identiques\");
			 
					</script>";
			}
		}
	}
	else{
		echo "
		<script type='text/javascript'>
 
			alert(\"Tous les champs n'ont pas été remplis\");
			
		</script>";
	}
	echo "
		<script type='text/javascript'>
			
			document.location.href='accounts.php';
		
		</script>";
?>