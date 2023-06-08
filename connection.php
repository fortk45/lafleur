<?php
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=lafleur', 'root', '');
    } catch (PDOException $e) {
        die();
    }
?>