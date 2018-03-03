<div id="all_comments">
	<h1><?= $post->title; ?></h1>
	
	<h2>Tous les commentaires :</h2>
	<p>
		<a href="index.php?p=post&id=<?= $post->id; ?>">
			 <i class="fas fa-angle-left"></i> Retour 
		</a>
	</p>

	<? foreach ($comments as $comment) : ?>
		<?php if($comment->comment_id > 0): ?>
			<div class="comment">
				<p>
					<?= htmlspecialchars($comment->pseudo); ?> à posté :
				</p>

				<div><?= htmlspecialchars($comment->comment); ?></div>

				<p><em> <?= $comment->comment_dateFr; ?></em></p>

				<?php if(isset($_SESSION['auth'])): ?>
				<form class="delete" method="post">
					<input type="hidden" name="delete" value="<?= $comment->comment_id; ?>" />
					<input type="submit" name="delete_comment" value="Supprimer" />
				</form>
				<?php elseif (!isset($_SESSION['auth'])): ?>
				<form class="report" method="post">
					<input type="hidden" name="report" value="<?= $comment->comment_id; ?>" />
					<input type="submit" name="send_report" value="Signaler"/>
				</form>
				<?php endif; ?>
			</div>
		<?php endif; ?>
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
	
	<?php if($error): ?>
		<div class="error">Veuillez ne pas dépasser la limite de 25 caractères pour le pseudo</div>
	<?php endif; ?>
	
	<button type="submit" name="send_comment">Envoyer votre commentaire</button>
</form>
	