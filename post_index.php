<!DOCTYPE html >
<html>
	<head>
		<title></title>
		

	</head>
	
	<body>
	<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sphaera";

$pseudo = $_POST['pseudo'];
$email = $_POST['adresse'];
$pass = $_POST['mot_de_passe'];

// >> essaye d'externaliser le plus possible de variable pour ne plus devoir aller dans ta fonction par la suite
// >> il reste à modifier le mot de passe et le password.


if(!$pseudo OR ! $email)
{
	echo 'veillez inserer un pseudo ou une adresse email';
}
else
{
	if($pass == $_POST['confirmation_mot_de_passe'])
	{
		try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					$recherche = mysql_query("select * from membre where pseudo='$pseudo'");
					$result = mysql_fetch_array($recherche);
					$liste = $result["pseudo"];
					
				if ($liste == $pseudo)
				{
					echo "Le pseudo que vous demandez est déjà pris. Merci de le changer.";
				}
				else {	
					$sql = "INSERT INTO membre (pseudo, email, pass, date_inscription)
					VALUES ('$pseudo', '$email', '$pass', NOW())";
								
					// use exec() because no results are returned
					$conn->exec($sql);
					}
			}
		catch(PDOException $e)
			{
			echo $sql . "<br>" . $e->getMessage();
			}

		$conn = null;
		header('Location: connexion.php');
	}
	else
	{
		echo 'les deux mots de passes ne corespondent pas ' ;
	}
}









	/*include('inscription.php');
	} 
	mysql_query("INSERT INTO paris_joueurs (nom, pseudo, mdp, mail, adresse, cp, ville, pays) VALUES ('$nom','$pseudo','$mot_de_passe','$mail','$adresse','$code_postal','$ville','$pays')");
	echo "Votre enregistrement à bien été pris en compte. Merci.";
	include('login.php');*/
}
?>


	
	

	
	
	</body>
</html>