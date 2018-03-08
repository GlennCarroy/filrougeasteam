<?php
@include '../connection_db.php';

// Initialise la session
session_start();
 
// Si la variable de session n'est pas définie, elle redirigera vers la page de connexion
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}


//Va chercher la table articles
$reponse_article = $pdo->query("SELECT Id, titre, contenu, auteurs, DATE_FORMAT(date_ajout, '%d/%m/%Y à %Hh%i') AS date_ajout_fr FROM articles ORDER BY date_ajout DESC");


?>

<!DOCTYPE html>
<html lang="fr">
<head>
		<meta charset="UTF-8">
		<title>Blog - Dashboard</title>
		
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="keywords">
		<meta content="" name="description">

		<!-- Favicons -->
		<link href="../../img/favicon.png" rel="icon">
		<link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

		<!-- Bootstrap CSS File -->
		<link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Libraries CSS Files -->
		<link href="../../lib/animate/animate.min.css" rel="stylesheet">
		<link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="../../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="../../lib/magnific-popup/magnific-popup.css" rel="stylesheet">

		<link rel="stylesheet" href="style.css">
</head>
<body>
	
<?php 
	include('admin_blog_header.php');
?>

	<main id="main">
		<section id="more-features" class="section-bg">
	    	<div class="container p-0">
		        <div class="section-header">
		          <h3 class="section-title">Blog : Dashboard</h3>
		          <span class="section-divider"></span>
		        </div>

		       	<div class="row">
				
<?php
while($donnees_article = $reponse_article->fetch()){
?>

		        <div class="card col-lg-3 col-md-3 m-1">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $donnees_article['titre'] ?></h5>
					    <h6 class="card-subtitle mb-2 text-muted"><?php echo $donnees_article['auteurs']?> le <?php echo $donnees_article['date_ajout_fr']?></h6>
					    <ul class="modif-blog">
		            		<li><a href="admin_update_post.php?article=<?php echo $donnees_article['Id']?>"><div class="icon-blog"><i class="ion-edit">Éditer</i></div></a>
		            		</li>
				            <li><a href="admin_delete_post.php?article=<?php echo $donnees_article['Id']?>" class="confirmation"><div class="icon-blog"><i class="ion-close">Supprimer</i></div></a>
				            </li>
				        </ul>
					  </div>
				</div>
<?php
}

$reponse_article->closeCursor(); // Termine le traitement de la requête
?>
				</div>
				<br><br>	        	
  			</div>
   		</section>
	</main>

  <!--==========================
    Footer
  ============================-->
<?php include('admin_blog_footer.php') ?>

</body>
</html>





