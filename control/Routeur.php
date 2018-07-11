<?php

require_once ('control/controllerBackend.php');
require_once ('control/controllerFrontend.php');
require_once ('model/userManager.php');

class Routeur{
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
                    if (isset($_GET['id']) && $_GET['id'] > 0 AND isset($_GET['postId']) && $_GET['postId'] > 0){
                        $this->controlFront->PostView($_GET['id'],$_GET['postId']);
                    } else {
                        throw new \Exception('Aucun identifiant de chapitre envoyé');
                    }
                }

                //                 2: PAGE AJOUT COMMENTAIRE

                elseif ($_GET['action'] == 'addComments') {
                    if (!empty($_POST['author']) && !empty($_POST['content'])) {
                        if (strlen($_POST['author']) && strlen($_POST['content']) > 3 )
                        {
                            $this->controlFront->addComments($_POST['author'], $_POST['content'], $_GET['id']);
                        }
                        else{
                            throw new \Exception('Erreur : Il faut minimum 3 lettres !');
                        }
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
                    if (!empty($_POST['pseudo']) AND !empty($_POST['motdepasse'])) {
                        $resultat =  $this->Users->verifPassword($_POST['pseudo']);
                        $this->controlBack->verifConnection($_POST['pseudo']);
                        $passwordVerify = password_verify($_POST['motdepasse'], $resultat['password']);
                        if($passwordVerify){
                            $this->controlBack->connect();
                        }else{
                            throw new \Exception('Erreur!');
                        }
                    }else{
                        $_SESSION['erreur'] = "L'identifiant ou le mot de passe ne correspondent pas";
                        require('View/loginView.php');
                    }
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
                            throw new \Exception("Le formulaire n\'a pas été rempli correctement");
                        }
                    } else{
                        throw new \Exception('Le chapitre n\'a pas été modifié ');
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
                                echo "<script type=\"text/javascript\"> alert(\"L'article a été envoyé\"); </script>";
                            }else{
                                require('View/loginView.php');
                            }
                        } else {
                            echo "<script type=\"text/javascript\"> alert(\"L'article n'a pas été rempli correctement\"); </script>";
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

                elseif ($_GET['action'] == 'addReport') {
                    if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                        $CommentId= intval($_GET['idComment']);
                        $this->controlFront->addReport($CommentId);
                    }else{
                        require('View/loginView.php');
                    }
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

                //                  15:INSCRIPTION
                elseif ($_GET['action'] == 'inscription'){
                    if (isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] == 'Admin') {
                        $this->controlFront->InscriptionAdmin();
                    }else{
                        require('View/loginView.php');
                    }
                }

                //                  16:VERIFICATION INSCRIPTION
                elseif ($_GET['action'] == 'formInscription'){
                    if (isset($_POST['pseudo']) AND isset($_POST['pass']) AND isset($_POST['passTwo'])){
                        if (!empty($_POST['pseudo']) AND !empty($_POST['pass'])AND !empty($_POST['passTwo'])){
                            if ($_POST['pass'] == $_POST['passTwo']){
                                $pseudo = htmlspecialchars($_POST['pseudo']);
                                $passhash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                                $this->controlBack->verifInscription($pseudo,$passhash);
                            }else{
                                throw new \Exception('Les mots de passe ne sont pas identiques');
                            }
                        }else{
                            throw new \Exception('Le formulaire a mal été rempli');
                        }
                    } else {
                        throw new \Exception('test');
                    }
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
