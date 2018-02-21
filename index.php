<?php
require('controller/control.php');

if(isset($_GET['action'])){
  if($_GET['action'] == 'listPost'){
    listPost();
  }
  else {
    echo 'Erreur, aucun identifiant de billet envoyé';
  }
}
else {
  listPost();
}
