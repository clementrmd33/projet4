<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="contenu/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="contenu/css/mediaqueries.css" />
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=vkvq2dzssu5igxxi1uk64pxupp4lkm90ea56z53lb1wyrsb6"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: "advlist",
      });
    </script>
</head>


<body>
    <div class=".container-fluid color_header_footer">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="container" id="header">
                    <h1>BILLET SIMPLE POUR L'ALASKA</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class=".container-fluid">
                    <ul class="nav justify-content-center ">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=listChapters">Chapitres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=loginView">Administration</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        <div class=".container-fluid" id="photo_accueil">
            <div id="descriptif-container">
                <p><?= $info ?></p>
            </div>
        </div>
        <div id="content_template">
            <?= $content ?>
        </div>
        <div class=".container-fluid color_header_footer">
            <div class="row">
                <div class="container" id="footer">
                    <p>Mention légale | Site réalisé par Clément RAYMOND pour la formation Openclassroom</p>
                </div>
            </div>
        </div>

    </div>
</body>
<script type="text/javascript" src="contenu/js/admin.js"></script>
</html>
