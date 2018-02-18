<?php ob_start(); ?>
	<form method="post" action="#">
		<label>Identifiant :</label>
		<input type="text" name="identifiant" id="identifiant"></input>
	</form>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>