<?php include 'header.php'?>
<!-- FAUDRA JUSTE AJOUTER A SHOP -->
    <main>
        <section>
            
            <?php

                include "connection.php";
                $sql='SELECT * FROM t_produit;';
                if(isset($_GET["recherche"]) and !empty($_GET["recherche"])){
                    $recherche= htmlspecialchars($_GET["recherche"]);
                    $sql='SELECT * FROM t_produit WHERE Designation LIKE "%'.$recherche.'%";';
                }
                $table = $dbh->query($sql);
                ?>

                <form method="get">
                    <input type="search" name="recherche" id="recherche" placeholder="Recherche..." onfocusout="verif()" />
                    <input type="submit" value="Valider" />
                    <div id="erreurRecherche"></div>
                </form>
                <div id="shop">
                <?php
                    if($table -> rowCount() > 0){ ?>
                        <form action="info-produit.php" method="get">
                        <ul>
                            <?php
                                foreach ($table as $ligne) {
                                    echo '<div class="card">
                                            <img src="./images/'.$ligne['Image'].'" alt="'.$ligne['Designation'].'">
                                            <h2>'.$ligne['Designation'].'</h2>
                                            <p>'.$ligne['Description'].'</p>
                                            <form>
                                                <button type="submit" id="commande_'.$ligne['idProduit'].'">COMMANDER</button>
                                            </form>
                                        </div>';
                                }                                 
                            ?>
                        </ul>
                        </form></div><?php
                    }else { ?>
                        <div>Aucun résultat pour: <?  $recherche ?> ...</div>
                        <?php } ?>
        </section>
    </main>
</body>
    <script>
        function verif(){
            var Recherche = document.getElementById("recherche").value;
            var regex =/^[a-zA-Z\séèêëàâùûîïôöç\'\"\.]{0,50}$/;
            if (Recherche.match(regex)){
                erreurRecherche.innerHTML = "";
            }else{
                erreurRecherche.innerHTML = "<font color = red style=\"font-size:80%\"> Attention, merci d'entre des caractères valide !</font>";
            }
        }
    </script>
</html>