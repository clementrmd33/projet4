<?php

use \Openclassrooms\Projet4\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class FrontendControl
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
    //PAGE CONNECTION
    public function loginView()
    {
        require('View/loginView.php');
    }
}