<? foreach ($comments as $comment) : ?>
	<p><?= $comment->pseudo; ?> <em><?= $comment->comment_dateFr;?></em></p>
	<div><?= $comment->comment; ?></div>
<? endforeach; ?>

<form id="form-comment" method="post">
	<p>
		<label>Votre Pseudo :</label><br />
		<input type="pseudo" name="pseudo" />
	</p>
	<p>
		Votre commentaire : <br />
		<textarea name="text" cols="40" rows="10"></textarea>
	</p>
	<button type="submit">Envoyer votre commentaire</button>
</form>