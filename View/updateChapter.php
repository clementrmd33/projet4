<?php $title = 'Modification chapitre'; ?>

<?php ob_start(); ?>
<div class="titre_de_page">
  <p>Modification chapitre</p>
</div>
<?php $info = ob_get_clean();?>

<?php $donnees = $modifChapitre->fetch(); ?>

<?php ob_start(); ?>
    <div class="container">
        <h2 class="text-center">Mise à jour chapitre</h2>
        <form action="index.php?action=updateChapter&amp;id=<?php echo $donnees['id'];?>" method="POST" id="form_update" >
            <div class="form-group">
                <label>Id : <?php echo $_GET['id'];?></label>
            </div>
            <div class="form-group">
                <label for="title">TITRE:</label>
                <input type="text" class="form-control" name="title" id="title" value="<?php echo htmlspecialchars($donnees['title']);?>">
            </div>
            <div class="form-group">
                <label>Texte:</label>
                <textarea class="form-control" id="mytextarea" name="content" placeholder="Votre texte"><?php echo $donnees['content']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>
