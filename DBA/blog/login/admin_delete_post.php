<?php
@include '../connection_db.php';

// Initialise la session
session_start();
 
// Si la variable de session n'est pas définie, elle redirigera vers la page de connexion
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

// On convertit le GET en integer
$_GET['article'] = (int) $_GET['article'];

$reponse_article = $pdo->prepare("DELETE FROM articles WHERE Id = ?");

//l'id se trouve dans le GET
$reponse_article->execute(array($_GET['article']));


$reponse_article->closeCursor(); // Termine le traitement de la requête

header("location: admin_dashboard.php");

?>