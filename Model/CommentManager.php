<?php

use \Openclassrooms\Projet4\Model;

require_once('Model/Manager.php');

class CommentManager extends Manager
{
  public function getComments()
  {
    $bdd = $this->bddConnect();
    $comments = $bdd->query('SELECT COM_ID as id,
                                    COM_AUTHOR as author,
                                    COM_CONTENT as content,
                                    COM_DATE as date_comment
                             FROM b_comments');
                             
    return $comments;
  }
}
