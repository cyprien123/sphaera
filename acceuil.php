<?php session_start(); ?>
<!DOCTYPE html >
<html>
	<head>
	 <link rel="stylesheet" href="style1.css" />
		<title></title>
		
		<script>
		function prevention(document.form1.contenu.value) {
		document.form1.contenu.value = preg_replace("/[\'\")(;|`,<>]/", "", document.form1.contenu.value); 
		return document.form1.contenu.value;
    	}  
		</script>

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
		Message : <input type="text" name="contenu" onClick="prevention();" /><br /> <br />
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
