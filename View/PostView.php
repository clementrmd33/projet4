<?php $title = 'Commentaire'; ?>

<?php foreach ($post as $d_posts):?>

<?php ob_start(); ?>
<div id="Chapitre-titre">
  <p><?php echo htmlspecialchars($d_posts['title'])?></p>
</div>
<?php $info = ob_get_clean(); ?>

  <?php ob_start(); ?>
  <div id="block_page_com">
    <section>

      <div id="text_chapitres_com">
        <p><?php echo htmlspecialchars($d_posts['content'])?></p>
      </div>
      <div id="container_commentaire">
        <div class="barre_commentaires">
          <h1>Vos commentaires</h1>
        </div>
        <div id="block_commentaire">
          <form id="formulaire_commentaire" action="" method="post">
            <div class="MP_commentaire">
              <input type="text" placeholder="Nom"></input>
              <textarea placeholder="Votre commentaire" rows="10" cols="50"></textarea>
            </div>
            <div id="MP_bouton">
              <button>Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php endforeach;

  foreach ($comments as $d_comments):?>
      <div class="affichage_com">
        <p><?php echo htmlspecialchars($d_comments['author']); ?></p>
        <p><?php echo htmlspecialchars($d_comments['content']); ?></p>
        <p><?php echo htmlspecialchars($d_comments['date_comment']); ?></p>
      </div>
  <?php endforeach; ?>

  <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
