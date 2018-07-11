<?php $title = 'Commentaire'; ?>

<?php foreach ($post as $d_post):?>

<?php ob_start(); ?>
<div class="titre_de_page">
  <p>Chapitre : <?= ($d_post['id']); ?></p>
</div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div class=".container-fluid" id="container_commentaire">
        <div class="container" id="chapitre_view">
            <div id="text_chapitre">
                <h1><?php echo htmlspecialchars($d_post['title']);?></h1>
                <p><?php echo $d_post['content'];?></p>
            </div>
            <a href='index.php?action=returnFront'>Retour</a>
        </div>
        <div class="container" id="commentaireForm_view">
            <div class="titre_form">
                <h2>Vos commentaires</h2>
            </div>
            <form id="formulaire_commentaire" method="post" action="index.php?action=addComments&amp;id=<?= htmlspecialchars($d_post['id']);?>">
                <div class="form-group">
                    <label for="author">Nom:</label>
                    <input type="text" class="form-control" name="author" id="author" placeholder="Entrez votre nom...">
                </div>
                <div class="form-group">
                    <label for="content">Commentaire:</label>
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Entrez votre commentaire..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
<?php endforeach;?>


<div class=".container-fluid" id="container_com">
    <?php foreach ($comments as $d_comments):?>
        <div class="row">
            <div class="col-lg-2" id="com_author">
                <p id="partie_auteur"><strong><?php echo htmlspecialchars($d_comments['author']);?></strong> :</p>
            </div>
            <div class="col-lg-7" id="com_content">
                <p><?php echo htmlspecialchars($d_comments['content']);?></p>
            </div>
            <div class="col-lg-2">
                <p id="partie_date"><?php echo htmlspecialchars($d_comments['date_comment']); ?></p>
            </div>
            <div class="col-lg-1">
                <?php if ($d_comments['signalement'] != 2){?>
                    <button type="button" class="btn btn-primary" name="button" onclick="signalCom()"><a href="index.php?action=addReport&idPost=<?= htmlspecialchars($d_post['id']);?>&idComment=<?= htmlspecialchars($d_comments['id']);?>" id="button_signal">Signaler</a></button>
                <?php } ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
