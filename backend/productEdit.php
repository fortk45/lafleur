<?php

include '../connection.php';


//Importation de l'image
if (isset($_FILES["photoProduit"])){
    require('add_photo.php');
    if (isset($errorUpload)){
        header("Location: BE_addFlower.php?error=".$errorUpload);
    } else {
        $updatePhoto = $dbh->prepare("UPDATE `t_produit` SET `Image`=:photoProduit WHERE `idProduit`=:idProduit");                             
        $updatePhoto->bindParam(':photoProduit', $filename);
        $updatePhoto->bindParam(':idProduit', $_REQUEST["idProduit"]);
        $updatePhoto->execute();
    }
}


//Envoi dans la base de données
$stmt = $dbh->prepare("UPDATE `t_produit` SET `Designation`=:designationProduit,`prix`=:prixProduit,
                                `Stock`=:quantite_stock,`Description`=:descriptionProduit,
                                `idCategorie`=:code_categorie WHERE `idProduit`=:idProduit");

                                
$stmt->bindParam(':designationProduit', $_REQUEST["designationProduit"]);
$stmt->bindParam(':prixProduit', $_REQUEST["prixProduit"]);
$stmt->bindParam(':quantite_stock', $_REQUEST["quantite_stock"]);

$stmt->bindParam(':descriptionProduit', $_REQUEST["descriptionProduit"]);
$stmt->bindParam(':code_categorie', $_REQUEST["code_categorie"]);
$stmt->bindParam(':idProduit', $_REQUEST["idProduit"]);


$stmt->execute();

header("location: BackOffice.php");   

?>



