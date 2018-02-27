<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="contenu/css/style.css" rel="stylesheet">
</head>
<body>
  <div id="container">
    <header>
      <h1>BILLET SIMPLE POUR L'ALASKA</h1>
      <nav>
        <ul>
          <li><i class="fas fa-home"></i><a href="index.php">Accueil</a></li>
          <li><i class="fas fa-book"></i><a href="index.php?action=listChapters">Chapitres</a></li>
          <li><i class="fas fa-pencil-alt"></i><a href="index.php?action=loginView">S'identifier</a></li>
        </ul>
      </nav>
    </header>
    <div id="descriptif-container">
      <p> <?= $info ?></p>
    </div>
  </div>

    <?= $content ?>

    <?= $footer ?>

</body>
</html>
