<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div id='Administration-titre'>
  <p>ADMINISTRATION</p>
</div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
<section>
  <nav id="nav_administration">
    <ul>
      <li><a href='#'>Nouveau chapitre</a></li>
      <li><a href='#'>Mise à jour chapitre</a></li>
      <li><a href='#'>Suppression chapitre</a></li>
      <li><a href='#'>Gestion des commentaires</a></li>
    </ul>
  </nav>
</section>

<div id="BlocNewChapter">
  <h1>Nouveau chapitre</h1>
  <div id="interfaceTiny">
    
  </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
