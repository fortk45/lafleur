<?php
session_start();

require '../connection.php';

if ((!isset($_REQUEST['email'])) || (!isset($_REQUEST['mdp']))){
    header("location: ../profil.php?act=sign&error=1");   //erreur 1 : toutes les infos n'ont pas été entrées
    die();
}

$codeconnect = htmlspecialchars($_REQUEST['email']);
$mdpconnect = SHA1($_REQUEST['mdp']);

//vérifier si le mail existe dans la base de donnée avant de vérifier le mot de passe

$sql=$dbh->prepare('SELECT * FROM `t_user` WHERE `email`= :mail_login AND `motDePasse`= :motDePasse');
$sql->bindParam(':mail_login', $codeconnect);
$sql->bindParam(':motDePasse',$mdpconnect);

$sql->execute();

$user = $sql->fetch();

if (!$user){
    //Si le compte n'existe pas
    //Erreur 3 : Compte inexistant (renvoi à la page de connexion)
    header("Location: ../profil.php?error=3");
} else {
    //`email`, `nom`, `prenom`, `adresse`, `ville`, `codePostale`, `motDePasse`, `idPannier`
    $_SESSION['email'] = $user['email'];
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['adresse'] = $user['adresse'];
    $_SESSION['ville'] = $user['ville'];
    $_SESSION['codePostale'] = $user['codePostale'];
    $_SESSION['idPanier'] = $user['idPannier'];
    $_SESSION['admin'] = $user['admin'];
    header("Location: ../index.php");
}

//permet de se connecter avec son compte au site

?>
