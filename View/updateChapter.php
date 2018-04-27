<?php $title = 'Modification chapitre'; ?>

<?php ob_start(); ?>
<div class="titre_de_page">
  <p>Modification chapitre</p>
</div>
<?php $info = ob_get_clean();?>

<?php $donnees = $modifChapitre->fetch(); ?>

<?php ob_start(); ?>
  <div class="bloc_formulaire">
    <h1>Mise à jour chapitre</h1>
    <div class="conteneur_formulaire">
        <form action="index.php?action=updateChapter&amp;id=<?php echo $donnees['id'];?>" method="post" id="form_update">
            <div id="Id_modif">
                <label for="id">Ancien id :</label>
                <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($_GET['id']);?>">
            </div>
            <div id="title_modif">
                <label for="title">TITRE:</label>
                <input type="text" id="title "name="title" value="<?php echo $donnees['title']?>">
            </div>
            <label for="content"></label>
            <textarea id="mytextarea" id="content" name="content" placeholder="Votre texte"><?php echo $donnees['content']?></textarea>
            <div class="bloc_boutton">
                <input type="submit" class="form_submit" value="Envoyez" onclick="confirmationModificationTexte()">
            </div>
        </form>
    </div>
    <a href="index.php?action=retour"><button type="submit" name="button">Retour</button></a>
  </div>
<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>
