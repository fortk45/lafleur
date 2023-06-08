<?php 
$namePage='Lafleur - Panier';
include 'header.php'
?>
    <main>
        <div id="containerPanier">

<?php
    include 'connection.php';
    $panierReq = $dbh->prepare('SELECT * FROM contenir WHERE idPannier=:idPanier');
    $panierReq->bindParam(':idPanier', $_SESSION['idPanier']);
    $panierReq->execute();
    $datasPanier = $panierReq->fetchAll();
?>

<?php
    foreach ($datasPanier as $anElement) {
        $productReq = $dbh->prepare('SELECT * FROM t_produit WHERE idProduit=:idProduit');
        $productReq->bindParam(':idProduit', $anElement['idProduit']);
        $productReq->execute();
        $datasProduct = $productReq->fetch();

        echo '<div class="rowPanier">

            <div class="greenPart">
                
                <div class="columnPanier"><h2>'.utf8_encode($datasProduct['Designation']).'</h2>
                    <h3>'.$datasProduct['prix']*$anElement['quantite'].'</h3>
                </div>
            </div>

            <div class="descPart">
                <p>'.utf8_encode($datasProduct['Description']).'</p>
                
            </div>

            <div class="numberPart">X'.$anElement['quantite'].'</div>
            <a href="backPanier/panierRemove.php?idProduit='.$datasProduct['idProduit'].'&act=all"><div class="validatePart">Supprimer</div></a>               
        </div>';
    }
?>
            
        </div>
    </main>
    <?php include 'footer.php'?>
</body>

</html>