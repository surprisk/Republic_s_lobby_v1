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
								echo "<li><form action='../deconnection.php'><button id='deconnectionButton'>Deconnexion</button></form></li>";
							echo "</ul>";
						echo "</li>";
					echo "</ul>";
				echo "</div>";
			echo "</head>";
			echo "<body>";
				echo "<div style='position:absolute; width: 100%;'>";
				echo "<div id='request'>";

		$accounts = mysqli_query($bdd, "SELECT * FROM users where userType>0;");
		$nbAccounts = 0;
		echo "<CENTER>";
		if(mysqli_num_rows($accounts)){
			echo "<table ID='tabRequest'><tr><th colspan='8'><div style='background-color: grey; padding: 20px;'>Comptes Utilisateurs</div></th></tr>";
			echo "<tr><td>N° compte</td>";
			echo "<td>Date de création</td>";
			echo "<td>Utilisateur</td>";
			echo "<td>Statut</td>";
			echo "<td>Action</td></tr>";
			while($donnees = mysqli_fetch_assoc($accounts)){
				$accountStatut = $donnees['userType'];
				if($accountStatut > 1){
					$accountStatut = 'Utilisateur';
				}
				else{
					$accountStatut = 'Reader';
				}
				echo "<tr>";
				echo "<td>".$donnees['userId']."</td>";
				echo "<td>".$donnees['userDate']."</td>";
				echo "<td>".$donnees['userName']."</td>";
				echo "<td>".$accountStatut."</td>";
				echo "<td><form action='password.php' method='post'><input type='text' name='newPassword' placeholder='Nouveau mot de passe' style='border-style: solid; border-color: green; height: 25px'/><div style='background-color: green; border-radius:0' class='button'> <button value='".$donnees['userId']."' type='submit' name='password'/><i style='color:white' class='fas fa-check'></i> </div></form>";
				echo "<form action='suppression.php' method='post'><div style='background-color: red;' class='button'> <button value='".$donnees['userId']."' type='submit' name='del'/><i style='color:white' class='far fa-trash-alt'></i> </div></form></td>";
				echo "</tr>";
				$nbAccounts += 1;
			}
			echo "</table>";
			echo "<div style='background-color: grey; padding: 10px;'> Total de comptes : ".$nbAccounts."</div>";
		}
		else{
			echo "<p style='padding : 30px;'> Aucun compte créé ?! </p>";
		}
			echo "<div style='background-color: grey; padding: 20px; margin: 15px; font-weight: bold'> Création de compte </div>";
					echo "<form method='post' action='add.php' style='padding:15px;'>";
						echo "Nom d'utilisateur : ";
						echo "<input type='text' name='userName'/> <br>"; 
						echo "Mot de Passe : ";
						echo "<input type='text' name='userPass'/> <br>";
						echo "Confirmer Mot de Passe : ";
						echo "<input type='text' name='cUserPass'/> <br>";
						echo "Type : ";
						echo "<SELECT name='userType' size='1'>
						<OPTION> --- Selectionnez un type --- </OPTION>
						<OPTION value=1> Reader </OPTION>
						<OPTION value=2> Utilisateur </OPTION>
						</SELECT><br><br>";
						echo "<input type='submit' name='add'/>";
					echo "</form>";
			echo "</CENTER>";
				echo "</div>";
				echo "</div>";
			echo "</body>";
		echo "</html>";
	}
	else{
		header('Location: ../../connexion.php');
	}
?>