<?php 

@include 'connection_db.php';

$categorie_to_delete = $_GET['categorie'];

$delete_categorie = $pdo->query(" DELETE FROM `categories_liste` WHERE  categorie_id = $categorie_to_delete ");


header('Location: admin_create_categorie.php');


 ?>