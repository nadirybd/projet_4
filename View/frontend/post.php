<!-- Affichage du post -->
<div id="post">
	<h1><?= $post->title; ?></h1>

	<div><?= $post->content; ?></div>
	<p><em><?= $post->date_fr; ?></em></p>
</div>

<!-- Navigation entre les chapitres -->
<div id="nav">
	<?php if($_GET['id'] >= 1 && $_GET['id'] < $max->maxId ): ?>
		<div class="next"><a href="index.php?p=post&id=<?= $post->id + 1; ?>">Voir le chapitre suivant</a> <i class="far fa-arrow-alt-circle-right"></i></div>
	<?php endif; if($_GET['id'] > 1): ?>
		<div class="prev"><i class="far fa-arrow-alt-circle-left"></i> <a href="index.php?p=post&id=<?= $post->id - 1; ?>"> Voir le chapitre précédent</a></div>
	<?php endif; ?>
</div>

<!-- Affichage des 3 derniers commentaires -->
<div id="comments">
	<?php foreach($comments as $comment): ?>
		<div class="comment">
			<p>
				<?= htmlspecialchars($comment->pseudo); ?> à posté :
			</p>

			<div><?= htmlspecialchars($comment->comment); ?></div>

			<p><em> <?= $comment->comment_dateFr; ?></em></p>
		</div>
	<?php endforeach; ?>

	<div class="more_comments">
		<p><a href="index.php?p=comments&id=<?= $post->id; ?>">Voir tous les commentaires ...</a></p>

		<p>
			<button>
				<a href="index.php?p=comments&id=<?= $post->id; ?>">Ajouter un commentaire</a>
			</button>
		</p>
	</div>
</div>
