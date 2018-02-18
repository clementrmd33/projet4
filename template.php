<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Blog de Jean Forteroche</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
</head>
<body>
  <div id="container">
    <header>
      <h1>BLOG DE JEAN FORTEROCHE</h1>
      <nav>
        <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="#">Chapitres</a></li>
          <li><a href="login.php">S'identifier</a></li>
        </ul>
      </nav>
    </header>
    <div id="descriptif-container">
      <p>Bienvenue sur mon blog</br>Pour lire mon nouveau roman</p>
      <button>Cliquez ici</button>
    </div>
  </div>
  <section>
    <?= $content ?>
  </section>
  <footer>
    <p>Mention légale | Site réalisé par Clément RAYMOND pour la formation Openclassroom</p>
  </footer>
</body>
</html>
