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
  public function getPost($postId)
  {
    $bdd = $this->bddConnect();
    $post = $bdd->prepare('SELECT P_ID as id,
                                 P_DATE as date_post,
                                 P_TITLE as title,
                                 P_CONTENT as content
                           FROM b_post
                           WHERE P_ID = ?');
    $post->execute(array($postId));

    return $post;
  }
  public function updatePost($title, $content, $date, $id)
  {
    $bdd = $this->bddConnect();
    $update = $bdd->prepare('UPDATE b_post
                             SET P_TITLE = ?,
                                 P_CONTENT = ?,
                                 P_DATE = ?
                             WHERE P_ID = ?');
    $update->execute(array($title, $content, $date, $id));
  }
  public function deletePost($delete_id)
  {
    $bdd = $this->bddConnect();
    $delete = $bdd->prepare('DELETE FROM b_post
                             WHERE P_ID = ?');
    $delete->execute(array($delete_id));
  }
}
