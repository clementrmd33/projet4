<?php

require_once('Manager.php');

class CommentManager extends Manager
{
  //AFFICHE TOUS LES COMMENTAIRES
  public function getComments($postId)
  {
    $bdd = $this->bddConnect();
    $comments = $bdd->prepare("SELECT COM_ID as id,
                                        COM_AUTHOR as author,
                                        COM_CONTENT as content,
                                        DATE_FORMAT(COM_DATE, ' le %d/%m/%Y à %Hh%i') as date_comment,
                                        REPORT as signalement
                                        FROM b_comments
                                        WHERE POST_ID = ?");
    $comments->execute(array($postId));

    return $comments;
  }

  //AJOUT DE COMMENTAIRES
  public function postComments($author, $content, $postId)
  {
    $bdd = $this->bddConnect();
    $newComment = $bdd->prepare('INSERT INTO b_comments(COM_AUTHOR, COM_CONTENT, COM_DATE, POST_ID) 
                                           VALUES(?, ?,NOW(),?)');
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
  //AFFICHAGE DES COMMENTAIRES SIGNALER DANS UN TABLEAU
  public function reportAdmin()
  {
    $bdd = $this->bddConnect();
    $reportAdmins = $bdd->query('SELECT COM_ID,COM_AUTHOR, COM_CONTENT, COM_DATE
                                           FROM b_comments
                                           WHERE REPORT = 1');
    return $reportAdmins;
  }
  // VALIDER COMMENTAIRE SIGNALER
  public function validateReport($validate_Id)
  {
      $bdd = $this->bddConnect();
      $validate_comments=$bdd->prepare('UPDATE b_comments
                                                 SET REPORT = 2
                                                 WHERE COM_ID = ?');
      $validate_comments->execute(array($validate_Id));
  }
  //SUPPRIMER COMMENTAIRE SIGNALER
  public function deleteReport($delete_report)
  {
    $bdd = $this->bddConnect();
    $delete_comment = $bdd->prepare('DELETE FROM b_comments
                                               WHERE COM_ID = ?');
    $delete_comment->execute(array($delete_report));

    return $delete_comment;
  }
}
