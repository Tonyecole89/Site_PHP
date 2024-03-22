<?php
$dsn = "mysql:dbname=B1_PHP_Devoir1;host=db;charset=utf8";
$username = "root";
$password = "root";
try {
    $pdo = new PDO($dsn, $username, $password);
} catch(Exception $erreur) {
    echo "<h1>Vous avez une erreur de connexion</h1>";
    var_dump($erreur->getMessage());
    exit();
}