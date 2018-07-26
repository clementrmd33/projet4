<?php $title = 'Connection'; ?>

<?php ob_start(); ?>
<div class="titre_de_page">
    <p>Identification</p>
</div>
<?php $info = ob_get_clean();?>

<?php ob_start(); ?>
<div class="container">
    <?php if($erreurPass): ?>
        <div class="alert alert-danger" role="alert">
            L'identifiant ou le mot de passe sont incorrect
        </div>
    <?php endif; ?>
    <?php if($erreurEmpty): ?>
        <div class="alert alert-danger" role="alert">
            Les champs ne sont pas remplis correctement
        </div>
    <?php endif; ?>
    <form method="post" action="index.php?action=connect" id="login">
        <div class="form-group">
            <label for="pseudo">Identifiant:</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre identifiant...">
        </div>
        <div class="form-group">
            <label for="motdepasse">Mot de passe:</label>
            <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Votre mot de passe...">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
<?php $content = ob_get_clean();?>

<?php require('template.php'); ?>