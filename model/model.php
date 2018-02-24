<?php
function getPosts()
{
  $bdd = bddConnect();
  $posts = $bdd->query('SELECT P_ID as id, P_DATE as date_post, P_TITLE as title, P_CONTENT as content FROM b_post');
  return $posts;
}
function getComments()
{
  $bdd = bddConnect();
  $comments = $bdd->query('SELECT COM_ID, COM_AUTHOR, COM_CONTENT,COM_DATE FROM b_comments');
  return $comments;
}
//CONNECTION A LA BASE DE DONNEE
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
