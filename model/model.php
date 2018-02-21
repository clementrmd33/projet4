<?php
//Renvoie la liste des billets du blog
function getposts(){
  $bdd = getbdd();
  $posts = $bdd->query('select P_ID as id, P_DATE as date, P_TITLE as title, P_CONTENT as content from b_post by P_ID desc limit 4');
  return $posts;
}

//Renvoie les informations d'un billet du blog
function getpost($idpost){
  $bdd = getbdd();
  $post = $bdd->prepare('select P_ID as id, P_DATE as date, P_TITLE as title, P_CONTENT as content from b_post where P_ID=? ');
  $post->execute(array($idpost);

    if ($post->rowcount()==1) {
      return $post->fetch();
    } else{
      throw new Exception('Aucun post ne correspond à l\'identifiant '$idpost'' )
    }
}

// Renvoie la liste des commentaires liés à un billet
function getcomments($idpost){
  $bdd = getbdd();
  $comments = $bdd->prepare('select COM_ID')
}

//Connection à la base de donnée
function getbdd(){
  $bdd = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)););
  return $bdd;
}
