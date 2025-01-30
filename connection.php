<?php
$dsn = 'mysql:host=127.0.0.1;dbname=crud;charset=utf8';
$username = 'admin';
$password = 'Afpa1234';

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    ]);
    //echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>