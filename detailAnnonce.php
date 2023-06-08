<?php 
$namePage='Lafleur - Catalogue';
include 'header.php'?>
    <main>

    <?php
        include 'connection.php';
        
        $table = $dbh->prepare('SELECT * FROM t_produit WHERE idProduit=:idProduit');
        $table->bindParam(':idProduit', $_REQUEST["produit"]);
        $table->execute();

        $datasProduit = $table->fetch();
    ?>
        <div id="containerDetail">
            <div class="rowPhone row">
                <div class="column leftDetail">

                    <div class="row">
                        <div class="whiteBox">
                            <?php echo utf8_encode($datasProduit['Designation']) ?>
                        </div>
                        <span class="greenBox" style="margin-left:0px">
                            <?php echo $datasProduit['prix']."€" ?>
                        </span>
                    </div>

                    <p class="desc"><?php echo utf8_encode($datasProduit['Description']) ?></p>

                    <?php if ($datasProduit['Stock'] == 0){
                        echo '<div class="row">
                            Rupture de stock
                        </div>';
                    } else { ?>
                    <a href="backPanier/panierAdd.php?idProduit=<?php echo $datasProduit['idProduit'] ?>" >
                         <div class="row">
                            <div class="whiteBox">
                                Ajouter
                                
                            </div>
                            <span class="greenBox">
                                ->
                            </span>
                        </div>
                    </a>

                    <?php } ?>

                </div>
        
                <div class="rightDetail">
                    <img src="./images/<?php echo $datasProduit['Image'] ?>" alt="">
                </div>
              </div>
        </div>

    </main>
    <?php include 'footer.php'?>
</body>
</html>