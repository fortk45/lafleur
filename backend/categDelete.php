<?php

include '../connection.php';

//Suppression des autres tables
$stmt0 = $dbh->prepare("DELETE FROM `t_produit` WHERE `idCategorie`=:idCategorie");
$stmt0->bindParam(':idCategorie', $_REQUEST["idCategorie"]);
$stmt0->execute();

//Suppression de la table categorie
$stmt2 = $dbh->prepare("DELETE FROM `t_categorie` WHERE `idCategorie`=:idCategorie");
$stmt2->bindParam(':idCategorie', $_REQUEST["idCategorie"]);
$stmt2->execute();

header("location: BackOffice.php");   

?>






