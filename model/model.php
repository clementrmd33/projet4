<?php
function getPosts()
{
  $bdd = bddConnect();
  $req = $bdd->query('SELECT P_ID as id, P_DATE as date_post, P_TITLE as title, P_CONTENT as content FROM b_post');

  return $req;
}

function getPost($postId)
{
  $bdd = bddConnect();
  $req = $bdd->prepare('SELECT P_ID as id, P_DATE as date_post, P_TITLE as title, P_CONTENT as content FROM b_post WHERE P_ID=?');
  $req->execute(array($postId));
  $post = $req->fetch();

  return $post;
}

function getComments($postId)
{
  $bdd = bddConnect();
  $comments = $bdd->prepare('SELECT COM_ID, COM_AUTHOR, COM_CONTENT,COM_DATE FROM b_comments WHERE POST_ID=? ORDER BY COM_DATE DESC');
  $comments->execute(array($postId));

  return $comments;
}

function bddConnect(){
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
}
