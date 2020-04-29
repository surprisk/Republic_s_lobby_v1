<?php
	session_start();
	include 'bddAccess.php';
	
	$userName=$_POST['userName'];
	$userPass=$_POST['userPass'];
	
	if($bdd){
		if(isset($_POST)){
			if(!empty($userName) && !empty($userPass)){
				$userPass = md5($userPass);
				$connection = mysqli_query($bdd, "SELECT * FROM users WHERE userName = '$userName' AND userPass = '$userPass'");
					if(mysqli_num_rows($connection) == 1){
						while($donnees = mysqli_fetch_assoc($connection)){
							$_SESSION['userId'] = $donnees['userId'];
							$_SESSION['userName'] = $donnees['userName'];
							$_SESSION['userType'] = $donnees['userType'];
						}
						if($_SESSION['userType'] == 0){
							$_SESSION['userStatut']="Administrateur";
						}
						elseif($_SESSION['userType'] > 1){
							$_SESSION['userStatut']="Utilisateur";
						}
						else{
							$_SESSION['userStatut']="Reader";
						}
						
						header('Location: ../administration.php');
					}
					else{
						echo "mauvais identifiants";
					}
			}
			else{
				echo "Tous les champs ne sont pas rempli";
			}
		}
	}

?>