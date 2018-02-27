<div id="all_comments">
	<? foreach ($comments as $comment) : ?>
		<div class="comment">
			<p>
				<?= htmlspecialchars($comment->pseudo); ?> à posté :
			</p>

			<div><?= htmlspecialchars($comment->comment); ?></div>

			<p><em> <?= $comment->comment_dateFr; ?></em></p>

			<form class="report" method="post">
				<input type="hidden" name="report" value="<?= $comment->comment_id; ?>" required/>
				<input type="submit" name="send_report" value="Signaler"/>
			</form>
		</div>
	<? endforeach; ?>
</div>

<form id="form-comment" method="post">
	<p>
		<label>Votre Pseudo :</label><br />
		<input type="pseudo" name="pseudo" required/>
	</p>
	<p>
		Votre commentaire : <br />
		<textarea name="text" cols="60" rows="15" required></textarea>
	</p>
	<button type="submit" name="send_comment">Envoyer votre commentaire</button>
</form>