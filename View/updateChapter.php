<?php $title = 'Modification chapitre'; ?>

<?php ob_start(); ?>
<div id="update-titre">
  <p>Modification chapitre</p>
</div>
<?php $info = ob_get_clean();?>

<?php ob_start(); ?>
  <div id="BlocUpdateChapter">
    <h1>Mise à jour chapitre</h1>
    <div id="conteneur_update">
      <form action="index.php?action=updatepost" method="post">
        <div id="form_update">
          <label for="id">Ancien id :</label>
          <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($_GET['id']);?>"></input>
          </br>
          <label for="title">Nouveau titre :</label>
          <input type="text" id="title "name="title" placeholder="Titre"></input>
          </br>
          <label for="content">Nouveau texte :</label>
          <textarea type="text" id="content" name="content" placeholder="Votre texte"></textarea>
          </br>
          <label for="date">Nouvelle date :</label>
          <input type="text" id="date "name="date" value="JJ/MM/AAAA"></input>
          </br>
        </div>
        <input type="submit" value="Validez"></input>
      </form>
    </div>
    <a href="index.php?action=return"><button type="submit" name="button">Retour</button></a>
  </div>
<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>
