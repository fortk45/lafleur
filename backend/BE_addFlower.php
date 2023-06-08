<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>

<body>

<script>

</script>

<form method="GET" action="addProduit.php">
<br>
    <label>Désignation du produit :</label><br/>
    <input type="text" name="designationProduit" required><br>
<br>
    <label>Description :</label><br/>
    <input type="textarea" name="descriptionProduit" required><br/>
<br>
    <label>Photo :</label><br/>
    <input type="file" name="photoProduit" required><br/>
<br>
    <label>Prix à l'unité :</label><br/>
    <input type="number" min="0.00" step="0.01" name="prixProduit" required><br/>
<br>
    <label>Quantité en stock :</label><br/>
    <input type="number" name="quantite_stock" required><br/>
<br>
    <label>Catégorie :</label><br/>
    <select name="code_categorie">
    <?php
        require '../connection.php';
        $table = $dbh->query('SELECT * FROM t_categorie');
        $tableProduits = $table->fetchAll();
        foreach ($tableProduits as $ligne) {
            echo "<option value='".$ligne['idCategorie']."'>".$ligne['libelle']."</option>";
        } 
    ?>
    </select>
<br>

<br>
<button type="submit">Ajouter le produit</button>

</form>

</body>