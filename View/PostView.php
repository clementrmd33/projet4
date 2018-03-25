<?php $title = 'Commentaire'; ?>

<?php foreach ($post as $d_post):?>

<?php ob_start(); ?>
<div id="Chapitre-titre">
  <p><?php echo htmlspecialchars($d_post['title'])?></p>
</div>
<?php $info = ob_get_clean(); ?>

  <?php ob_start(); ?>
  <div id="block_page_com">
    <section>
      <div id="text_chapitres_com">
        <p><?php echo htmlspecialchars($d_post['content'])?></p>
      </div>
      <div id="container_commentaire">
        <div class="barre_commentaires">
          <h1>Vos commentaires</h1>
        </div>
        <div id="block_commentaire">
          <form id="formulaire_commentaire" method="POST" action="index.php?action=addComments&amp;id=<?= $d_post['id'] ?>">
            <div class="MP_commentaire">
              <label for="author">Nom:</label>
              <input type="text" name="author" id="author" placeholder="Nom"></input>
              <label for="content">Commentaire:</label>
              <textarea name="content" id="content" placeholder="Votre commentaire"></textarea>
            </div>
              <input id="MP_bouton" type="submit" value="Envoyer"/>
          </form>
        </div>
      </div>
    </section>
  </div>

  <?php endforeach;?>

  <div class="affichage_com">
  <?php foreach ($comments as $d_comments):?>
      <div class="commentaires">
          <p><strong><?php echo htmlspecialchars($d_comments['author']);?></strong> : <?php echo htmlspecialchars($d_comments['content']);?> // <em><?php echo htmlspecialchars($d_comments['date_comment']); ?></em></p>
          <a href="index.php?action=addReport&id=<?= $d_comments['id'];?>"><button type="button" name="button">AA</button></a>
      </div>
  <?php endforeach; ?>
  </div>
  <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
