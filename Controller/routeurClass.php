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
    try
    {
      if (isset($_GET['action']))
      {
        if ($_GET['action'] == 'PostView')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            $this->ctrlControl->PostView($_GET['id']);
          }
          else
          {
            throw new \Exception('Aucun identifiant de billet envoyé');
          }
        }
        //PAGE AJOUT COMMENTAIRE
        elseif ($_GET['action'] == 'addComments')
        {
            if (!empty($_POST['author']) && !empty($_POST['content']))
            {
                $this->ctrlControl->addComments($_POST['author'],$_POST['content'],$_GET['id']);
            }
            else
            {
              throw new \Exception('Erreur : tous les champs ne sont pas remplis !');
            }
        }
        //SIGNALER UN COMMENTAIRE
        elseif ($_GET['action'] == 'addReport')
        {
          $CommentId= intval($_GET['id']);
          $this->ctrlControl->addReport($CommentId);
        }
        //AJOUTER LE COMMENTAIRE DANS LA PARTIE ADMIN
        elseif ($_GET['action'] == 'adminReport')
        {
          $this->ctrlControl->adminReport();
        }
        //PAGE CHAPITRES
        elseif($_GET['action'] == 'listChapters')
        {
          $this->ctrlControl->listChapters();
        }
        //PAGE DE CONNECTION
        elseif ($_GET['action'] == 'loginView')
        {
          $this->ctrlControl->loginView();
        }
        //PAGE LOGIN
        elseif ($_GET['action'] == 'connect')
        {
          if (isset($_POST['pseudo']) && $_POST['pseudo'] == 'Admin')
          {
            if (isset($_POST['pass']) && $_POST['pass'] == 'Forteroche')
            {
              $this->ctrlControl->connect();
            }
            else
            {
              throw new \Exception('le mot de passe est incorrect');
            }
          }
          else
          {
            throw new \Exception('l\'identifiant est incorrect');
          }
        }
        //PAGE UPDATE
        elseif ($_GET['action'] == 'updateView')
        {
            $this->ctrlControl->updateView();
        }
        //MODIFIER UN ARTICLE
        elseif ($_GET['action'] == 'updatepost')
        {
          if (isset($_POST['title']) AND isset($_POST['content']) AND isset($_POST['date']) AND isset($_POST['id']))
          {
            if (!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['date']) AND !empty($_POST['id']))
            {
              $this->ctrlControl->updatepost($_POST['title'],$_POST['content'],$_POST['date'],$_POST['id']);
            }
            else
            {
              throw new \Exception("Le formulaire n\'a pas été rempli correctement");
            }
          }
          else
          {
            throw new \Exception('Le commentaire n\'a pas été modifié ');
          }
        }
        //SUPPRIMER UN POST
        elseif ($_GET['action'] == 'deletepost')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            $this->ctrlControl->deletepost($_GET['id']);
          }
          else
          {
            throw new \Exception("le post n'a pas été supprimer");
          }
        }
      }
      else
      {
        require('View/homeView.php');
      }
    }
    catch (\Exception $e)
    {
      $msgErreur = $e->getMessage();
      require('View/errorView.php');
    }
  }
}
