<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>
<div class="titre_de_page">
    <p>Inscription</p>
</div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>


<form action="index.php?action=formInscription" method="post">

    <label for="pseudo">Identifiant:</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="Votre identifiant"/>

    <label for="passOne">Mot de passe</label>
    <input type="password" id="pass" name="pass" placeholder="Votre mot de passe"/>

    <label for="passTwo">Verification mot de passe</label>
    <input type="password" id="passTwo" name="passTwo" placeholder="Votre mot de passe"/>

    <input type="submit" value="envoyer"/>

    <input type="hidden" id="erreur" name="erreur"/>

</form>

<?php

?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
