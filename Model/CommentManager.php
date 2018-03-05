<?php

use \Openclassrooms\Projet4\Model;

class CommentManager extends Manager
{
  public function getComments() {
    $bdd = $this->bddConnect();
    $comments = $bdd->query('SELECT * FROM b_comments');

    return $comments;
  }
}
