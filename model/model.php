<?php
function getPost(){
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }

  $req = $bdd->query('SELECT P_ID as id, P_DATE as date_post, P_TITLE as title, P_CONTENT as content FROM b_post');

  return $req;
}
