<?php $title = 'Chapitres'; ?>

<?php ob_start(); ?>
<div id="chapitre-titre">
  <p>Chapitres</p>
</div>
<?php $info = ob_get_clean(); ?>

  <?php ob_start(); ?>
  <div id="block_page_2">
    <section>
      <?php
        while ($d_posts = $posts->fetch())
        {
      ?>
      <div class="text_chapitres">
        <p class="titre_chapitre"><?php echo htmlspecialchars($d_posts['title'])?></p>
        </br>
        <p><?php echo htmlspecialchars($d_posts['content'])?></p>
      </div>
        <?php
        }
        $posts->closeCursor();
        ?>
    </section>
    </div>
  <?php $content = ob_get_clean(); ?>

  <?php ob_start(); ?>
  <footer>
    <p>Mention légale | Site réalisé par Clément RAYMOND pour la formation Openclassroom</p>
  </footer>
<?php $footer = ob_get_clean(); ?>

<?php require('template.php'); ?>
