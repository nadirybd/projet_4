<h1>Les chapitres</h1>

<?php foreach ($posts as $post): ?>
	<h2><?= $post->title; ?></h2>
	<div>
		<?= substr($post->content, 0, 800); ?> ...
		<a href="index.php?p=post&id=<?= $post->id; ?>"> Voir la suite</a>
	</div>
	<p><em><?= $post->date_fr; ?></em></p>
<?php endforeach; ?>