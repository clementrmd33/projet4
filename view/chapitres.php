<?php $title = 'Chapitres'; ?>

<?php ob_start(); ?>
<div id="chapitre-titre">
  <p>Chapitres</p>
</div>
<?php $info = ob_get_clean(); ?>

  <?php ob_start(); ?>
  <div id="block_page_2">
      <?php foreach ($posts as $d_posts):?>
    <section>
      <div class="text_chapitres">
        <p class="titre_chapitre"><?php echo htmlspecialchars($d_posts['title'])?></p>
        </br>
        <p><?php echo htmlspecialchars($d_posts['content'])?></p>
        <p><a href="index.php?action=PostView">Commentaires</a></p>
      </div>
    </section>
<?php endforeach;?>
  </div>


  <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
