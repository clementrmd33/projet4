<?php
require('controller/control.php');

//Billets

if(isset($_GET['action'])){
  if($_GET['action'] == 'listPosts'){
    listPosts();
  }
  else {
    echo 'Erreur, aucun identifiant de billet envoyé';
  }
}
else {
  listPosts();
}

//commentaires

if (isset($_GET['action'])) {
  if ($_GET['action'] == 'listComments') {
    listComments();
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
