<?php
use \Openclassrooms\Projet4\Controller;

require_once ('Controller/ControlClass.php');

class RouteurClass
{
  private $ctrlControl;

  public function __construct()
  {
    $this->ctrlControl = new ControllClass();
  }

  public function routerRequete()
  {
    if (isset($_GET['action']))
    {
      //Page chapitres
      if($_GET['action'] == 'listChapters')
      {
        $this->ctrlControl->listChapters();
      }
      //Page de connection
      elseif ($_GET['action'] == 'loginView')
      {
        $this->ctrlControl->loginView();
      }
      //Page d'administration
      elseif ($_GET['action'] == 'connect') {

          if(isset($_POST['pass']) AND $_POST['pass'] == 'Forteroche'){
            $this->ctrlControl->connect();
          }else {
            throw new \Exception('le mot de passe est incorrect');
          }

      }
      //Page commentaire
      elseif ($_GET['action'] == 'PostView')
      {
        $this->ctrlControl->PostView();
      }
    }
    else
    {
      require('View/homeView.php');
    }
  }
}
