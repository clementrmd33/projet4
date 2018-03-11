<?php $title = 'Page d\'erreur'; ?>

<?php ob_start(); ?>
  <h1>PAGE INTROUVABLE</h1>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
  <section>
    <p>La page que vous avez demandé et actuellement indisponible</p>
  </section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
