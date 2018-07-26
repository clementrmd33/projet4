<?php $title = 'Chapitres'; ?>
<?php ob_start(); ?>
<div class="titre_de_page">
    <p>Chapitres</p>
</div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
    <?php foreach ($posts as $d_posts):?>
        <div class="container" id="chapitre_page">
            <div class="text_chapitres">
                <p class="titre_chapitre"><?php echo htmlspecialchars($d_posts['title'])?></p>
                </br>
                <p><?php echo $d_posts['content']?></p>
                <p><a href="index.php?action=PostView&amp;id=<?php echo htmlspecialchars($d_posts['id']);?>">Commentaires</a></p>
            </div>
        </div>
    <?php endforeach;?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>