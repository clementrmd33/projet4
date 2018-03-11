<?php
use \Openclassrooms\Projet4\Model;

require_once('Model/Manager.php');

class PostManager extends Manager
{
  public function getPosts()
  {
    $bdd = $this->bddConnect();
    $posts = $bdd->query('SELECT P_ID as id,
                                 P_DATE as date_post,
                                 P_TITLE as title,
                                 P_CONTENT as content
                          FROM b_post');

    return $posts;
  }
  public function getPost()
  {
    $bdd = $this->bddConnect();
    $post = $bdd->query('SELECT P_ID,
                                 P_DATE as date_post,
                                 P_TITLE as title,
                                 P_CONTENT as content
                           FROM b_post');

    return $post;
  }
}
