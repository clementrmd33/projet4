<?php

use \Openclassrooms\Projet4\Model;

require_once('Model/Manager.php');

class CommentManager extends Manager
{
  public function getComments($postId)
  {
    $bdd = $this->bddConnect();
    $comments = $bdd->prepare('SELECT COM_ID as id,
                                      COM_AUTHOR as author,
                                      COM_CONTENT as content,
                                      COM_DATE as date_comment
                               FROM b_comments
                               WHERE POST_ID = ?');
    $comments->execute(array($postId));

    return $comments;
  }

  //AJOUT DE COMMENTAIRES
  public function postComments($author, $content, $postId)
  {
    $bdd = $this->bddConnect();
    $newComment = $bdd->prepare('INSERT INTO b_comments(COM_AUTHOR, COM_CONTENT, COM_DATE, POST_ID) VALUES(?, ?,NOW(),?)');
    $newComment->execute(array($author, $content, $postId));

    return $newComment;
  }
  //SIGNALER COMMENTAIRES
  public function reportComment($CommentId)
  {
    $bdd = $this->bddConnect();
    $reportComments = $bdd->prepare('UPDATE b_comments
                                    SET REPORT = 1
                                    WHERE COM_ID = ?');
    $reportComments->execute(array($CommentId));

    return $reportComments;
  }
  public function reportAdmin()
  {
    $bdd = $this->bddConnect();
    $reportAdmins = $bdd->query('SELECT COM_ID,COM_AUTHOR, COM_CONTENT, COM_DATE
                                   FROM b_comments
                                   WHERE REPORT = 1');
    return $reportAdmins;
  }
}
