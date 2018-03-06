<!DOCTYPE html >
<html>
	<head>
		 
		<title></title>
		

	</head>
	//vérifier mot de passe 
	<body>
	<div id="inscription">
	<h1> Inscription </h1>
	<form method="post" action="post_index.php">
		Pseudo : <INPUT type="text" name="pseudo"/><br /> <br /> 
		Adresse E-mail : <input  name="adresse" type="email" placeholder="victoria.dumay@mail.be"  onBlur="verifMail(this)" /> <br /> <br /> 
		Mot de passe : <INPUT type="password" name="mot_de_passe" onBlur='mdpchange()'/><br /> <br /> 
		Confirmation mot de passe : <INPUT type="password" name="confirmation_mot_de_passe"/><br /> <br /> 
		<INPUT type="submit" value="valider" class="bouton"/><br /> <br /> <br />
	</form>
	<form method="post" action="connexion.php">
		Boutton pour vous connecté directement : <INPUT type="submit" value="conexion"/>
	</form>
	</div>
	
	</body>
</html>