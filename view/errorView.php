<?php $title = 'Page d\'erreur'; ?>

<?php ob_start(); ?>
    <div class="titre_de_page">
        <p>Page d'erreur</p>
    </div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
  <section id="section_erreur">
    <p>Une erreur est survenue : <?= $msgErreur ?></p>
  </section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
