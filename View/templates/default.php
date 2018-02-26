<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
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
				<p><a href="admin.php">Accéder à l'administration</a></p>
				<p><a href="admin.php?p=disconnect">Se déconnecter</a></p>
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