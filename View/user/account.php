<div id="account">
	<h1>Gérer votre compte</h1>

	<?php if($error): ?>
		<div class="error">Identifiant incorrect</div>	
	<?php endif; ?>

	<form method="post">
	<p>
		<label for="name">Votre nom d'administrateur :</label><br/>
		<input type="pseudo" name="admin_name" id="name" value="<?= $pass->name; ?>"/>
	</p>
	<p>
		<label for="old_password">Entrez votre ancien mot de passe :</label><br/>
		<input type="password" name="old_pass" id="old-pass"/>
	</p>
	<p>
		<label for="new_password">Votre nouveau mot de passe :</label><br/>
		<input type="password" name="new_pass" id="new-pass"/>
	</p>
	<p>
		<input type="submit" name="user-info" value="Confirmez les modifications" />
	</p>
	</form>
</div>