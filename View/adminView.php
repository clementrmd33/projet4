<?php $title = 'Administration'; ?>

<?php ob_start(); ?>
<div id='Administration-titre'>
  <p>ADMINISTRATION</p>
</div>
<?php $info = ob_get_clean(); ?>

<?php ob_start(); ?>
<section>
  <nav id="nav_administration">
    <ul>
      <li><a href='#' id="buttonJs1">Gestion des chapitres</a></li>
      <li><a href='#' id="buttonJs2">Gestion des commentaires</a></li>
    </ul>
  </nav>
</section>
<div id="blocAdministration">
  <div id="Ajoutchapitre">
    <h1>Ajout nouveau chapitre</h1>
    <form action="" method="post">
      <label>TITRE:</label>
      <input type="text" name="title" placeholder="Titre du chapitre"></input>
    </br>
      <label>TEXTE:</label>
      <textarea id="mytextarea"></textarea>
      <input type="submit" value="Envoyez"></input>
    </form>
  </div>

  <div id="BlocDeleteChapter">
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
            <td><button><a href="index.php?action=updateView">Modiez</a></button></td>
            <td><button><a href="index.php?action=deletepost&amp;id=<?php echo $d_posts['id'];?> ">Supprimer</a></button></td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      </table>
      <div id="Add_chapter">
          <button><a href="#">Ajoutez un nouveau chapitre</a></button>
      </div>
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
            <th>Date</th>
          </tr>
        </thead>
        <?php foreach ($reportAdmins as $reportComment):?>
        <tbody>
          <tr>
            <td><?php echo htmlspecialchars($reportComment['COM_ID']) ?></td>
            <td><?php echo htmlspecialchars($reportComment['COM_AUTHOR']) ?></td>
            <td><?php echo htmlspecialchars($reportComment['COM_CONTENT']) ?></td>
            <td><?php echo htmlspecialchars($reportComment['COM_DATE']) ?></td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
