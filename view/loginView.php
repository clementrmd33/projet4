<?php $title = 'Connection'; ?>

<?php ob_start(); ?>
<div id="login-titre">
  <p>Identification</p>
</div>
<?php $info = ob_get_clean();?>

<?php ob_start(); ?>
<div id="bloc_login">
  <form method="post" action="index.php?action=connect" id="login">
    <div id="container-login">
      <input type="text" name="pseudo" id="pseudo" placeholder="Vos identifiant"></input></br>
      <input type="password" name="pass" id="pass" placeholder="Votre mot de passe"></br>
      <div class="bloc-bouton">
        <button><i class="fas fa-sign-in-alt"></i>Se connecter</button>
      </div>
    </div>
  </form>
</div>
<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>
