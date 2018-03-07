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
	if( isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['auteur']) AND isset($_POST['categories']) ) {
		//Requête préparée pour envoyer dans la base de donées.
		$add_post = $pdo->prepare('INSERT INTO articles( titre , contenu , auteurs , date_ajout ) VALUES (? , ? , ? , ? ) ');
		/* On sanitize les entrées */
		$titre = htmlspecialchars($_POST['titre']);
		$contenu = htmlspecialchars($_POST['contenu']);
		$auteur = $titre = htmlspecialchars($_POST['auteur']);
		$date = date("Y-m-d H:i:s");
		$add_post->execute(array( $titre , $contenu , $auteur , $date));

		/* Insertion des ID dans la table intermédiaire 'articles_has_categories' */
		$article_last_id = $pdo->query("SELECT LAST_INSERT_ID() FROM articles");
		$article_last_id = $article_last_id->fetch();
		$categories = $_POST['categories'];

		foreach ($categories as $key => $value) {
			$add_ids_in_midtable = $pdo->prepare("INSERT INTO articles_has_categories ( id_articles , id_categories ) VALUES ( ? , ? ) ");
			$add_ids_in_midtable->execute( array( $article_last_id[0] , $categories[$key] ) );
		}
				
		echo '<body onLoad="alert(\'Votre nouvel article est en ligne.\')">';
	}
	else {
		echo '<body onLoad="alert(\'Remplissez tous les champs\')">';
		}
}

$categories_liste = $pdo->query('SELECT * FROM categories_liste');
$categories_liste = $categories_liste->fetchAll();

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

	<form method="POST" class="create_main create_post" >
		<label for="titre">Titre</label>
			<input type="text" name="titre" maxlength="70" required>
		<label for="contenu">Contenu</label>
			<textarea name="contenu" cols="30" rows="10" style="resize: none;"></textarea>
		<label for="auteur">Auteur</label>
			<input type="text" name="auteur" maxlength="50" required>
		<label for="categories">Catégorie(s)</label>
			<ul id="categories_liste_wrapper">

				<!-- Génération de la liste de catégorie au départ de la table "catégorie" de la DB -->
				<?php for ($i=0; $i < sizeof($categories_liste) ; $i++) { ?>

					<li><input type="checkbox" name="categories[]" value="<?php echo $categories_liste[$i]['categorie_id'] ?>"><?php echo $categories_liste[$i]['categorie_nom'] ?></li>

				<?php } ?>
			</ul>
		<input type="submit" value="Publier" name="submit" class="button">
	</form>

	<?php var_dump( $article_last_id ) ?>

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