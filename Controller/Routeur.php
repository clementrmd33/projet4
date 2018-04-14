<?php
use \Openclassrooms\Projet4\Controller;

require_once ('Controller/BackendControl.php');
require_once ('Controller/FrontendControl.php');

class RouteurClass
{
  private $controlBack;
  private $controlFront;

  public function __construct()
  {
    $this->controlBack = new BackendControl();
    $this->controlFront = new FrontendControl();
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
            $this->controlFront->PostView($_GET['id']);
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
                $this->controlFront->addComments($_POST['author'],$_POST['content'],$_GET['id']);
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
          $this->controlFront->addReport($CommentId);
        }
        //PAGE CHAPITRES
        elseif($_GET['action'] == 'listChapters')
        {
          $this->controlFront->listChapters();
        }
        //PAGE DE CONNECTION
        elseif ($_GET['action'] == 'loginView')
        {
          $this->controlFront->loginView();
        }
        //PAGE LOGIN
        elseif ($_GET['action'] == 'connect')
        {
          if (isset($_POST['pseudo']) && $_POST['pseudo'] == 'Admin')
          {
            if (isset($_POST['pass']) && $_POST['pass'] == 'Forteroche')
            {
              $this->controlBack->connect();
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
            $this->controlBack->updateView();
        }
        //MODIFIER UN ARTICLE
        elseif ($_GET['action'] == 'updatepost')
        {
          if (isset($_POST['title']) AND isset($_POST['content']) AND isset($_POST['date']) AND isset($_POST['id']))
          {
            if (!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['date']) AND !empty($_POST['id']))
            {
              $this->controlBack->updatepost($_POST['title'],$_POST['content'],$_POST['date'],$_POST['id']);
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
        //AJOUTER UN ARTICLE
        elseif ($_GET['action'] == 'addNewPost')
        {
          if (isset($_POST['p_title']) AND isset($_POST['p_content']))
          {
            if (!empty($_POST['p_title']) AND !empty($_POST['p_content']))
            {
              $this->controlBack->addNewPost($p_title = strip_tags($_POST['p_title']),$p_content = strip_tags($_POST['p_content']));
            }
            else
            {
              throw new \Exception('Les champs n\'ont pas été rempli correctement');
            }
          }
        }
        //SUPPRIMER UN POST
        elseif ($_GET['action'] == 'deletepost')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            $this->controlBack->deletepost($_GET['id']);
          }
          else
          {
            throw new \Exception("le post n'a pas été supprimer");
          }
        }
        //SUPPRIMER UN COMMENTAIRE
        elseif ($_GET['action'] == 'deleteComments')
        {
          if (isset($_GET['id']) && $_GET['id'] > 0)
          {
            $this->controlBack->deleteComments($_GET['id']);
          }
          else
          {
            throw new \Exception('le commentaire n’a pas été supprimé');
          }
        }
        elseif ($_GET['action'] == 'return')
        {
          $this->controlFront->return();
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
