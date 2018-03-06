<?php
@include 'connection_db.php';

$cat_select= $_GET['categorie'];

$categorie_articles = $pdo->query("SELECT * FROM articles WHERE categories = '$cat_select' ORDER BY date_ajout DESC ");

$categorie_articles = $categorie_articles->fetchAll(); //rends un tabl

?>
<!DOCTYPE html>
<html lang="en" class="blog_html">
<head>
  <meta charset="utf-8">
  <title>DBA_blog_catégorie</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header" class="blog_header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#intro" class="scrollto"></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="../img/download.png" alt="Logo DBA" title="Logo"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Accueil</a></li>
          <li><a href="#about">A propos</a></li>
          <li><a href="#axes">Axes d'intervention</a></li>
          <li><a href="#features">Projet jeunes "DO IT"</a></li>
          <li><a href="#call-to-action">Faire un DON</a></li>
          <li><a href="#gallery">Gallerie</a></li>
          <li><a href="blog/visiteur_blog.php">Blog</a></li>
          <!--<li class="menu-has-children"><a href=""></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>-->
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <main id="main" class="blog_main">
  	<nav>
  		<ul>
	  		<li><a href="visiteur_blog.php">Retour</a></li>
	  	</ul>
	</nav>
	<h2>Article concernant la catégorie "<?php echo $cat_select ?>"</h2>
	<?php for ($i=0; $i < sizeof($categorie_articles); $i++) {  
		//conversion de la date au format européen
		$sqldate = strtotime($categorie_articles[$i]["date_ajout"]); 
		$eurodate = date('d-m-Y H:i:s', $sqldate);
		?>
			<div class="articleWrapper">
				<h3><?php echo $categorie_articles[$i]["titre"]?></h3>
					<p><?php echo $categorie_articles[$i]["contenu"] ?></p>
					<ul>
						<li><?php echo $categorie_articles[$i]["auteurs"] ?></li>
						<li><?php echo $eurodate; ?></li>
					</ul>
			</div>

	<?php	};
	?>
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
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/superfish/hoverIntent.js"></script>
  <script src="../lib/superfish/superfish.min.js"></script>
  <script src="../lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../js/main.js"></script>

</body>
</html>
