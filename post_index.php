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
					
					$sql = "INSERT INTO membre (pseudo, email, pass, date_inscription)
					VALUES ('$pseudo', '$email', '$pass', NOW())";
								
					// use exec() because no results are returned
					$conn->exec($sql);
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

// >> j'ai laissé ton code si besoin

/*
	
	if(!$_POST['pseudo']OR !$_POST['adresse'])
	{
		echo 'veillez inserer un pseudo ou une adresse email';
	}
	else
	{


		if( $_POST['mot_de_passe'] == $_POST['confirmation_mot_de_passe'])
		{
			echo "test6";	
			$bdd = new PDO('mysql:host=$servername;dbname=$dbname;charset=utf8',$username,$password);
			

			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$req = $bdd->prepare('INSERT INTO membre(pseudo, email, pass, date_inscription ) VALUES( :pseudo, :email, :pass, NOW() )');
			
			$req->execute(array(
				'pseudo'=>$_POST['pseudo'],
				'email'=>$_POST['adresse'],
				'pass'=>$_POST['mot_de_passe']));
			
			$stmt->execute($req) or die(print_r($req->errorInfo(), true));

			$req->closeCursor();
			header('Location: connexion.php');
		echo 'cc';
		}
		else
		{
		echo 'les deux mots de passes ne corespondent pas ' ;
		}
		

		
		
	
	}
*/


	?>
	

	
	
	</body>
</html>