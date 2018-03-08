<?php
<<<<<<< HEAD
$host='ec2-54-75-244-248.eu-west-1.compute.amazonaws.com';
$port=5432;
$dbname='df7ec37j1tssli';
$user='jxkvacjrsdhepi';
$pwd='8e98d59ce72f3d7156205f046a94de8f8daabdbf916e1171a35ea151ee52c1d2';

=======
>>>>>>> 287fdfee6aa2db9d8661ac0655781ab9432c2178
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'filrougeasteam');
 
/* Tentative de connexion à la base de données MySQL */
try{
<<<<<<< HEAD
    $pdo = new PDO('pgsql:host='.$host.';port='.$port.';dbname='.$dbname.';user='.$user.';password='.$pwd.'');
=======
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
>>>>>>> 287fdfee6aa2db9d8661ac0655781ab9432c2178
    // Vérifier la connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
