<?php if($error === true): ?>

<p><strong>Identifiant incorrect</strong></p>

<?php endif; ?>

<form id="login-form" method="post">
	<p>
		<label>Nom de l'administrateur :</label><br />
		<input type="pseudo" name="user" />
	</p>
	<p>
		<label>Mot de passe :</label><br />
		<input type="password" name="pass">
	</p>
	<p><button type="submit">Se connecter</button></p>
</form>