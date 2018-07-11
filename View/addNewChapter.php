<?php $title = 'Ajout d\'un nouveau chapitre'; ?>
<?php ob_start(); ?>
    <div class="titre_de_page">
        <p>Nouveau chapitre</p>
    </div>
<?php $info = ob_get_clean();?>


<?php ob_start(); ?>
    <div class="container">
        <h2 class="text-center">Ajout d'un nouveau chapitre</h2>
        <form action="index.php?action=addNewPost" method="POST" id="form_updates" >
            <div class="form-group">
                <label for="p_title">Titre:</label>
                <input type="text" class="form-control" name="p_title" id="p_title" placeholder="Entrez le titre du chapitre...">
            </div>
            <div class="form-group">
                <label>Texte:</label>
                <textarea class="form-control" id="mytextarea" name="p_content" rows="3" placeholder="Entrez votre texte..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
<?php $content = ob_get_clean();?>


<?php require('template.php'); ?>



