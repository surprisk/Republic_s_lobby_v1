<?php
	include '../bddAccess.php';
	session_start();
	if(isset($_SESSION['userName']) && $_SESSION['userType'] < 2){
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
								echo "<li><a href='requests.php'>Requêtes</a></li>";
								echo "<li><a href='../applications/applications.php'>Candidatures</a></li>";
								if($_SESSION['userType'] <1){
									echo "<li><a href='../administration/administration.php'>Administration</a></li>";
									echo "<li><a href='../administration/accounts.php'>Comptes</a></li>";
								}
								echo "<li><form action='../deconnection.php'><button id='deconnectionButton'>Deconnexion</button></form></li>";
							echo "</ul>";
						echo "</li>";
					echo "</ul>";
				echo "</div>";
			echo "</head>";
			echo "<body>";
				echo "<div style='position:absolute; width: 100%;'>";
				echo "<div id='request'>";

		$requests = mysqli_query($bdd, "SELECT * FROM requests where requestVisibility=True;");
		$nbRequest = 0;
		if(mysqli_num_rows($requests)){
			echo "<CENTER>";
			echo "<table ID='tabRequest'><tr><th colspan='5'><div style='background-color: grey; padding: 20px;'>Requêtes</div></th></tr>";
			echo "<tr><td>N° requête</td>";
			echo "<td>Date</td>";
			echo "<td>Pseudo Discord</td>";
			echo "<td style='width: 15%'>Description</td>";
			echo "<td>Action</td></tr>";
			while($donnees = mysqli_fetch_assoc($requests)){
				echo "<tr>";
				echo "<td>".$donnees['requestId']."</td>";
				echo "<td>".$donnees['requestDate']."</td>";
				echo "<td>".$donnees['requestName']."</td>";
				echo "<td>".$donnees['requestDesc']."</td>";
				echo "<td><form action='../requests/check.php' method='post'><div style='background-color: green;' class='button'> <button value='".$donnees['requestId']."' type='submit' name='check'/><i class='fas fa-check'></i> </div></form>";
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
			echo "</CENTER>";
		}
		else{
			echo "<p style='text-align : center; padding : 30px;'> Aucune requête en vue ! </p>";
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