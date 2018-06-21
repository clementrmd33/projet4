<?php $title = 'Commentaire'; ?>

<?php foreach ($post as $d_post):?>

<?php ob_start(); ?>
<div class="titre_de_page">
  <p>Chapitres</p>
</div>
<?php $info = ob_get_clean(); ?>

  <?php ob_start(); ?>
  <div id="block_page_com">
      <section>
          <div id="bloc_section">
              <div id="text_chapitres_com">
                <h1><?php echo htmlspecialchars($d_post['title']);?></h1>
                <p><?php echo $d_post['content'];?></p>
              </div>
              <a href='index.php?action=returnFront'>Retour</a>
          </div>
          <div id="container_commentaire">
              <div class="barre_commentaires">
              <h1>Vos commentaires</h1>
          </div>
          <form id="formulaire_commentaire" method="POST" action="index.php?action=addComments&amp;id=<?= htmlspecialchars($d_post['id']); ?>">
              <div class="MP_commentaire">
                  <label for="author">Nom:</label>
                  <input type="text" name="author" id="author" placeholder="Nom">
                  <label for="content">Commentaire:</label>
                  <textarea name="content" id="content" placeholder="Votre commentaire"></textarea>
                      <div id="button_com">
                          <input id="MP_bouton" type="submit" value="Envoyer"/>
                      </div>
                  </div>
              </div>
          </form>
      </section>
  </div>

  <?php endforeach;?>

  <div class="affichage_com">
  <?php foreach ($comments as $d_comments):?>
      <div class="commentaires">
          <p id="partie_auteur"><strong><?php echo htmlspecialchars($d_comments['author']);?></strong> : <?php echo htmlspecialchars($d_comments['content']);?></p><br/><p id="partie_date"><?php echo htmlspecialchars($d_comments['date_comment']); ?></p>
          <?php if ($d_comments['signalement'] != 2){?>
            <a href="index.php?action=addReport&idPost=<?= htmlspecialchars($d_post['id']);?>&idComment=<?= htmlspecialchars($d_comments['id']);?>" id="button_signal"><button type="button" name="button" onclick="signalCom()">Signaler</button></a>
          <?php } ?>
      </div>
  <?php endforeach; ?>
  </div>

  <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
