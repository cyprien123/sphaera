<?php session_start(); ?>
<!DOCTYPE html >
<html>
	<head>
		<title></title>
	</head>
	
	<body>
	
	<?php
	$bdd = new PDO('mysql:host=localhost;dbname=sphaera;charset=utf8', 'root', 'root');
	$req= $bdd->prepare('INSERT INTO messages(pseudo, contenue) 
	VALUES( :pseudo, :contenue)');
	$req->execute(array(
	'pseudo' => $_SESSION['pseudo'] ,
	'contenue' => $_POST['contenu']
	));
					
	header('Location:acceuil.php');
?>
	
	
	
	</body>
</html>