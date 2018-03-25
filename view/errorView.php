<?php $title = 'Page d\'erreur'; ?>

<?php ob_start(); ?>
  <h1 id="titre_erreur">ERREUR</h1>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
  <section id="section_erreur">
    <p>Une erreur est survenue : <?= $msgErreur ?></p>
  </section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
