<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div class="titre_de_page">
  <p>ADMINISTRATION</p>
</div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
<div id="bloc_page_admin">
    <section>
        <nav id="nav_administration">
            <ul>
                <li><a href='#' id="buttonJs1">Gestion des chapitres</a></li>
                <li><a href='#' id="buttonJs2">Gestion des commentaires</a></li>
            </ul>
        </nav>
    </section>
    <div id="blocAdministration">
        <h1>Gestion des chapitres</h1>
        <div id="conteneur_delete">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Modifiez</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <?php foreach ($posts as $d_posts):?>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($d_posts['id']) ?></td>
                        <td><?php echo htmlspecialchars($d_posts['title']) ?></td>
                        <td><?php echo htmlspecialchars($d_posts['date_post']) ?></td>
                        <td><button><a href="index.php?action=updateView&amp;id=<?php echo $d_posts['id'];?>">Modifiez</a></button></td>
                        <td><button onclick="articleSupprimer()"><a href="index.php?action=deletepost&amp;id=<?php echo $d_posts['id'];?>">Supprimer</a></button></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
            <div id="Add_chapter">
                <button><a href="index.php?action=newPagePost">Ajoutez un nouveau chapitre</a></button>
            </div>
        </div>
    </div>
    <div id="blocAdministration2">
        <div id="BlocCommentaireSignaler">
            <h1>Commentaires signalés</h1>
            <div id="conteneur_delete">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Auteur</th>
                            <th>Message</th>
                            <th class="media">Date</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach ($reportAdmins as $comments):?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($comments['COM_ID']) ?></td>
                            <td><?php echo htmlspecialchars($comments['COM_AUTHOR']) ?></td>
                            <td><?php echo htmlspecialchars($comments['COM_CONTENT']) ?></td>
                            <td class="media"><?php echo htmlspecialchars($comments['COM_DATE']) ?></td>
                            <td><button><a href="index.php?action=validateComments&amp;id=<?php echo $comments['COM_ID'];?>"  id="button_validate"  onclick="afficherMessage()">Valider</a></button></td>
                            <td><button id="button_delete"><a href="index.php?action=deleteComments&amp;id=<?php echo $comments['COM_ID'];?>" onclick="afficherMessageSupprimer()">Supprimer</a></button></td>
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
