<?php $title = 'Chapitres'; ?>

<?php ob_start(); ?>
<div class="titre_de_page">
  <p>Chapitres</p>
</div>
<?php $info = ob_get_clean(); ?>

  <?php ob_start(); ?>
  <div id="block_chapitre">
      <?php foreach ($posts as $d_posts):?>
    <section>
      <div class="text_chapitres">
        <p class="titre_chapitre"><?php echo $d_posts['title']?></p>
        </br>
        <p><?php echo $d_posts['content']?></p>
        <p><a href="index.php?action=PostView&amp;id=<?php echo $d_posts['id'];?> ">Commentaires</a></p>
      </div>
    </section>
<?php endforeach;?>
  </div>


  <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
