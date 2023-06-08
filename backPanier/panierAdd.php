<?php
session_start();

if (!isset($_SESSION['idPanier'])){
    header("location: ../profil.php");   
    die();
}

if (!isset($_REQUEST['idProduit'])){
    header("location: ../shop.php");   
    die();
}
include '../connection.php';

//Préparation des variables de produit ou de panier
$idProduit = htmlspecialchars($_REQUEST["idProduit"]);
$idPanier = htmlspecialchars($_SESSION['idPanier']);

//Récupération de la variable comeback
$comeBack = "";
if (isset($_REQUEST['categ'])){
    $comeBack = "?categ=".htmlspecialchars($_REQUEST["categ"]);
} else {
    if (isset($_REQUEST['recherche'])){
        $comeBack = "?recherche=".htmlspecialchars($_REQUEST["recherche"]);
    }
}

//Vérification de si le produit est encore disponible
$verifStock = $dbh->prepare("SELECT `Stock` FROM `t_produit` 
                        WHERE `idProduit`=:idProduit;");
$verifStock->bindParam(':idProduit', $idProduit);
$verifStock->execute();
$nbStock = $verifStock->fetch();

if ($nbStock['Stock'] == 0){
    header("location: ../shop.php".$comeBack."#article_".$idProduit."&error=noStock");
    die();
}

//Vérification de si le produit est déjà dans le panier
$verif = $dbh->prepare("SELECT * FROM `contenir` 
                        WHERE `idProduit`=:idProduit AND `idPannier`=:idPanier;");
$verif->bindParam(':idProduit', $idProduit);
$verif->bindParam(':idPanier', $idPanier);
$verif->execute();
$nbVerif = $verif->fetch();

//Envoi dans la base de données
if ($nbVerif){
       //Incrémenter la quantité pour ce produit dans le panier
       $quantite = $nbVerif['quantite']+1;

       $stmt = $dbh->prepare("UPDATE `contenir` SET `quantite`=:quantite 
                               WHERE `idProduit`=:idProduit AND `idPannier`=:idPanier;");
       $stmt->bindParam(':quantite', $quantite);
} else {
     //Ajouter le produit dans le panier
     $stmt = $dbh->prepare("INSERT INTO `contenir`(`idProduit`, `idPannier`, `quantite`) 
     VALUES (:idProduit,:idPanier,1)");
}
$stmt->bindParam(':idProduit', $idProduit);
$stmt->bindParam(':idPanier', $idPanier);
$stmt->execute();

//Revenir à la page
header("location: ../shop.php".$comeBack."#article_".$idProduit);   
?>