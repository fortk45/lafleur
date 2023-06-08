<?php
session_start();
include '../connection.php';

$idProduit = htmlspecialchars($_REQUEST["idProduit"]);
$idPanier = htmlspecialchars($_SESSION['idPanier']);
$act = htmlspecialchars($_REQUEST['act']);

switch ($act) {
    case 'all':
        //Suppression du produit
        $request = $dbh->prepare("DELETE FROM `contenir` 
                            WHERE `idProduit`=:idProduit AND `idPannier`=:idPanier;");

        break;
    
    case 'some':
        //Suppression de la quantite demandee
        $quantity = htmlspecialchars($_SESSION['quantity']);
        $request = $dbh->prepare("UPDATE `contenir` SET `quantite`=:quantity 
                            WHERE `idProduit`=:idProduit AND `idPannier`=:idPanier;");
        $request->bindParam(':quantity', $quantity);
        break;
}
$request->bindParam(':idProduit', $idProduit);
$request->bindParam(':idPanier', $idPanier);
$request->execute();

//Revenir à la page
header("location: ../panier.php");   
?>