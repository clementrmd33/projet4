<?php
require_once ('model/PostManager.php');
require_once ('model/CommentManager.php');

class controllerFrontend
{
    private $Chapters;
    private $Comments;

    public function __construct(){
        $this->Chapters = new PostManager();
        $this->Comments = new CommentManager();
    }

    //                     1: AFFICHAGE D'UN CHAPITRE ET DES COMMENTAIRES SELON l'ID SELECTIONNE

    public function PostView($postId){
        $post = $this->Chapters->getPost($postId);
        $comments = $this->Comments->getComments($postId);
        require('View/PostView.php');
    }

    //                                      2: PAGE AJOUT COMMENTAIRE

    public function addComments($author, $content, $postId){
        if (!empty($author) && !empty($content)) {
            if (strlen($author) && strlen($content) > 3 ){
                $newComment = $this->Comments->postComments($author, $content, $postId);
                header('Location: index.php?action=PostView&id='. $postId);
            }
            else{
                echo '<script>alert("Vous devez remplir les champs avec 3 caracteres minimum");</script>';
                $this->PostView($postId);
            }
        } else {
            echo '<script>alert("Vous n\'avez pas remplis tous les champs");</script>';
            $this->PostView($postId);
        }
    }

    //                                      3 :PAGE CHAPITRES

    public function listChapters(){
        $posts = $this->Chapters->getPosts();
        require('View/chapitres.php');
    }

    //                                      4: PAGE DE CONNECTION

    public function loginView(){
        $erreurPass = false;
        $erreurEmpty=false;
        require('View/loginView.php');
    }

    //                                      11:SIGNALER UN COMMENTAIRE

    public function addReport($CommentId){
        $reportComments = $this->Comments->reportComment($CommentId);
        $comments = $this->Comments->getComments($_GET['idPost']);
        $post = $this->Chapters->getPost($_GET['idPost']);
        require('View/PostView.php');
    }

    //                                      14:BUTTON RETOUR
    public function returnFront(){
        $posts = $this->Chapters->getPosts();
        require('View/chapitres.php');
    }

    //                                      15:INSCRIPTION
    public function InscriptionAdmin(){
        require('View/Inscription.php');
    }
}