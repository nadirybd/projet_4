<!-- Affichage du post -->
<div id="post">
	<h1><?= $post->title; ?></h1>

	<div><?= $post->content; ?></div>
	<p><em><?= $post->date_fr; ?></em></p>
</div>

<!-- Affichage des 3 derniers commentaires -->
<div id="comments">
	<?php foreach($comments as $comment): ?>
			<?php if($comment->comment_id > 0): ?>
		<div class="comment">
				<p>
					<?= htmlspecialchars($comment->pseudo); ?> à posté :
				</p>

				<div><?= htmlspecialchars($comment->comment); ?></div>

				<p><em> <?= $comment->comment_dateFr; ?></em></p>

				<form class="report" method="post">
					<input type="hidden" name="report" value="<?= $comment->comment_id; ?>" />
					<input type="submit" name="send_report" value="Signaler"/>
				</form>
		</div>
			<?php endif; ?>
	<?php endforeach; ?>

	<div class="more_comments">
		<p><a href="index.php?p=comments&id=<?= $post->id; ?>">Voir tous les commentaires ...</a></p>

		<p><a class="button" href="index.php?p=comments&id=<?= $post->id; ?>">Ajouter un commentaire</a></p>
	</div>
</div>
