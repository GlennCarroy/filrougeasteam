<?php 
// Initialise la session
session_start();
 
// Si la variable de session n'est pas définie, elle redirigera vers la page de connexion
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

@include '../connection_db.php';

if (isset($_POST['submit'])) {
	if( isset($_POST['categorie_nom']) ) {
		//Requête préparée pour envoyer dans la base de donées.
		$add_cat = $pdo->prepare('INSERT INTO categories_liste( categorie_nom ) VALUES ( ? ) ');
		/* On sanitize les entrées */
		$nom_cat = ucfirst(htmlspecialchars($_POST['categorie_nom']));
		$add_cat->execute(array( $nom_cat ));
		header('Location: admin_create_categorie.php');
	}
}
/* Récupération des catégories pour les afficher dans l'html */
$liste_cat = $pdo->query('SELECT * FROM categories_liste ORDER BY categorie_nom');
$liste_cat = $liste_cat->fetchAll();

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

	<?php include 'admin_blog_header.php' ?>

	<form method="POST" class="create_main">
		<label for="categorie_nom">Créer une nouvelle catégorie</label>
			<input type="text" name="categorie_nom" maxlength="30" required>
		<input type="submit" name="submit" value="Enregistrer">
	</form>
	<br>
	<h3>Catégories du blog</h3>
	<ul>
		<?php 
			for ($i=0; $i < sizeof($liste_cat); $i++) { ?>
				<li><?php echo $liste_cat[$i]['categorie_nom'] ?></li>
				<a href="admin_delete_categorie.php?categorie=<?php echo $liste_cat[$i]['categorie_id'] ?>">Supprimer</a>
		<?php	}
		 ?>
	</ul>

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
