<?php
$bdd = new PDO('mysql:host=localhost;dbname=sphaera;charset=utf8','root','root');
$req = $bdd->prepare('SELECT id FROM membre WHERE pseudo = :pseudo AND pass = :pass');
$req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'pass' => $_POST['mot_de_passe']));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    session_start();
    $_SESSION['pseudo'] = $_POST['pseudo'];
 
	header('Location: acceuil.php');
}
?>