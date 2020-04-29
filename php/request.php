<?php
	include 'bddAccess.php';
	
	$name=$_POST['name'];
	$desc=$_POST['desc'];
	
	if(isset($_POST)){
		if(!empty($name) && !empty($desc)){
			if(strlen($desc)<=10000){
				$date = date("d-m-Y");
				$request=mysqli_query($bdd, "INSERT INTO requests(requestName, requestDesc, requestDate, requestStatut, requestVisibility, requestArchive) VALUES ('$name', '$desc', '$date', 'En cours de traitement', True, False);");
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
			 
						alert(\"Nombre de caractères supérieur à 10000\");
			 
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
		
			document.location.href='../index.html';
			
		</script>";
?>