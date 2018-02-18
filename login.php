<?php ob_start(); ?>
	<form method="post" action="#" id="login">
		<h1>Identification</h1>
		<div id="container-login">
			<input type="text" name="identifiant" id="identifiant" placeholder="Vos identifiant"></input></br>
			<input type="password" name="password" id="password" placeholder="Votre mot de passe"></br>
			<div id="bloc-bouton">
				<button><i class="fas fa-sign-in-alt"></i>Se connecter</button>
			</div>
		</div>
	</form>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>