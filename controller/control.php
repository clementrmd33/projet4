<?php
require('model/model.php');

function listPosts()
{
  $posts = getPosts();
  require('view/homeView.php');
}

function listComments()
{
  $posts = getPosts();
  require('view/chapitres.php');
}

function loginView()
{
  require('view/loginView.php');
}
