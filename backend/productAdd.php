<?php

include '../connection.php';


//Faudra ici importer l'image
if (isset($_FILES["photoProduit"])){
    require('add_photo.php');
    if (isset($errorUpload)){
        header("Location: BE_addFlower.php?error=".$errorUpload);
    }
}

//Envoi dans la base de données
$stmt = $dbh->prepare("INSERT INTO t_produit(`Designation`, `prix`, `Stock`, 
                                        `Description`, `image`, `idCategorie`) 
                            VALUES (:designationProduit, :prixProduit, :quantite_stock, 
                                :descriptionProduit, :photoProduit, :code_categorie)");

$stmt->bindParam(':designationProduit', $_REQUEST["designationProduit"]);
$stmt->bindParam(':prixProduit', $_REQUEST["prixProduit"]);
$stmt->bindParam(':quantite_stock', $_REQUEST["quantite_stock"]);

$stmt->bindParam(':descriptionProduit', $_REQUEST["descriptionProduit"]);
$stmt->bindParam(':photoProduit', $filename);
$stmt->bindParam(':code_categorie', $_REQUEST["code_categorie"]);

$stmt->execute();

header("location: BackOffice.php");   

?>



