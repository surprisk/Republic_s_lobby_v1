<?php
	include '../bddAccess.php';
	session_start();
	if(isset($_SESSION['userName']) && $_SESSION['userType'] < 1){
		echo "<html>";
			echo "<head>";
			echo "<link rel='stylesheet' type='text/css' href='../../CSS/header.css'>";
			echo "<link rel='stylesheet' type='text/css' href='../../CSS/administration.css'>";
			echo "<link rel='stylesheet' type='text/css' href='../../CSS/police.css'>";
			echo "<link href='https://fonts.googleapis.com/css?family=Baloo+Da&display=swap' rel='stylesheet'>";
			echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>";
			echo "<title>Administration</title>";
				echo "<div id='toppage'></div>";
				echo "<div ID='header'> ";
					echo "<a href='#toppage'><p ID='headerLetter'> R </p></a>";
					echo "<ul id='menu'>";
						echo "<li><a>Bienvenue : ".$_SESSION['userName']." </a></li>";
						echo "<li><a>Statut : ".$_SESSION['userStatut']." </a></li>";
						echo "<li> <a>Actions</a>";
							echo "<ul style='background-color: black'>";
								echo "<li><a href='../applications/pourvoir.php'>Pourvoir</a></li>";
								echo "<li><a href='../requests/requests.php'>Requêtes</a></li>";
								echo "<li><a href='../applications/applications.php'>Candidatures</a></li>";
								echo "<li><a href='administration.php'>Administration</a></li>";
								echo "<li><a href='accounts.php'>Comptes</a></li>";
								echo "<li><form action='php/deconnection.php'><button id='deconnectionButton'>Deconnexion</button></form></li>";
							echo "</ul>";
						echo "</li>";
					echo "</ul>";
				echo "</div>";
			echo "</head>";
			echo "<body>";
				echo "<div style='position:absolute; width: 100%;'>";
				echo "<div id='request'>";

		$requests = mysqli_query($bdd, "SELECT * FROM requests where requestVisibility=True OR requestVisibility=False;");
		$nbRequest = 0;
		if(mysqli_num_rows($requests)){
			echo "<CENTER>";
			echo "<table ID='tabRequest'><tr><th colspan='7'><div style='background-color: grey; padding: 20px;'>Requêtes</div></th></tr>";
			echo "<tr><td>N° requête</td>";
			echo "<td>N° Reader</td>";
			echo "<td>Date</td>";
			echo "<td>Pseudo Discord</td>";
			echo "<td>Statut</td>";
			echo "<td style='width: 15%'>Description</td>";
			echo "<td>Action</td></tr>";
			while($donnees = mysqli_fetch_assoc($requests)){
				echo "<tr>";
				echo "<td>".$donnees['requestId']."</td>";
				echo "<td>".$donnees['userId']."</td>";
				echo "<td>".$donnees['requestDate']."</td>";
				echo "<td>".$donnees['requestName']."</td>";
				echo "<td>".$donnees['requestStatut']."</td>";
				echo "<td>".$donnees['requestDesc']."</td>";
				echo "<td><form action='../requests/suppression.php' method='post'><div style='background-color: red;' class='button'> <button value='".$donnees['requestId']."' type='submit' name='del'/><i class='far fa-trash-alt'></i> </div></form>";
				if($donnees['requestVisibility'] == 0){
					echo "<form action='../requests/visibility.php' method='post'><div style='background-color: green;' class='button'> <button value='".$donnees['requestId']."' type='submit' name='visibility'/><i class='fas fa-eye'></i></div></form>";
				}
				else{
					echo "<form action='../requests/visibility.php' method='post'><div style='background-color: grey;' class='button'> <button value='".$donnees['requestId']."' type='submit' name='visibility'/><i class='fas fa-eye-slash'></i></div></form>";
				}
				if($donnees['requestArchive'] == 0){
					echo "<form action='../requests/archive.php' method='post'><div style='background-color: orange;' class='button'> <button value='".$donnees['requestId']."' type='submit' name='archive'/><i class='fas fa-folder-plus'></i></div></form></td>";
				}
				else{
					echo "<form action='../requests/archive.php' method='post'><div style='background-color: grey;' class='button'> <button value='".$donnees['requestId']."' type='submit' name='archive'/><i class='fas fa-folder-minus'></i></div></form></td>";
				}
				echo "</tr>";
				$nbRequest += 1;
			}
			echo "</table>";
			echo "<div style='background-color: grey; padding: 10px;'> Total des requêtes : ".$nbRequest."</div>";
			echo "<form action='../requests/suppressionall.php' method='post'>";
			echo "<button type='submit' name='vider' id='delAllButton'>Supprimer toutes les requêtes<i class='far fa-trash-alt'></i></button>";
			echo "</form>";
			echo "</CENTER>";
		}
		else{
			echo "<p style='text-align : center; padding : 30px;'> Aucune requête en vue ! </p>";
		}
		$applicationsCondition = mysqli_query($bdd, "SELECT * FROM applications where applicationVisibility=True OR applicationVisibility=False;");
		$nbApplication = 0;
		if(mysqli_num_rows($applicationsCondition)){
			include 'candidatureType.php';
			echo "<CENTER>";
			echo "<form style='padding : 30px' action='' method='POST'>";
			echo "Choix de l'affichage des candidatures :<br>";
			echo "<button type='submit' name='candidatureType' value='all'>Toutes</button><button type='submit' name='candidatureType' value='refuse'>Refusées</button><button type='submit' name='candidatureType' value='accept'>Acceptées</button>";
			echo "</form>";
			echo "</CENTER>";
			if(isset($applications)){
				echo "<CENTER>";
				echo "<table ID='tabRequest'><tr><th colspan='8'><div style='background-color: grey; padding: 20px;'>Candidatures</div></th></tr>";
				echo "<tr><td>N° Candidatures</td>";
				echo "<td>N° Reader</td>";
				echo "<td>Date</td>";
				echo "<td>Pseudo Discord</td>";
				echo "<td> Nom/Prénom </td>";
				echo "<td>Statut</td>";
				echo "<td style='width: 15%'>Motivations</td>";
				echo "<td>Action</td></tr>";
				while($donnees2 = mysqli_fetch_assoc($applications)){
				echo "<tr>";
				echo "<td>".$donnees2['applicationId']."</td>";
				echo "<td>".$donnees2['userId']."</td>";
				echo "<td>".$donnees2['applicationDate']."</td>";
				echo "<td>".$donnees2['applicationDiscord']."</td>";
				echo "<td>".$donnees2['applicationSecondName']." ".$donnees2['applicationFirstName']."</td>";
				echo "<td>".$donnees2['applicationStatut']."</td>";
				echo "<td><textarea style='width: 90%'>Objet : ".$donnees2['applicationSubject']."
				
".$donnees2['applicationMotivation']."

".$donnees2['applicationEmail']."</textarea></td>";
					echo "<td><form action='../applications/suppression.php' method='post'><div style='background-color: red;' class='button'> <button value='".$donnees2['applicationId']."' type='submit' name='del'/><i class='far fa-trash-alt'></i> </div></form>";
					if($donnees2['applicationVisibility'] == 0){
						echo "<form action='../applications/visibility.php' method='post'><div style='background-color: green;' class='button'> <button value='".$donnees2['applicationId']."' type='submit' name='visibility'/><i class='fas fa-eye'></i></div></form>";
					}
					else{
						echo "<form action='../applications/visibility.php' method='post'><div style='background-color: grey;' class='button'> <button value='".$donnees2['applicationId']."' type='submit' name='visibility'/><i class='fas fa-eye-slash'></i></div></form>";
					}
					if($donnees2['applicationArchive'] == 0){
						echo "<form action='../applications/archive.php' method='post'><div style='background-color: orange;' class='button'> <button value='".$donnees2['applicationId']."' type='submit' name='archive'/><i class='fas fa-folder-plus'></i></div></form></td>";
					}
					else{
						echo "<form action='../applications/archive.php' method='post'><div style='background-color: grey;' class='button'> <button value='".$donnees2['applicationId']."' type='submit' name='archive'/><i class='fas fa-folder-minus'></i></div></form></td>";
					}
					echo "</tr>";
					$nbApplication += 1;
				}
				echo "</table>";
				echo "<div style='background-color: grey; padding: 10px;'> Total de candidatures : ".$nbApplication."</div>";
				echo "<form action='../applications/suppressionall.php' method='post'>";
				echo "<button type='submit' name='vider' id='delAllButton'>Supprimer toutes les candidatures<i class='far fa-trash-alt'></i></button>";
				echo "</form>";
				echo "</CENTER>";
			}
			else{
			}
		}
		else{
			echo "<p style='text-align : center; padding : 30px;'> Aucune candidature en vue ! </p>";
		}
				echo "</div>";
				echo "</div>";
			echo "</body>";
		echo "</html>";
	}
	else{
		header('Location: ../../connexion.php');
	}
?>