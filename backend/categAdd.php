<?php

include '../connection.php';

//Envoi dans la base de données
$stmt = $dbh->prepare("INSERT INTO t_categorie(`libelle`) VALUES (:libelle)");
$stmt->bindParam(':libelle', $_REQUEST["libelle"]);
$stmt->execute();

header("location: BackOffice.php");   

?>
