<?php 
// Initialise la session
session_start();
 
// Si la variable de session n'est pas définie, elle redirigera vers la page de connexion
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}

@include '../connection_db.php';

$categories_liste = $pdo->query('SELECT * FROM categories_liste');
$categories_liste = $categories_liste->fetchAll();

if (isset($_POST['submit'])) {
	$categories = implode("," , $_POST['categories']);
}

?>
<form method="POST" class="create_main create_post" >
		
		<label for="categories">Catégorie(s)</label>
			<ul id="categories_liste_wrapper">
				<?php for ($i=0; $i < sizeof($categories_liste) ; $i++) { ?>

					<li><input type="checkbox" name="categories[]" value="<?php echo $categories_liste[$i]['categorie_nom'] ?>"><?php echo $categories_liste[$i]['categorie_nom'] ?></li>

				<?php } ?>
			</ul>
		<input type="submit" value="Publier" name="submit" class="button">
	</form>

	<?php var_dump($categories) ?>