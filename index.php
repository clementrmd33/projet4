<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT * FROM b_post');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Blog de Jean Forteroche</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="contenu/css/style.css" rel="stylesheet">
</head>
<body>
  <div id="container">
    <header>
      <h1>BLOG DE JEAN FORTEROCHE</h1>
      <nav>
        <ul>
          <li><i class="fas fa-home"></i><a href="#">Accueil</a></li>
          <li><i class="fas fa-book"></i><a href="#">Chapitres</a><i class="fas fa-sort-down"></i></li>
          <li><i class="fas fa-pencil-alt"></i><a href="#">S'identifier</a></li>
        </ul>
      </nav>
    </header>
    <div id="descriptif-container">
      <p>Bienvenue sur mon blog</br>Pour lire mon nouveau roman</p>
      <button>Cliquez ici</button>
    </div>
  </div>
  <section>
    <div id="container-tableau">
        <table id="tableau-chapitres">
            <thead>
                <tr>
                    <th>Derniers chapitres ajoutés</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
              <?php
              while ($donnees = $req->fetch())
              {
              ?>
                <tr>
                    <td><?php echo htmlspecialchars($donnees['P_TITLE'])?></td>
                    <td><?php echo htmlspecialchars($donnees['P_DATE'])?></td>
                </tr>
              <?php
              }
              $req->closeCursor();
          ?>
            </tbody>
        </table>
        <table id="tableau-commentaires">
            <thead>
                <tr>
                    <th>Dernier commentaire</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Super</td>
                    <td>12/07/2018</td>
                </tr>
                <tr>
                    <td>Fantastique</td>
                    <td>12/07/2018</td>
                </tr>
            </tbody>
        </table>
    </div>
      <section id="extrait-roman">
        <h1>Extrait de mon nouveau roman</h1>
        <p>
        </p>
      </section>
      </section>
  <footer>
    <p>Mention légale | Site réalisé par Clément RAYMOND pour la formation Openclassroom</p>
  </footer>
</body>
</html>
