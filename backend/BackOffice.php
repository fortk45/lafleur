<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../css/index.css">
    <title>Document</title>
</head>
<body> 

<?php
session_start();
?>

<header>
    <ul id="navbar">
        <a href="#"><li><img src="./icons/rmbg_logoLaFleur.png"></li></a>
        <a href="./index.php"><li>LAFLEUR</li></a>
        <a href="./accueil.php"><li>ACCUEIL</li></a>
        <a href="./shop.php"><li>SHOP</li></a>
        <a href="./contact.php"><li>CONTACT</li></a>
        <a href="./profil.php"><li>
            <?php if(isset($_SESSION['email'])){
                echo "PROFIL";
            } else {
                echo "CONNEXION";
            }
            ?></li></a>
        <a href="./panier.php"><li>PANIER</li></a>
    </ul>
</header>
<?php 

require '../connection.php';?>

<label>Ajouter une catégorie</label>
<a href="ajouterCategorie.php"><button>Ajouter</button></a>

<br/><br/>


<label>Ajouter un produit</label>
<a href="ajouterProduit.php"><button>Ajouter</button></a>

<br/><br/>


<label>Modifier une catégorie</label>

<form method="GET" action="modifierCategorie.php">
    <select name="code">
        <?php
        

        $sql = 'SELECT * FROM t_categorie';
        $table = $dbh->query($sql);
        while ($ligne = $table->fetch()) {
            echo "<option value=".$ligne['idCategorie'].">".$ligne['libelle']."</option>";
        }
            ?>

    </select><br/>
    <br>
    <button type="submit">Modifier</button>
</form>


<br/><br/>


<label>Modifier un produit</label>
<form method="GET" action="modifierProduit.php">
    <select name="ref">
        <?php
        

        $sql = 'SELECT * FROM t_produit';
        $table = $dbh->query($sql);
        while ($ligne = $table->fetch()) {
            echo "<option value=".$ligne['idProduit'].">".$ligne['Designation']."</option>";
        }
            ?>

    </select><br/>
    <br>
    <button type="submit">Modifier</button>
</form>
<br/><br/>


<label>Supprimer une catégorie</label>
<form method="GET" action="supprimerCategorie.php">
    <select name="code">
        <?php
        

        $sql = 'SELECT * FROM t_categorie';
        $table = $dbh->query($sql);
        while ($ligne = $table->fetch()) {
            echo "<option value=".$ligne['idCategorie'].">".$ligne['libelle']."</option>";
        }
            ?>

    </select><br/>
    <br>
    <button type="submit">Supprimer</button>
</form>

<br/><br/>


<label>Supprimer un produit</label>

<form method="GET" action="supprimerProduit.php">
    <select name="ref">
        <?php
        
        $sql = 'SELECT * FROM t_produit';
        $table = $dbh->query($sql);
        while ($ligne = $table->fetch()) {
            echo "<option value=".$ligne['idProduit'].">".$ligne['Designation']."</option>";
        }
            ?>

    </select><br/>
    <br>
    <button type="submit">Supprimer</button>
</form>


<br/><br/>
