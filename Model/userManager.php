<?php
use \Openclassrooms\Projet4\Model;

require_once('Model/Manager.php');

class userManager extends Manager
{
  public function adminConnect()
  {
    $bdd = $this->bddConnect();
    $newUser = $bdd->query('SELECT id, pseudo, email, pass
                              FROM users
                              WHERE id = 1');
    return $newUser;
  }
}
