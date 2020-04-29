<?php
	include 'bddAccess.php';

	$firstName=$_POST['firstName'];
	$secondName=$_POST['secondName'];
	$discordName=$_POST['discordName'];
	$email=$_POST['email'];
	$bDate=$_POST['bDate'];
	$subject=$_POST['subject'];
	$motivation=$_POST['motivation'];
	
	if(isset($_POST)){
		if(!empty($firstName) && !empty($secondName) && !empty($discordName) && !empty($email) && !empty($bDate) && !empty($subject) && !empty($motivation)){
			if(strlen($motivation)<=(25000)){
				$date = date("d-m-Y");
				$request=mysqli_query($bdd, "INSERT INTO applications(applicationFirstName, applicationSecondName, applicationDiscord, applicationEmail, applicationBirthDay, applicationSubject, applicationMotivation, applicationDate, applicationStatut, applicationVisibility, applicationArchive) VALUES ('$firstName', '$secondName', '$discordName', '$email','$bDate', '$subject', '$motivation', '$date', 'En cours de traitement', True, False);");
				if($request){
					echo "
						<script type='text/javascript'>
				 
							alert(\"Requête envoyé avec succès !\");
				 
						</script>";
				}
				else{
					echo "
						<script type='text/javascript'>
				 
							alert(\"Problème lors de l'envoi de la requête, veuillez contacter SurprisK alias Patrick\");
				 
						</script>";
				}
			}
			else{
				echo "
					<script type='text/javascript'>
			 
						alert(\"Nombre de caractères supérieur à 25000\");
			 
					</script>";
			}
		}
		else{
			echo "
				<script type='text/javascript'>
		 
					alert(\"Tous les champs n'ont pas été remplis\");
		 
				</script>";
		}
	}
	echo "
		<script type='text/javascript'>
		
			document.location.href='../../index.html';
			
		</script>";
?>