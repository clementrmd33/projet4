<?php $title = 'Ajout d\'un nouveau chapitre'; ?>

<?php ob_start(); ?>
    <div class="titre_de_page">
        <p>Nouveau chapitre</p>
    </div>
<?php $info = ob_get_clean();?>

<?php ob_start(); ?>
    <div class="bloc_formulaire">
        <h1>Ajout nouveau chapitre</h1>
        <div class="conteneur_formulaire">
            <form action="index.php?action=addNewPost" method="POST" id="form_updates">
                <div id="title_ajout">
                    <label>TITRE:</label>
                    <input type="text" name="p_title" placeholder="Titre du chapitre">
                </div>
                <textarea id="mytextarea" name="p_content"></textarea>
                <div class="bloc_boutton">
                    <input type="submit" class="form_submit" value="Envoyez" onclick="confirmationAjoutTexte()">
                </div>
            </form>
        </div>
        <a href='index.php?action=retour'>Retour</a>
    </div>
<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>



