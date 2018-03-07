<?php
@include '../connection_db.php';

// Initialise la session
session_start();
 
// Si la variable de session n'est pas définie, elle redirigera vers la page de connexion
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

// On convertit le GET en_integer
$_GET['article'] = (int) $_GET['article'];

if(isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['categories']) AND isset($_POST['auteur']) AND isset($_GET['article'])){

	$nvtitre = htmlspecialchars($_POST['titre']);
	$nvcontenu = htmlspecialchars($_POST['contenu']);
	$nvauteurs = htmlspecialchars($_POST['auteur']);

	//Requête pour modifier les champs dans 'articles'
	$req = $pdo->prepare("UPDATE articles SET 
		titre = :nvtitre, 
		contenu = :nvcontenu, 
		auteurs = :nvauteurs 
		WHERE Id = :Id");

	$req->execute(array(
	    'nvtitre' => $nvtitre,
	    'nvcontenu' => $nvcontenu,
	    'nvauteurs' => $nvauteurs,
	    'Id' => $_GET['article']
	    ));
	
	//On met à jour 'articles_has_categories' avec les catégories sélectionnées en fonction de l'id de l'article
	$nvcategories = $_POST['categories'];
	foreach ($nvcategories as $key => $value) {
		$update_categories = $pdo->prepare("UPDATE articles_has_categories SET 
		id_categories = :nvcategorie
		WHERE id_articles = :id_articles");

		$update_categories->execute(array(
		'nvcategorie' => $nvcategories['$key'],
		'id_articles' => $_GET['article']
		))
	}
}

//On appelle le tableau categories_list pour les diposer avec des checkbox
$categories_liste = $pdo->query("SELECT * FROM categories_liste");
$categories_liste = $categories_liste->fetchAll();

//Je mets ce code après pour que les modifs s'affichent quand on édite
//On va chercher la bdd en fonction de l'id
$reponse_article = $pdo->prepare("SELECT Id, titre, contenu, categories, auteurs, DATE_FORMAT(date_ajout, '%d/%m/%Y à %Hh%i') AS date_ajout_fr FROM articles WHERE Id = ?");

//l'id se trouve dans le GET
$reponse_article->execute(array($_GET['article']));

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Éditer article</title>
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
		// include('admin_blog_header.php');
?>
		<div class="container marg-top">
			<div class="row">
		
<?php
while($donnees_article = $reponse_article->fetch()){
?>
			        <div class="col-lg-12">
			            <div class="box wow fadeInLeft">
			            	<form action="" method="POST" class="create_post">
						       <h2>Éditer un article</h2>
						      
							      <label for="titre">Titre</label>
					              <input type="text" name="titre" value="<?php echo $donnees_article['titre'] ?>">

					              <label for="contenu">Contenu</label>
					              <textarea name="contenu" rows="10" cols="100"><?php echo $donnees_article['contenu']?></textarea>

					              <label for="auteur">Auteur</label>
					              <input type="text" name="auteur" value="<?php echo $donnees_article['auteurs']?>"> le <?php echo $donnees_article['date_ajout_fr']?>
									<br><br>
				              	<p>Catégorie(s) : </p>
				              	<p><i><?php echo $donnees_article['categories']?></i></p>
								
								<label for="categories">Changer catégorie(s)</label>
					        	<ul id="categories_liste_wrapper">
					        		<?php foreach ($categories_liste as $i => $value) {
					        		?>

					        		<li><input type="checkbox" name="categories[]" value="<?php echo $categories_liste[$i]['categorie_nom'] ?>"><?php echo $categories_liste[$i]['categorie_nom'] ?></li>

					        		<?php } ?>
						        </ul>

				              <div class="icon-blog"><i class="ion-edit"><input type="submit" value="Éditer" name="submit" class="button"></i></div>
			              	</form>
			            </div>
			        </div>

<?php
}
?>
			</div>
  		</div>

</body>
</html>