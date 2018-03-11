<?php
use \Openclassrooms\Projet4\Controller;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/UsersManager.php');

class ControllClass
  {
    private $billets;
    private $Comments;
    private $connection;

      public function __construct(){
        $this->billets = new PostManager();
        $this->Comments = new CommentManager();
        $this->connection = new UsersManager();
      }

      public function listChapters()
      {
        $posts = $this->billets->getPosts();
        require('View/chapitres.php');
      }
      public function PostView()
      {
        $comments = $this->Comments->getComments();
        $post = $this->billets->getPost();
        require('View/PostView.php');
      }
      public function loginView()
      {
        require('View/loginView.php');
      }
      public function connect()
      {
        require ('View/adminView.php');
      }
  }
