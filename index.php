<?php

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT * FROM b_post');

require ('view/homeView.php');
?>
