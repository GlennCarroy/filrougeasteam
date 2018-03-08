<?php
@include 'connection_db.php';

$top_blog = $pdo->query("SELECT * from articles ORDER BY articles.date_ajout DESC");

$lien_vers_categories = $pdo->query("SELECT * FROM categories_liste ORDER BY categorie_nom ");

/* Générer les tableaux de donées. */
$top_blog = $top_blog->fetchAll();
$lien_vers_categories = $lien_vers_categories->fetchAll();

?>
<!DOCTYPE html>
<html lang="en" class="blog_html">
<head>
  <meta charset="utf-8">
  <title>DBA_blog</title>
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
  <link href="login/style.css" rel="stylesheet">

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
  <header id="header-dashboard">
    <div class="container">

      <div id="logo" class="pull-left">
      
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="../img/download.png" alt="Logo DBA" title="Logo"></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="../index.html">Accueil</a></li>
           <li><a href="visiteur_blog.php">Blog</a></li>
           <li><a href="login/login.php">Login Admin</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <main id="main">
    <section id="more-features" class="section-bg">
        <div class="container p-0">
          <div class="section-header">
          	<h3 class="section-title">Blog de la DBA</h3>
             <span class="section-divider"></span>
          </div> 
        
      	  	<ul class="nav">
              <!-- Affichage du menu via les catégories présentes dans la table "catégorie" de la DB -->
              <?php 
                foreach ($lien_vers_categories as $key => $value) { ?>
                  <li class="nav-item"><a class="nav-link active" href="visiteur_categories.php?categorie=<?php echo $lien_vers_categories[$key]['categorie_id'] ?>"><?php echo $lien_vers_categories[$key]['categorie_nom'] ?></a></li>
              <?php } ?>
      	  	</ul>
      	   
  	       
           <h2>Derniers articles en ligne</h2>

      	 <?php for ($i=0; $i < 5; $i++) {  
      	 		//conversion de la date au format européen
      		$sqldate = strtotime($top_blog[$i]["date_ajout"]); 
      		$eurodate = date('d-m-Y H:i:s', $sqldate);
      	 	?>
      			<div class="create_post">
      				  <span class="categories_tags">
                  <?php 
                    $categories_selection = $pdo->prepare("
                      SELECT categories_liste.categorie_nom 
                      from categories_liste 
                      INNER JOIN articles_has_categories 
                      ON articles_has_categories.id_categories = categories_liste.categorie_id 
                      AND articles_has_categories.id_articles= ? ");
                    $categories_selection->execute(array($top_blog[$i][0]));
                    $categories_selection = $categories_selection->fetchAll();
                      foreach ($categories_selection as $key => $value) {
                        echo $categories_selection[$key]['categorie_nom'].' ';
                      };
                    ?>   
                </span>
      				<h2 class="cadre mt-2"><?php echo $top_blog[$i]["titre"]?></h2>
      					<p><?php echo $top_blog[$i]["contenu"] ?></p>
      					<ul>
      						<li><?php echo $top_blog[$i]["auteurs"] ?></li>
      						<li><?php echo $eurodate ?></li>
      					</ul>
      			</div>


          	<?php	};
          	?>
        </div>
    </section>
  </main>
 <!--==========================
    Footer
  ============================-->
<?php include('login/admin_blog_footer.php') ?>

</body>
</html>
