<?php 
// session_start();
// if (!isset($_SESSION['login']) AND !isset($_SESSION['pwd'])) {
//   header('location: index.php');
// }

@include 'connection_db.php';

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

$liste_cat = $pdo->query('SELECT * FROM categories_liste ORDER BY categorie_nom');
$liste_cat = $liste_cat->fetchAll();

?>
<!DOCTYPE html>
<html lang="en" class="blog_html">
<head>
  <meta charset="utf-8">
  <title>DBA_blog_admin</title>
</head>
<body>

	<?php include 'admin_blog_header.php' ?>

	<form method="POST">
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

</body>
</html>
