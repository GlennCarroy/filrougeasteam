<?php 
// session_start();
// if (!isset($_SESSION['login']) AND !isset($_SESSION['pwd'])) {
//   header('location: index.php');
// }

@include 'connection_db.php';

if (isset($_POST['submit'])) {
	if( isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['auteur']) ) {
		//Requête préparée pour envoyer dans la base de donées.
		$add_post = $pdo->prepare('INSERT INTO articles( titre , contenu , auteurs , categories , date_ajout ) VALUES (? , ? , ? , ? , ? ) ');
		/* On sanitize les entrées */
		$titre = htmlspecialchars($_POST['titre']);
		$contenu = htmlspecialchars($_POST['contenu']);
		$auteur = $titre = htmlspecialchars($_POST['auteur']);
		$categories = $_POST['categories'];
		$date = date("Y-m-d H:i:s");

		$add_post->execute(array( $titre , $contenu , $auteur , $categories , $date));
				
		echo '<body onLoad="alert(\'Votre nouvel article est en ligne.\')">';
	}
	else {
		echo '<body onLoad="alert(\'Remplissez tous les champs\')">';
		}
}
?>
<!DOCTYPE html>
<html lang="en" class="blog_html">
<head>
  <meta charset="utf-8">
  <title>DBA_blog_admin</title>
</head>
<body>

	<?php include 'admin_blog_header.php' ?>

	<form method="POST" >
		<label for="titre">Titre</label>
			<input type="text" name="titre" maxlength="70" required>
		<label for="contenu">Contenu</label>
			<textarea name="contenu" cols="30" rows="10" style="resize: none;"></textarea>
		<label for="auteur">Auteur</label>
			<input type="text" name="auteur" maxlength="50" required>
		<label for="categories">Catégorie</label>
			<select name="categories">
				<option value="Environnement">Environnement</option>
				<option value="Solidarité">Solidarité</option>
				<option value="Projets">Projets</option>
			</select>
		<input type="submit" value="Publier" name="submit">
	</form>
</body>
</html>