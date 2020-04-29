<?php
	if(isset($_SESSION['userName']) && $_SESSION['userType'] < 2){
		echo "<html>";
			echo "<head>";
			echo "<link rel='stylesheet' type='text/css' href='CSS/header.css'>";
			echo "<link rel='stylesheet' type='text/css' href='CSS/administration.css'>";
			echo "<link rel='stylesheet' type='text/css' href='CSS/police.css'>";
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
								echo "<li><a href='php/applications/pourvoir.php'>Pourvoir</a></li>";
								echo "<li><a href='php/requests/requests.php'>Requêtes</a></li>";
								echo "<li><a href='php/applications/applications.php'>Candidatures</a></li>";
								if($_SESSION['userType'] <1){
									echo "<li><a href='php/administration/administration.php'>Administration</a></li>";
									echo "<li><a href='php/administration/accounts.php'>Comptes</a></li>";
								}
								echo "<li><form action='php/deconnection.php'><button id='deconnectionButton'>Deconnexion</button></form></li>";
							echo "</ul>";
						echo "</li>";
					echo "</ul>";
				echo "</div>";
			echo "</head>";
			echo "<body>";
			echo "<CENTER>";
				echo "<div style='position:absolute; width: 100%;'>";
				echo "<div id='request'>";
				echo "<h2> Bonjour ".$_SESSION['userName'].", vous avez le niveau d'accréditation d'un ".$_SESSION['userStatut']."</h2>";
				if($_SESSION['userType'] < 1){
					echo "Bon courage les loulous ;)";
				}
				else{
					echo "<p>En tant que Reader votre devoir est de répondre aux requêtes posées par le biais du site, vous devrez répondre à celles-ci en contactant directement l'initiateur de la requête sur discord.
					Cependant il faudra aussi vous occuper des candidatures. C'est vous qui déciderez si oui ou non une personne pourra rejoindre le serveur discord.
					Pour tout missclique, ne vous inquiètez pas vous pourrez toujours contacter un Administrateur pour qu'il vous redonne accès à la requête/candidature.</p>
					<br>
					<p>Je vous souhaite bon courage !</p>";
				}
				echo "</div>";
				echo "</div>";
			echo "</CENTER>";
			echo "</body>";
		echo "</html>";
	}
	else{
		header('Location: connexion.php');
	}
?>