<?php session_start(); ?>
<!DOCTYPE html >
<html>
	<head>
	 <link rel="stylesheet" href="style.css" />
		<title></title>
		

	</head>
	
	<body>
		
		<h1> Mon premier tchat</h1>
		 <a href="profil.html">profile </a>
		<?php 
	
			echo $_SESSION['pseudo'] ;
			echo ' : Bienvenu !'; 
			?><br /> <br />
		---------------------------------------------------------------	
		
	<form  action="minitchat2.php" method="post">
		Message : <input type="text" name="contenu" /><br /> <br />
		<input type="submit" value="valider"/>
	</form>
	<?php
	
		$bdd = new PDO('mysql:host=localhost;dbname=sphaera;charset=utf8', 'root', 'root');
		$message =$bdd->query('SELECT * FROM messages ORDER BY id DESC LIMIT 50');
		while ( $donnees=$message->fetch())
		{
			echo $donnees['pseudo'] . ' : ' . $donnees['contenue'] . '<br />';
		}
		$message->closeCursor();
	?>
	
	</body>
</html>

<!-- Portion de code à mettre en fonct° pour actualiser par sec.
	while ( $donnees=$message->fetch())
		{
			echo $donnees['pseudo'] . ' : ' . $donnees['contenue'] . '<br />';
		}
		$message->closeCursor();
Essai de modification daniel
-->
