<?php

include '../connection.php';

//Envoi dans la base de données
$stmt = $dbh->prepare("UPDATE `t_categorie` SET `libelle`=:libelle WHERE `idCategorie`=:idCategorie");                               
$stmt->bindParam(':libelle', $_REQUEST["libelle"]);
$stmt->bindParam(':idCategorie', $_REQUEST["idCategorie"]);
$stmt->execute();

header("location: BackOffice.php");   

?>



