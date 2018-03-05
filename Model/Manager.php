<?php

use \Openclassrooms\Projet4\Model;

class Manager
{
  protected function bddConnect()
  {
    $bdd = new \PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', 'root');

    return $bdd;
  }
}
