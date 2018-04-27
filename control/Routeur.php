<?php

require_once("control/controllerBackend.php");
require_once("control/controllerFrontend.php");

class Routeur
{
  private $controlBack;
  private $controlFront;

  public function __construct()
  {
    $this->controlBack = new controllerBackend();
    $this->controlFront = new controllerFrontend();
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
        elseif ($_GET['action'] == 'updateChapter')
        {
            if (isset($_POST['title']) AND isset($_POST['content']) AND isset($_POST['id']))
            {
                if (!empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['id']))
                {
                    $this->controlBack->updateValidate($_POST['title'],$_POST['content'],$_POST['id']);
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
        //AFFICHAGE PAGE NEW CHAPITRE
        elseif ($_GET['action'] == 'newPagePost')
        {
            $this->controlBack->addChapter();
        }
        //AJOUTER UN ARTICLE
        elseif ($_GET['action'] == 'addNewPost')
        {
          if (isset($_POST['p_title']) AND isset($_POST['p_content']))
          {
            if (!empty($_POST['p_title']) AND !empty($_POST['p_content']))
            {
              $this->controlBack->addNewPost($p_title = ($_POST['p_title']),$p_content = ($_POST['p_content']));
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
        //SIGNALER UN COMMENTAIRE
        elseif ($_GET['action'] == 'addReport')
        {
            $CommentId= intval($_GET['idComment']);
            $this->controlFront->addReport($CommentId);
        }
        //VALIDER UN COMMENTAIRE SIGNALER
        elseif ($_GET['action'] == 'validateComments')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                $this->controlBack->validateComments($_GET['id']);
            }
        }
        //SUPPRIMER UN COMMENTAIRE SIGNALER
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
        elseif ($_GET['action'] == 'retour')
        {
          $this->controlBack->retour();
        }
        elseif ($_GET['action'] == 'returnFront')
        {
            $this->controlFront->returnFront();
        }
      }
      else
      {
        require("View/homeView.php");
      }
    }
    catch (\Exception $e)
    {
      $msgErreur = $e->getMessage();
      require('View/errorView.php');
    }
  }
}
