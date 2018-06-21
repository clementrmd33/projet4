<?php

require_once ('control/controllerBackend.php');
require_once ('control/controllerFrontend.php');

class Routeur{
    private $controlBack;
    private $controlFront;

    public function __construct(){
        $this->controlBack = new controllerBackend();
        $this->controlFront = new controllerFrontend();
    }

    public function routerRequete(){
        try {
            if (isset($_GET['action'])) {

                //                1: AFFICHAGE D'UN CHAPITRE ET DES COMMENTAIRES SELON l'ID SELECTIONNE

                if ($_GET['action'] == 'PostView') {
                    if (isset($_GET['id']) && $_GET['id'] > 0 AND isset($_GET['postId']) && $_GET['postId'] > 0){
                        $this->controlFront->PostView($_GET['id'],$_GET['postId']);
                    } else {
                        throw new \Exception('Aucun identifiant de chapitre envoyé');
                    }
                }

                //                 2: PAGE AJOUT COMMENTAIRE

                elseif ($_GET['action'] == 'addComments') {
                    if (!empty($_POST['author']) && !empty($_POST['content'])) {
                        $this->controlFront->addComments($_POST['author'], $_POST['content'], $_GET['id']);
                    } else {
                        throw new \Exception('Erreur : tous les champs ne sont pas remplis !');
                    }
                }

                //                  3 :PAGE CHAPITRES

                elseif($_GET['action'] == 'listChapters') {
                    $this->controlFront->listChapters();
                }

                //                  4: PAGE DE CONNECTION

                elseif ($_GET['action'] == 'loginView') {
                    $this->controlFront->loginView();
                }

                //                  5:PAGE LOGIN

                elseif ($_GET['action'] == 'connect') {
                    if (isset($_POST['pseudo']) && $_POST['pseudo'] == 'Admin') {
                        if (isset($_POST['pass']) && $_POST['pass'] == 'Forteroche') {
                            $this->controlBack->connect();
                        } else {
                            throw new \Exception('le mot de passe est incorrect');
                        }
                    } else {
                        throw new \Exception('l\'identifiant est incorrect');
                    }
                }

                //                  6:PAGE UPDATE

                elseif ($_GET['action'] == 'updateView') {
                    $this->controlBack->updateView();
                }

                //                  7:MODIFIER UN ARTICLE

                elseif ($_GET['action'] == 'updateChapter') {
                    if (isset($_POST['title']) AND isset($_POST['content']) AND isset($_GET['id'])){
                        if (!empty($_POST['title']) AND !empty($_POST['content'])){
                            $this->controlBack->updateValidate($_POST['title'],$_POST['content'],$_GET['id']);
                        } else {
                            throw new \Exception("Le formulaire n\'a pas été rempli correctement");
                        }
                    } else{
                        throw new \Exception('Le chapitre n\'a pas été modifié ');
                    }
                }

                //                  8:AFFICHAGE PAGE NEW CHAPITRE

                elseif ($_GET['action'] == 'newPagePost') {
                    $this->controlBack->addChapter();
                }

                //                  9:AJOUTER UN ARTICLE

                elseif ($_GET['action'] == 'addNewPost') {
                    if (isset($_POST['p_title']) AND isset($_POST['p_content'])) {
                        if (!empty($_POST['p_title']) AND !empty($_POST['p_content'])) {
                            $this->controlBack->addNewPost($p_title = ($_POST['p_title']),$p_content = ($_POST['p_content']));
                            echo "<script type=\"text/javascript\"> alert(\"L'article a été envoyé\"); </script>";
                        } else {
                            echo "<script type=\"text/javascript\"> alert(\"L'article n'a pas été rempli correctement\"); </script>";
                            require('View/addNewChapter.php');
                        }
                    }
                }

                //                  10:SUPPRIMER UN POST

                elseif ($_GET['action'] == 'deletepost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->controlBack->deletepost($_GET['id']);
                    } else {
                        throw new \Exception("le post n'a pas été supprimer");
                    }
                }

                //                  11:SIGNALER UN COMMENTAIRE

                elseif ($_GET['action'] == 'addReport') {
                    $CommentId= intval($_GET['idComment']);
                    $this->controlFront->addReport($CommentId);
                }

                //                  12:VALIDER UN COMMENTAIRE SIGNALER

                elseif ($_GET['action'] == 'validateComments') {
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        $this->controlBack->validateComments($_GET['id']);
                    }
                }

                //                  13:SUPPRIMER UN COMMENTAIRE SIGNALER

                elseif ($_GET['action'] == 'deleteComments') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $this->controlBack->deleteComments($_GET['id']);
                    } else {
                        throw new \Exception('le commentaire n’a pas été supprimé');
                    }
                }

                //                  14:BUTTON RETOUR

                elseif ($_GET['action'] == 'retour') {
                    $this->controlBack->retour();
                }
                elseif ($_GET['action'] == 'returnFront') {
                    $this->controlFront->returnFront();
                }
            } else {
                require("View/homeView.php");
            }
        } catch (\Exception $e) {
            $msgErreur = $e->getMessage();
            require('View/errorView.php');
        }
    }
}
