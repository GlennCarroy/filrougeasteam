<?php
@include '../connection_db.php';

// session_start();

// if (!isset($_GET['']) AND !isset($_GET[''])) {
// 	header("location: ... .php")
// };


$reponse_article = $pdo->query("SELECT Id, titre, contenu, categories, auteurs, DATE_FORMAT(date_ajout, '%d/%m/%Y à %Hh%i') AS date_ajout_fr FROM articles ORDER BY Id");

$reponse_article2 = $pdo->query("SELECT Id, titre, contenu, categories, auteurs, DATE_FORMAT(date_ajout, '%d/%m/%Y à %Hh%i') AS date_ajout_fr FROM articles ORDER BY Id");

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
	<header id="header-dashboard">
	    <div class="container">

	      <div id="logo" class="pull-left">
	        <!-- <h1><a href="#intro" class="scrollto"></a></h1> -->
	        <!-- Uncomment below if you prefer to use an image logo -->
	        <a href="#intro"><img src="../../img/download.png" alt="Logo DBA" title="Logo"></a>
	      </div>

	      <nav id="nav-menu-container">
	        <ul class="nav-menu">
	          <li class="menu-active"><a href="#intro">Blog</a></li>
	          <li><a href="#about">Ajouter article</a></li>
	          <li><a href="#gallery">Catégories</a></li>
	          <li><a href="#blog">Blog</a></li>
	          <li><a href="#contact">Contact</a></li>
	        </ul>
	      </nav><!-- #nav-menu-container -->
	    </div>
 	 </header><!-- #header -->

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
		            		<li><a href=""><div class="icon-blog"><i class="ion-edit">Éditer</i></div></a></li>
				            <li><a href=""><div class="icon-blog"><i class="ion-close">Supprimer</i></div></a></li>
				        </ul>
					  </div>
					</div>
<?php
}
?>
				</div>
				<br><br>
	        	<div class="row">
	        		<h2>Articles</h2>
		
<?php
while($donnees_article2 = $reponse_article2->fetch()){
?>
		          <div class="col-lg-12">
		            <div class="box wow fadeInLeft">
		            	<h5><?php echo $donnees_article2['auteurs']?> le <?php echo $donnees_article2['date_ajout_fr']?></h5>
		            	
		            	<ul class="modif-blog">
		            		<li><a href=""><div class="icon-blog"><i class="ion-edit"></i></div></a></li>
				            <li><a href=""><div class="icon-blog"><i class="ion-close"></i></div></a></li>
				        </ul>
				      <p><?php echo $donnees_article2['categories']?></p>
		              <h2 class="title-blog"><?php echo $donnees_article2['titre'] ?></h2>
		              
		              <p>
		              <?php echo $donnees_article2['contenu']?></p>
		              
		            </div>
		          
		          </div>
<?php
}
?>
  				</div>
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


</body>
</html>





