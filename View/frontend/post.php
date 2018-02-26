<h1><?= $post->title; ?></h1>

<div><?= $post->content; ?></div>
<p><em><?= $post->date_fr; ?></em></p>
<div>
	<?php if($_GET['id'] >= 1 && $_GET['id'] < $max->maxId ): ?>
		<p><a href="index.php?p=post&id=<?= $post->id + 1; ?>">Voir le chapitre suivant </a><i class="far fa-arrow-alt-circle-right"></i></p>
	<?php endif; if($_GET['id'] > 1): ?>
		<p><i class="far fa-arrow-alt-circle-left"></i><a href="index.php?p=post&id=<?= $post->id - 1; ?>"> Voir le chapitre précédent</a></p>
	<?php endif; ?>
</div>
