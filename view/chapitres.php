<?php $title = 'Chapitres'; ?>

<?php ob_start(); ?>
<p>Les chapitres</p>
<nav id="nav_chapitres">
  <ul>
    <div id="column1">
      <li><a href="#">Chapitre 1</a></li>
      <li><a href="#">Chapitre 2</a></li>
      <li><a href="#">Chapitre 3</a></li>
    </div>
    <div id="column2">
      <li><a href="#">Chapitre 4</a></li>
      <li><a href="#">Chapitre 5</a></li>
      <li><a href="#">Chapitre 6</a></li>
    </div>
    <div id="column3">
      <li><a href="#">Chapitre 7</a></li>
      <li><a href="#">Chapitre 8</a></li>
      <li><a href="#">Chapitre 9</a></li>
    </div>
  </ul>
</nav>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
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
<?php $content = ob_get_clean(); ?>

<?php ob_start(); ?>
  <footer>
    <p>Mention légale | Site réalisé par Clément RAYMOND pour la formation Openclassroom</p>
  </footer>
<?php $footer = ob_get_clean(); ?>

<?php require('template.php'); ?>
