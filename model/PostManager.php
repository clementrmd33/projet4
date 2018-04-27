<?php

require_once('Manager.php');

class PostManager extends Manager
{
  public function getPosts()
  {
    $bdd = $this->bddConnect();
    $posts = $bdd->query("SELECT P_ID as id,
                                    DATE_FORMAT(P_DATE, '%d/%m/%Y') as date_post,
                                    P_TITLE as title,
                                    P_CONTENT as content
                                    FROM b_post
                                    ORDER BY P_ID
                                    DESC");
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
  //MODIFIER UN CHAPITRE
  public function updatePost($title, $content, $id)
  {
    $bdd = $this->bddConnect();
    $update = $bdd->prepare('UPDATE b_post
                                       SET P_TITLE = ?,
                                       P_CONTENT = ?
                                       WHERE P_ID = ?');
    $update->execute(array($title, $content, $id));

    return $update;
  }
  //AJOUTER UN CHAPITRE
  public function addPost($p_title,$p_content)
  {
    $bdd = $this->bddConnect();
    $addpost = $bdd->prepare('INSERT INTO b_post(P_TITLE, P_CONTENT, P_DATE)
                                        VALUES (?,?,NOW())');
    $addpost->execute(array($p_title,$p_content));

    return $addpost;
  }
  //SUPPRIMER UN ARTICLE
  public function deletePost($delete_id)
  {
    $bdd = $this->bddConnect();
    $delete = $bdd->prepare('DELETE FROM b_post
                                       WHERE P_ID = ?');
    $delete->execute(array($delete_id));
  }
}
