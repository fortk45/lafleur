<?php $testPage="Profil" ?>

<?php include 'header.php'?>
<br/>
    <main>
        <?php
            if(isset($_SESSION['email'])){
                include 'userPage.php';
            } else {
                if (isset($_REQUEST['error'])){
                    echo "<div style='color:#b00000;text-align:center;font-size:3vh'>Erreur : ";
                    switch ($_REQUEST['error']) {
                        case '1':
                            echo "Veuillez remplir tous les champs et ne pas modifier le code";
                            break;
                    
                        case '2':
                            echo "Les mot de passe ne correspondent pas";
                            break;

                        case '3':
                            echo "Identifiants incorrects";
                            break;
                    }
                    echo "</div><br/>";
                }
                if (isset($_REQUEST['act']) && ($_REQUEST['act']=='sign')){
                    include 'profil_Inscription.html';
                } else {
                    include 'loginForm.html';
                }
            }
        ?>
    </main>
<?php include 'footer.php'?>
</body>
</html>