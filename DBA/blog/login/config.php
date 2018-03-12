<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'id5039817_marinesclavons');
define('DB_PASSWORD', 'MasclA21Sh');
define('DB_NAME', 'id5039817_filrougeasteam');
 
/* Tentative de connexion à la base de données MySQL */
try{

    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

    // Vérifier la connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
