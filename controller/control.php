<?php
require('model/model.php');

function listPost()
{
  $req = getPosts();
  require('view/homeView.php');
}
