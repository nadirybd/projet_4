<div id="all_comments">
	<? foreach ($comments as $comment) : ?>
		<div class="comment">
			<p>
				<?= htmlspecialchars($comment->pseudo); ?> à posté :
			</p>

			<div><?= htmlspecialchars($comment->comment); ?></div>

			<p><em> <?= $comment->comment_dateFr; ?></em></p>
		</div>
	<? endforeach; ?>
</div>

<form id="form-comment" method="post">
	<p>
		<label>Votre Pseudo :</label><br />
		<input type="pseudo" name="pseudo" />
	</p>
	<p>
		Votre commentaire : <br />
		<textarea name="text" cols="60" rows="15"></textarea>
	</p>
	<button type="submit">Envoyer votre commentaire</button>
</form>