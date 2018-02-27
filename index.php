<?php
require('Controller/control.php');

//Articles page d'accueil

if(isset($_GET['action'])){
  if($_GET['action'] == 'listPosts'){
    listPosts();
  }
  else {
    echo 'Erreur, aucun identifiant d\'articles envoyé';
  }
}
else {
  listPosts();
}

//Articles page chapitres

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'listChapters') {
    listChapters();
  }
  else {
    echo 'Erreur, aucun identifiant de commentaire envoyé';
  }
}

//Page loginview
if (isset($_GET['action'])) {
  if ($_GET['action'] == 'loginView') {
    loginView();
  }
}
