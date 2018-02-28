<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	 <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
	<link rel="stylesheet" type="text/css" href="public/css/style.css" />
	<title>Ebook - Mon Nouveau livre</title>
</head>
<body>
	<header>
		<h1><a href="index.php">Mon Ebook</a></h1>
		<nav>
			<p><a href="index.php">Accueil</a></p>
			<?php if(isset($_SESSION['auth'])){
			?>
				<p><a href="index.php?p=admin">Accéder à l'administration</a></p>
				<p><a href="index.php?p=admin.disconnect">Se déconnecter</a></p>
			<?php
			}
			else{
			?>
				<p><a href="index.php?p=login">Login</a></p>
			<?php
			}
			?>
		</nav>
	</header>
	
	<div id="slider">		
	</div>
	
	<div id="content">
		<?= $content; ?>
	</div>

	<footer><p>Ebook Jean Rochefort ©<em>Copyright Tous droits réservés</em></p></footer>
</body>
</html>