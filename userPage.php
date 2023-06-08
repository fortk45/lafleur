<style>
.whiteBox{
    font-size:2em;
    width:30%;
    text-align:left;
    padding-left:1em;
    margin-top:1em;
}
</style>

<?php
    $email = utf8_encode($_SESSION['email']);
    $nom = utf8_encode($_SESSION['nom']);
    $prenom = utf8_encode($_SESSION['prenom']);
    $adresse = utf8_encode($_SESSION['adresse']);
    $ville = utf8_encode($_SESSION['ville']);
    $cp = utf8_encode($_SESSION['codePostale']);
?>

        <div id="containerProfilProfil">
            <div class="row">
                <div class="whiteBox">
                    <?php echo "<b>Email :</b> ".$email; ?>
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "<b>Nom :</b> ".$nom; ?>
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "<b>Prenom :</b> ".$prenom; ?>
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "<b>Adresse :</b> ".$adresse; ?>                
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "<b>Ville :</b> ".$ville; ?>                
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "<b>Code Postal :</b> ".$cp; ?>
                </div>
            </div>
        </div>