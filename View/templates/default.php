<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
		<!-- Links -->
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="public/css/style.css" />
		<!-- Scripts -->
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

		<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
		<script type="text/javascript" src="public/js/tiny.js"></script>
		<!-- Metas description -->
		<meta name="description" content="Ebook de Jean Forteroche, Billet simple pour l'Alaska." />

          <!-- Open Graph data -->

        <meta property="og:title" content="Billet simple pour l'Alaska"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="index.php"/>
        <meta property="og:image" content="Billet simple pour l'Alaska"/>
        <meta property="og:description" content="Ebook de Jean Forteroche, Billet simple pour l'Alaska."/>

          <!-- Twitter Card data -->

        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="Billet simple pour l'Alaska">
        <meta name="twitter:description" content="Ebook de Jean Forteroche, Billet simple pour l'Alaska.">
        <meta name="twitter:image" content="public/images/book.png">
		<title>
			Ebook | Billet simple pour l'Alaska 
		</title>
	</head>

	<body>
		<header>
			<h1><a href="index.php">Mon Ebook</a></h1>
			<nav>
				<p><a href="index.php">Accueil</a></p>
				<?php if(isset($_SESSION['auth'])): ?>
					<p><a href="index.php?p=admin">Accéder à l'administration</a></p>
					<p><a href="index.php?p=admin.disconnect">Se déconnecter</a></p>
				<?php else: ?>
					<p><a href="index.php?p=login">Login</a></p>
				<?php endif; ?>
			</nav>
		</header>

		<div id="content">
			<?= $content; ?>
		</div>

		<footer>
			<p>Ebook Jean Forteroche ©<em>Copyright Tous droits réservés</em></p>
		</footer>
	</body>
</html>