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
$reponse_article = $pdo->query("SELECT Id, titre, contenu, categories, auteurs, DATE_FORMAT(date_ajout, '%d/%m/%Y à %Hh%i') AS date_ajout_fr FROM articles ORDER BY date_ajout DESC");

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

		        <div class="card col-lg-3 m-1">
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
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Avilon</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">A propos</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../../lib/jquery/jquery.min.js"></script>
  <script src="../../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../lib/easing/easing.min.js"></script>
  <script src="../../lib/wow/wow.min.js"></script>
  <script src="../../lib/superfish/hoverIntent.js"></script>
  <script src="../../lib/superfish/superfish.min.js"></script>
  <script src="../../lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../../js/main.js"></script>

	<script type="text/javascript">
	    $('.confirmation').on('click', function () {
	        return confirm('Êtes-vous sûr de supprimer l\'article ?');
	    });
	</script>

</body>
</html>





