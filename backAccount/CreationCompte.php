<?php
require "../connection.php" ;

if ((!isset($_REQUEST['pass'])) || (!isset($_REQUEST['confirm_pass'])) || (!isset($_REQUEST['email'])) || (!isset($_REQUEST['nom'])) || (!isset($_REQUEST['prenom']))){
    header("location: ../profil.php?act=sign&error=1");   //erreur 1 : toutes les infos n'ont pas été entrées
    die();
}

if (($_REQUEST['pass']) == ($_REQUEST['confirm_pass'])){
    $passHash = SHA1($_REQUEST['pass']);
} else {
    header("location: ../profil.php?act=sign&error=2");   //erreur 2 : Les mots de passe ne correspondent pas
    die();        
}

$sql0=$dbh->query("INSERT INTO `t_pannier`() VALUES ()");

$panier= $dbh->lastInsertId();

$sql=$dbh ->prepare('INSERT INTO t_user(`email`, `nom`, `prenom`, `motDePasse`, `idPannier`)  VALUES(:mail_login, :nom, :prenom, :motDePasse, :panier) ');
$sql->bindParam(':mail_login', $_REQUEST['email']);
$sql->bindParam(':nom', $_REQUEST['nom']);
$sql->bindParam(':prenom', $_REQUEST['prenom']);
$sql->bindParam(':motDePasse', $passHash);
$sql->bindParam(':panier', $panier);

$sql->execute();
header("location: ../profil.php");   
?>
