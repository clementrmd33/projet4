<?php

require_once ('model/PostManager.php');
require_once('model/CommentManager.php');

class controllerFrontend
{
    private $Chapters;
    private $Comments;

    public function __construct(){
        $this->Chapters = new PostManager();
        $this->Comments = new CommentManager();
    }
    //PAGE CHAPITRE
    public function listChapters()
    {
        $posts = $this->Chapters->getPosts();
        require('View/chapitres.php');
    }
    //PAGE POST ET COMMENTAIRE
    public function PostView()
    {
        $comments = $this->Comments->getComments($_GET['id']);
        $post = $this->Chapters->getPost($_GET['id']);
        require('View/PostView.php');
    }
    //AJOUT COMMENTAIRES
    public function addComments($author, $content, $postId)
    {
        $newComment = $this->Comments->postComments($author, $content, $postId);
        $this->PostView();
    }
    //PAGE CONNECTION
    public function loginView()
    {
        require('View/loginView.php');
    }
    //GESTION DES SIGNALEMENTS
    public function addReport($CommentId)
    {
        $reportComments = $this->Comments->reportComment($CommentId);
        $comments = $this->Comments->getComments($_GET['idPost']);
        $post = $this->Chapters->getPost($_GET['idPost']);
        require('View/PostView.php');
    }
    //ACTUALISATION PAGE FRONTEND
    public function returnFront()
    {
        $posts = $this->Chapters->getPosts();
        require('View/chapitres.php');
    }
}