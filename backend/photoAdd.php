<?php
    // Extensions de fichiers autorisées
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
     // Récupérez les données du fichier
    $filename = $_FILES["photoProduit"]["name"];
    $filetmpname = $_FILES["photoProduit"]["tmp_name"];
    $filesize = $_FILES["photoProduit"]["size"];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)){
        $errorUpload="ext";//Taille non autorisée
        exit();
    }
    // Vérifiez la taille maximale du fichier (2 Mo)
    if ($filesize < 2000000) {

        // Définissez le chemin de stockage du fichier
        $fileDestination = 'justificatifs/attestation/' . $filename;

        // Déplacez le fichier de sa source temporaire à sa destination finale
        move_uploaded_file($filetmpname, $fileDestination);

    } else {
        $errorUpload="size";//Le fichier est trop volumineux (taille maximale: 2 Mo)        
    }
?>