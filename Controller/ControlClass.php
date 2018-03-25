<?php
use \Openclassrooms\Projet4\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

class ControllClass
  {
    private $billets;
    private $Comments;
    private $connection;

      public function __construct(){
        $this->billets = new PostManager();
        $this->Comments = new CommentManager();
      }
      //PAGE CHAPITRE
      public function listChapters()
      {
        $posts = $this->billets->getPosts();
        require('View/chapitres.php');
      }
      //PAGE POST ET COMMENTAIRE
      public function PostView()
      {
        $comments = $this->Comments->getComments($_GET['id']);
        $post = $this->billets->getPost($_GET['id']);
        require('View/PostView.php');
      }
      //PAGE CONNECTION
      public function loginView()
      {
        require('View/loginView.php');
      }
      //PAGE ADMINISTRATION
      public function connect()
      {
        $posts = $this->billets->getPosts();
        require('View/adminView.php');
      }
      //AJOUT COMMENTAIRES
      public function addComments($author, $content, $postId)
      {
        $newComment = $this->Comments->postComments($author, $content, $postId);
        $this->PostView();
      }
      //RENVOIE PAGE DE MODIFICATION
      public function updateView()
      {
        require('View/updateChapter.php');
      }
      //MODIFICATION CHAPITRE
      public function updatepost($title, $content, $date, $id)
      {
        $update = $this->billets->updatePost($title, $content, $date, $id);
        require('View/updateChapter.php');
      }
      //SUPPRESSION CHAPITRE
      public function deletepost($delete_id)
      {
        $delete = $this->billets->deletePost($delete_id);
        require('View/adminView.php');
      }
      //GESTION DES SIGNALEMENTS
      public function addReport($CommentId)
      {
        $reportComments = $this->Comments->reportComment($CommentId);
        require('View/homeView.php');
      }
      public function adminReport()
      {
        $reportAdmins = $this->Comments->reportAdmin();
      }
  }
