<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div class="titre_de_page">
  <p>ADMINISTRATION</p>
</div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
<div id="bloc_page_admin">
    <div class="row">
        <div class="col-lg-6 text-center" id="button1">
            <a href='#' id="buttonJs1">Gestion des chapitres</a>
        </div>
        <div class="col-lg-6 text-center" id="button2">
            <a href='#' id="buttonJs2">Gestion des commentaires</a>
        </div>
    </div>
    <div id="blocAdministration">
        <h1>Gestion des chapitres</h1>
        <div id="conteneur_delete">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date</th>
                        <th scope="col">Modifiez</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <?php foreach ($posts as $d_posts):?>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($d_posts['id']) ?></td>
                        <td><?php echo htmlspecialchars($d_posts['title']) ?></td>
                        <td><?php echo htmlspecialchars($d_posts['date_post']) ?></td>
                        <td>
                            <button type="submit" class="btn btn-success">
                                <a href="index.php?action=updateView&amp;id=<?php echo $d_posts['id'];?>">Modifiez</a>
                            </button>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-danger">
                                <a href="index.php?action=deletepost&amp;id=<?php echo $d_posts['id'];?>"  id="button_delete"  onclick="articleSupprimer()">Supprimer</a>
                            </button>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-primary">
                    <a href="index.php?action=newPagePost">Ajoutez un nouveau chapitre</a>
                </button>
            </div>
        </div>
    </div>
    <div id="blocAdministration2">
        <div id="BlocCommentaireSignaler">
            <h1>Commentaires signalés</h1>
            <div id="conteneur_delete">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <?php foreach ($reportAdmins as $comments):?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($comments['COM_ID']) ?></td>
                            <td><?php echo htmlspecialchars($comments['COM_AUTHOR']) ?></td>
                            <td><?php echo htmlspecialchars($comments['COM_CONTENT']) ?></td>
                            <td class="media"><?php echo htmlspecialchars($comments['COM_DATE']) ?></td>
                            <td>
                                <button type="submit" class="btn btn-success">
                                    <a href="index.php?action=validateComments&amp;id=<?php echo $comments['COM_ID'];?>"  id="button_validate"  onclick="afficherMessage()">Valider</a>
                                </button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger">
                                    <a href="index.php?action=deleteComments&amp;id=<?php echo $comments['COM_ID'];?>"  id="button_delete"  onclick="afficherMessageSupprimer()">Supprimer</a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
