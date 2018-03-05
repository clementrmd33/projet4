<?php

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

use \Openclassrooms\Projet4\ControlClass;

class ControllClass
  {
    private $billets;


    public function __construct(){
      $this->billets = new PostManager();
    }

    public function listChapters()
    {
      $posts = $this->billets->getPosts();
      require('View/chapitres.php');
    }

    public function listComments()
    {
      $commentManager = new CommentManager();
      $comments = $commentManager->getComments();
      require('View/homeView.php');
    }

    public function loginView()
    {
      require('View/loginView.php');
    }

    public function paginationChapters()
    {
      $postManager = new PostManager();
      $paginations = $postManager->paginationPost();
    }
  }
