<div id="accueil">
	<h1>Billet simple pour l'Alaska</h1>

	<?php foreach ($posts as $post): ?>
		<section>
			<h2><a href="index.php?p=post&id=<?= $post->id; ?>"><?= $post->title; ?></a></h2>
			<div id="post-content">
				<div><?= strip_tags(substr($post->content, 0, 800)); ?> </div>...
				<a href="index.php?p=post&id=<?= $post->id; ?>"> Voir la suite</a>
			</div>
			<p><em><?= $post->date_fr; ?></em></p>
		</section>
	<?php endforeach; ?>
	<p>
		<?php for($page=1; $page<=$number_of_pages; $page++): ?>
			<?php if($page == $current_page): ?>
				<span><?= $page; ?></span>
			<?php else: ?>
			<a href="index.php?p=home&page=<?= $page; ?>">
				<?= $page; ?>
			</a> 
			<?php endif; ?> |
		<?php endfor; ?>
	</p>
</div>
