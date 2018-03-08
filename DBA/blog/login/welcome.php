<?php
// Initialise la session
session_start();
 
// Si la variable de session n'est pas définie, elle redirigera vers la page de connexion
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Bonjour, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Bienvenue sur le blog de DBA.</h1>
    </div>
    <p><a href="logout.php" class="btn btn-danger">Déconnexion de votre compte</a></p>
</body>
</html>