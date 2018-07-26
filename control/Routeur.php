<?php

require_once ('control/controllerBackend.php');
require_once ('control/controllerFrontend.php');
require_once ('model/userManager.php');


class Routeur
{
    private $controlBack;
    private $controlFront;
    private $Users;

    public function __construct(){
        $this->controlBack = new controllerBackend();
        $this->controlFront = new controllerFrontend();
        $this->Users = new userManager();
    }

    public function routerRequete(){
        try {
            session_start();

            if (isset($_GET['action'])) {

                //                1: AFFICHAGE D'UN CHAPITRE ET DES COMMENTAIRES SELON l'ID SELECTIONNE

                if ($_GET['action'] == 'PostView') {
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        $this->controlFront->PostView($_GET['id']);
                    } else {
                        throw new \Exception('Aucun identifiant de chapitre envoyé');
                    }
                }

                //                 2: PAGE AJOUT COMMENTAIRE

                elseif ($_GET['action'] == 'addComments') {
                    $this->controlFront->addComments($_POST['author'], $_POST['content'], $_GET['id']);
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
                    $this->controlBack->verifConnection($_POST['pseudo'], $_POST['motdepasse']);
                }

                //                  6:PAGE UPDATE

                elseif ($_GET['action'] == 'updateView') {
                    if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin'){
                        $this->controlBack->updateView();
                    }else{
                        require('View/loginView.php');
                    }
                }

                //                  7:MODIFIER UN ARTICLE

                elseif ($_GET['action'] == 'updateChapter') {
                    if (isset($_POST['title']) AND isset($_POST['content']) AND isset($_GET['id'])){
                        if (!empty($_POST['title']) AND !empty($_POST['content'])){
                            if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                                $this->controlBack->updateValidate($_POST['title'], $_POST['content'], $_GET['id']);
                            }else{
                                require('View/loginView.php');
                            }
                        } else {
                            echo '<script>alert("Le formulaire n\'a pas été rempli correctement");</script>';
                        }
                    } else{
                        echo '<script>alert("Le chapitre n\'a pas été modifié");</script>';
                    }
                }

                //                  8:AFFICHAGE PAGE NEW CHAPITRE

                elseif ($_GET['action'] == 'newPagePost') {
                    if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                        $this->controlBack->addChapter();
                    }else{
                        require('View/loginView.php');
                    }
                }

                //                  9:AJOUTER UN ARTICLE

                elseif ($_GET['action'] == 'addNewPost') {
                    if (isset($_POST['p_title']) AND isset($_POST['p_content'])) {
                        if (!empty($_POST['p_title']) AND !empty($_POST['p_content'])) {
                            if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                                $this->controlBack->addNewPost($p_title = ($_POST['p_title']),$p_content = ($_POST['p_content']));
                                echo "<script>alert(\"L'article a été envoyé\");</script>";
                            }else{
                                require('View/loginView.php');
                            }
                        } else {
                            echo "<script>alert(\"L'article n'a pas été rempli correctement\");</script>";
                            require('View/addNewChapter.php');
                        }
                    }
                }

                //                  10:SUPPRIMER UN POST

                elseif ($_GET['action'] == 'deletepost') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                            $this->controlBack->deletepost($_GET['id']);
                        }else{
                            require('View/loginView.php');
                        }
                    } else {
                        throw new \Exception("le post n'a pas été supprimer");
                    }
                }

                //                  11:SIGNALER UN COMMENTAIRE

                elseif ($_GET['action'] == 'addReport'){
                    $CommentId= intval($_GET['idComment']);
                    $this->controlFront->addReport($CommentId);

                }

                //                  12:VALIDER UN COMMENTAIRE SIGNALER

                elseif ($_GET['action'] == 'validateComments') {
                    if (isset($_GET['id']) && $_GET['id'] > 0){
                        if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                            $this->controlBack->validateComments($_GET['id']);
                        }else{
                            require('View/loginView.php');
                        }
                    }
                }

                //                  13:SUPPRIMER UN COMMENTAIRE SIGNALER

                elseif ($_GET['action'] == 'deleteComments') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                            $this->controlBack->deleteComments($_GET['id']);
                        }else{
                            require('View/loginView.php');
                        }
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
                session_destroy();
            }
        } catch (\Exception $e) {
            $msgErreur = $e->getMessage();
            require('View/errorView.php');
        }
    }
}
