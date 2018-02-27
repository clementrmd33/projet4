<?php

require_once('Model/PostManager.php');

function listPosts()
{
  $postManager = new \Openclassrooms\Projet4\Model\PostManager();
  $posts = $postManager->getPosts();

  require('View/homeView.php');
}

function listChapters()
{
  $postManager = new \Openclassrooms\Projet4\Model\PostManager();
  $posts = $postManager->getPosts();
  require('View/chapitres.php');
}

function loginView()
{
  require('View/loginView.php');
}
