<div id="search-result">
	<h1>Votre recherche</h1>

	<?php if(isset($unknown)): ?>
		<p><?= $unknown; ?></p>
	<?php endif; ?>

	<?php foreach($searchPost as $post): ?>
		<section>
			<h2><a href="index.php?p=post&id=<?= $post->id; ?>"><?= $post->title; ?></a></h2>
			<div>
				<div><?= strip_tags(substr($post->content, 0, 800)); ?> </div>...
				<a href="index.php?p=post&id=<?= $post->id; ?>"> Voir la suite</a>
			</div>
		</section>
	<?php endforeach; ?>
</div>