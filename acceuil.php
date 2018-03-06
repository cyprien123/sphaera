<?php session_start(); ?>
<!DOCTYPE html >
<html>
	<head>
	 <link rel="stylesheet" href="style.css" />
		<title>acceuil</title>
		

	</head>
	
	<body>
	
	<script type='text/Javascript'>
		function verifmessage(champ)

	{

		if(champ.value.length < 2 || champ.value.length > 255)
	
		{

			surligne(champ, true);
			
			alert("Veuillez remplir correctement tous les champs");

			return false;

		}

		else

		{
			
			surligne(champ, false);

			return true;

		}

	}

	
	
	function verifForm(f)
	{
	   var pseudoOk = verifmessage(f.contenu);
	   //var mailOk = verifMail(f.email);
	   //var ageOk = verifAge(f.age);
	   
	   if(pseudoOk)
		  return true;
	   else
	   {
		  alert("Veuillez remplir correctement tous les champs");
		  return false;
	   }
	}

	
	</script>

	
		
		<h1> Mon premier tchat</h1>
		<?php 
			echo $_SESSION['pseudo'] ;
			echo ' : Bienvenu !'; 
		?>
		<br /> <br />
		---------------------------------------------------------------	
		
	<form  action="minitchat2.php" method="post" onsubmit="return verifForm(this)">
		Message : <input type="text" name="contenu" onblur="verifmessage(this)"/><br /> <br />
		<input type="submit" value="valider"/>
	</form>
	
	<?php
	
		$bdd = new PDO('mysql:host=localhost;dbname=sphaera;charset=utf8', 'root', 'root');
		$message =$bdd->query('SELECT * FROM messages ORDER BY id DESC LIMIT 5');
		while ( $donnees=$message->fetch())
		{
			echo $donnees['pseudo'] . ' : ' . $donnees['contenue'] . '<br />';
		}
		$message->closeCursor();
	?>

	</body>
</html>