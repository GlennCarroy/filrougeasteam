<?php
@include 'connection_db.php';


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DBA_blog</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
  	<h1>Blog de la DBA</h1>
  	<ul>
  		<li><a href="categories.php?categorie=environnement">Environnement</a></li>
  		<li><a href="categories.php?categorie=projets"></a>Projets</li>
  		<li><a href="categories.php?categorie=solidarite"></a>Solidarité</li>
  	</ul>
  </body>
  </html>