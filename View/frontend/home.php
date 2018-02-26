<?php extract(['posts']); ?>

<h1>Les chapitres</h1>

<?php foreach ($posts as $post): ?>
	<h2><?= $post->title; ?></h2>
	<div><?= $post->content; ?></div>
	<p><em><?= $post->creation_date; ?></em></p>
<?php endforeach; ?>