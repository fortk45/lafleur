<?php

include '../connection.php';

//Suppression des autres tables
$stmt0 = $dbh->prepare("DELETE FROM `appartenir` WHERE `idProduit`=:idProduit");
$stmt0->bindParam(':idProduit', $_REQUEST["idProduit"]);
$stmt0->execute();

$stmt1 = $dbh->prepare("DELETE FROM `contenir` WHERE `idProduit`=:idProduit");
$stmt1->bindParam(':idProduit', $_REQUEST["idProduit"]);
$stmt1->execute();

//Suppression de la table produit
$stmt2 = $dbh->prepare("DELETE FROM `t_produit` WHERE `idProduit`=:idProduit");
$stmt2->bindParam(':idProduit', $_REQUEST["idProduit"]);
$stmt2->execute();

header("location: BackOffice.php");   

?>






