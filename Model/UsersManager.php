<?php
use \Openclassrooms\Projet4\Model;

require_once('Model/Manager.php');

class UsersManager extends Manager
{
  public function getConnect()
  {
    $bdd = $this->bddConnect();
    $users = $bdd->query('SELECT id,pseudo,email,pass FROM users');

    return $users;
  }
}
