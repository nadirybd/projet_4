<div id="accueil">
	<h1>Accueil - Liste des chapitres</h1>

	<?php foreach ($posts as $post): ?>
		<div class="posts">
			<h2><a href="index.php?p=post&id=<?= $post->id; ?>"><?= $post->title; ?></a></h2>
			<div>
				<?= substr($post->content, 0, 800); ?> ...
				<a href="index.php?p=post&id=<?= $post->id; ?>"> Voir la suite</a>
			</div>
			<p><em><?= $post->date_fr; ?></em></p>
		</div>
	<?php endforeach; ?>
</div>